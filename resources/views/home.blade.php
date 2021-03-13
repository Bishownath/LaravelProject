@extends('layouts.app')

<!-- listing the categories and products in left side -->
@section('content_listing')
<div class="container">
  <div class="row justify-content-center ml-auto">
    <div class="col-md mr-5">
    <div class="card">
    <div class="card-body"><a href="categories"><button class="btn btn-secondary"><strong>Category</strong></button></a></div>
        <!-- <div class="card-body"><a href="/"><strong>Product</strong></a></div> -->
        
    </div>
    <div class="card">
        <div class="card-body"><a href="products"><button class="btn btn-secondary"><strong>Product</strong></button></a></div>
    </div>

    <div class="card">
        <div class="card-body"><a href="carts"><button class="btn btn-secondary"><strong>Cart</strong></button></a></div>
    </div>

    </div>



    <div class="col-md">
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        


            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
            </div>
        
        @endif
        <div class="alert alert-info" role="alert">
                {{ session('status') }}
                {{ __('You are logged in as ' .Auth::user()->name)  }}

            </div>
       

        
    </div>
    </div>
    </div>
@endsection



@section('content')
<!-- <div class="container">
    <div class="row justify-content-center ml-auto">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
