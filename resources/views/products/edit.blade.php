
@extends('layouts.app')
@section('titleTab')
	Edit Product
@endsection
@section('content')
<h1>Edit a product</h1>
	<form method="POST" action="{{ route('products.update',  [$product->id]) }}" enctype="multipart/form-data">
		@csrf
		@method('PUT')


		<div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" name="title" value="{{ old('title', $product->title)}}" placeholder="Enter title">
	  </div>

		<div class="form-group">
		    <label>Description</label>
		    <input type="text" class="form-control" name="description" value="{{old('description', $product->description )}}" placeholder="Enter description">
	  </div>

	  <div class="form-group">
		    <label>Price</label>
		    <input type="number" class="form-control" name="price" value="{{old('price', $product->price )}}" min="1.00" step="0.01" placeholder="Enter price">
	  </div>

	  <div class="form-group">
		    <label>Stock</label>
		    <input type="number" class="form-control" name="stock" value="{{old('stock', $product->stock )}}" min="0"  placeholder="Enter stock">
	  </div>

	  <div class="form-group">
		    <label>Status</label>
		    <select class="custom-select" name="status">
		    	<option value="available" {{old("$product->status =='available' ? 'selected' : ''")}}>
		    		Available
		    	</option>
		    	<option value="unavailable" {{old("$product->status =='unavailable' ? 'selected' : '' ")}}>
		    		Unavailable
		    	</option>
		    </select>
	  </div>	

	  <div class="form-group">
                 <label>Category</label>
                        <select class="form-control" name="category_id">
						<option value=""></option>
						@foreach($categories as $category)
                            <option value="{{ $category->id }}" {{$product->category->id == $category->id ? "selected" : "" }}>{{ $category->name}}</option>
                        @endforeach     
                        </select>
                    <br>
                </div>


	  <div class="form-group">
		    <button class="btn btn-primary mt-2" value="submit">Edit Product</button>
	  </div>
	</form>
@endsection

