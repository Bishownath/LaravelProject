
	<div class="card mt-3">
		<a href="{{ route('products.show',[$product->id])}}">
			<img class="card-img-top" src="{{url('img/products/', $product->image)}}" height="350"> 
		</a>
		<div class="card-body">
			<h4 class="text-right"><strong>${{$product->price}}</strong></h4>
			<h4 class="card-title">{{$product->title}}</h4>
			<p class="card-text">{{$product->description}}</p>
			<p class="card-text"><strong>{{$product->stock}} left</strong></p>
			<p class="card-text">Category :: {{$product->category['name']}}</p>
			
			@if(isset($cart))			
				<form action="{{ route('products.carts.destroy', ['product'=> $product->id, 'cart'=> $cart->id]) }}" method="POST">
					<!-- @csrf
					 -->
					{{ csrf_field() }}
					@method('DELETE')

					<button type="submit" class="btn btn-danger">Remove From Cart</button>
				</form>

			@else
				<form action="{{ route('products.carts.store', ['product'=> $product->id]) }}" method="POST">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-primary">Add To Cart</button>
				</form>
			@endif
  		</div>
	</div>	