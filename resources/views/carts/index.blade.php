@extends('layouts.app')
@section('title')
    Cart Page
@endsection

@section('header')
    <h1>My Cart</h1>
@endsection

@section('content')
	 @if ($cart->product) 
        <div class="alert alert-warning">
          The list of product is empty
        </div>

      @else
      <div class="row">	
        @foreach ($cart->products as $product)
          <div class="col-3">
          	@include('components.product-card')
          </div>
        @endforeach
      </div>
    @endif
@endsection



