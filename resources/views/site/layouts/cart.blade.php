<div class="shopping-cart">
    <div class="cart-icon">
        <i class="fas fa-shopping-bag"></i>
        <div class="count">{{\Cart::getContent()->count()}}</div>
    </div>
    <div class="cart-content">
        @if(!empty(\Cart::getContent()))
            @foreach(\Cart::getContent() as $cart)
                <div class="shop-item">
                    <img src="{{asset('storage/app/products/'.$cart->associatedModel->image)}}">
                    <div class="shop-item-info">
                        <a href="{{route('site.package',['slug' => $cart->associatedModel->slug])}}"> {{$cart->name}}
                            ({{$cart->quantity}}) </a>
                        <span>
                            {{$cart->associatedModel->price()}}
                        </span>
                    </div>
                    <button data-url="{{route('site.cart.delete' , ['id' => $cart->id])}}"
                            class="fa fa-trash deleteItem"></button>
                </div><!--End Shop-item-info-->
            @endforeach
        @endif
        @php
            $items = \Cart::getContent();
            $sum = 0;
            $currency = session()->get('currency');
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

        <div class="cart-footer">
            <div class="total">
                Total : <span> {{$sum}} </span>
            </div>
            <a href="{{route('site.cart')}}" class="custom-btn">
                <span>
                    Cart <i class="fa fa-arrow-right"></i>
                </span>
            </a>
            @if(sizeof(Cart::getContent()) >0)
                <a href="{{route('site.checkout')}}" class="custom-btn green-bc">
                    <span>
                        Checkout <i class="fa fa-arrow-right"></i>
                    </span>
                </a>
            @else
                <a href="{{route('site.categories')}}" class="custom-btn green-bc">
                    <span>
                        Add to cart <i class="fa fa-arrow-right"></i>
                    </span>
                </a>
            @endif
        </div>
    </div>
</div>