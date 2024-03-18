<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\OrderDetailMail;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Cart;
use Input;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {
        if (sizeof(Cart::getContent()) == 0){
            return \redirect()->back()->withErrors('There is no items to buy now in your cart');
        }
        $v = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'postal' => 'required'
        ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please provide a valid email',
            'city.required' => 'Please enter your city',
            'address.required' => 'Please enter your address',
            'phone.required' => 'Please enter your phone number',
            'postal.required' => 'Please enter your postal code'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors()->all());
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');


        foreach (Cart::getContent() as $index => $item) {
            $items[$index] = new Item();
            $items[$index]->setName($item->name)/** item name **/
            ->setCurrency('USD')
                ->setQuantity($item->quantity)
                ->setPrice($item->price);
        }
        
        
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems($items);
        
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(Cart::getTotal());
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your bought some packages from us');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('confirm-payment'))/** Specify return URL **/
        ->setCancelUrl(URL::route('confirm-payment'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::route('site.checkout');
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('site.checkout');
            }

        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paymentId', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return Redirect::route('site.checkout');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paymentId');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(request()->get('PayerID')) || empty(request()->get('token'))) {
            Session::put('error', 'Payment failed');
            return Redirect::route('site.checkout');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(request()->get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            // $order = new Order();

            // $order->name = $name;
            // $order->email = $email;
            // $order->city = $city;
            // $order->address = $address;
            // $order->phone = $phone;
            // $order->postal = $postal;
            // $order->items = json_encode(Cart::getContent());
            // $order->save();

            // Mail::to($order->email)->send(new OrderDetailMail($order->id , $order->name));

            // Cart::clear();

            Session::put('success', 'Payment success');
            return Redirect::route('site.checkout');
        }

        Session::put('error', 'Payment failed');
        return Redirect::route('site.checkout');
    }

    public function postSendEmail(Request $request, $id)
    {

//         Mail::to(->email)->send(new OrderDetailMail($order->id , $order->name));
    }
}
