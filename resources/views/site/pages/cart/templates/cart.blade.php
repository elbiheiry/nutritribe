<table class=" table table-cart table-border">
    <thead>
    <tr>
        <th class="product-thumbnail">Image</th>
        <th class="product-name"> Package Name</th>
        <th class="product-price"> Price</th>
        <th class="product-quantity">QUANTITY</th>
        <th class="product-subtotal">Total</th>
        <th class="product-remove"></th>
    </tr>
    </thead>
    <tbody>
    @php
        $currency = session()->get('currency');
    @endphp
    @foreach($items as $item)
        <tr>
            <td class="product-thumbnail">
                <a href="{{route('site.package',['slug' => $item->associatedModel->slug])}}">
                    <img src="{{asset('storage/app/products/'.$item->associatedModel->image)}}">
                </a>
            </td>
            <td class="product-name">
                <a href="{{route('site.package',['slug' => $item->associatedModel->slug])}}"> {{$item->name}}</a>
            </td>
            <td class="product-price">
                {{$item->associatedModel->price()}}
            </td>
            <td class="product-quantity">
                <div class="cat-number">
                    <a href="#" class="number-down">
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <input value="{{$item->quantity}}" class="form-control change_quantity" type="text" data-url="{{route('site.cart.add' , ['id' => $item->id])}}">
                    <a href="#" class="number-up">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </td>
            <td class="product-subtotal">
                @switch($currency)
                    @case('usd')
                    {{$item->associatedModel->usd_price * $item->quantity}} Usd
                    @break
                    @case('eur')
                    {{$item->associatedModel->eur_price * $item->quantity}} Eur
                    @break
                    @case('aed')
                    {{$item->associatedModel->uae_price * $item->quantity}} Aed
                    @break
                    @default
                    {{$item->associatedModel->egp_price * $item->quantity}} Egp
                @endswitch
            </td>
            <td class="product-remove">
                <button class="icon-btn delete-cart-button"
                        data-url="{{route('site.cart.delete' ,['id' => $item->id])}}">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="table-footer">
    @php
        $sum = 0;
        if ($currency == 'usd'){
            foreach ($items as $item) {
                $sum += $item->associatedModel->usd_price * $item->quantity;
            }
            $sum = $sum .' Usd';
        }elseif ($currency == 'eur'){
            foreach ($items as $item) {
                $sum += $item->associatedModel->eur_price * $item->quantity;
            }
            $sum = $sum .' Eur';
        }elseif ($currency == 'aed'){
            foreach ($items as $item) {
                $sum += $item->associatedModel->uae_price * $item->quantity;
            }
            $sum = $sum .' Aed';
        }else{
            foreach ($items as $item) {
                $sum += $item->associatedModel->egp_price * $item->quantity;
            }
            $sum = $sum .' Egp';
        }
    @endphp
    <div class="total">
        <span>Total : </span>
        {{$sum}}
    </div>
    @if(sizeof($items) >0)
        <a href="{{route('site.checkout')}}" class="custom-btn">
            <span>Checkout </span>
        </a>
    @endif
</div>