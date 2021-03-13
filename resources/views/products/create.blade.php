
@extends('layouts.app')
@section('titleTab')
	Creating Product
@endsection
@section('content')

<h2>Create a product</h2>
	<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter title">
	  </div>

		<div class="form-group">
		    <label>Description</label>
		    <input type="text" class="form-control" name="description" value="{{old('description')}}" placeholder="Enter description" >
	  </div>

	  <div class="form-group">
		    <label>Price</label>
		    <input type="number" class="form-control" name="price" min="1.00" step="0.01" value="{{old('price')}}" placeholder="Enter price">
	  </div>

	  <div class="form-group">
		    <label>Stock</label>
		    <input type="number" class="form-control" name="stock" min="0"  value="{{old('stock')}}" placeholder="Enter stock">
	  </div>

	  <div class="form-group">
		    <label>Status</label>
		    <select name="status">
		    	<option value="" selected >Select</option>
		    	<option value="available" {{old('status')=='available' ? 'selected' :''}}>	
		    		Available
		    	</option>
		    	<option value="unavailable" {{old('status')=='unavailable' ? 'selected' :''}}>
		    		Unavailable
		    	</option>
		    </select>
	  </div>

	  <div class="form-group row">
		<label for="image" class="col-md col-form-label text-md-left">Product Image</label>
		<div class="col-md-12">
			<input type="file" class="form-control" name="image">
		</div>
	</div>

	<div class="form-group">
		    <label>Category</label>
		    <select name="category_id">
			<option selected>Select </option>
			@foreach($categories as $cat)
		    	<option value="{{ $cat->id }}" >{{$cat->name}}</option>
			@endforeach
		    </select>
	  </div>


	  <div class="form-group">
		    <button class="btn btn-primary mt-2" value="submit">Submit</button>
	  </div>
	</form>
@endsection