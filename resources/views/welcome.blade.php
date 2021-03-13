
@extends('layouts.app')
@section('title')
    Welcome Page
@endsection

@section('header')
    <h1>All Product</h1>
@endsection

@section('content')
	 @if (empty($products)) 
        <div class="alert alert-warning">
          The list of product is empty
        </div>

      @else
      <div class="row">	
        @foreach ($products as $product)
          <div class="col-3">
          	@include('components.product-card')
          </div>
        @endforeach
      </div>
    @endif
   	
    
@endsection



