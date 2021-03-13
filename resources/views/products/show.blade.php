<!-- ################### IMPORTANT ################### -->
<!-- {{-- <p>{!! $product !!}</p>  escaping the html tags from the blade file using {!! !!}--}} -->

<!--  <p>@{{ name }}</p> => adding js framework in laravel using @ , name is the variable in JS-->
<!-- donot use html commenting style in .blade.php -->

@extends('layouts.app')
@section('titleTab')
	Listing Product
@endsection

<div class="row">
            <div class="col-md-offset-1 col-md-11">
			@section('content')
				@include('components.product-card')
			@endsection

            </div>
          </div>





