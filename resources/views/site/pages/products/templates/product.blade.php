<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel2">
        {{$product->name}}
    </h4>
</div>
<div class="modal-body">
    <img src="{{asset('storage/app/products/'.$product->image)}}">
    <span> Price : {{$product->price()}}</span>
    <span> Category : {{$product->category->name}}</span>
    @foreach(explode("\n" , $product->description) as $item)
        <p>
            {{$item}}
        </p>
    @endforeach
</div>
<div class="modal-footer">
    <button class="custom-btn add-to-cart" data-url="{{route('site.cart.add',['id' => $product->id])}}">
        <span>
            <i class="fa fa-shopping-bag"></i>
            add to cart
        </span>
    </button>
</div>