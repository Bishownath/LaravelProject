
  @extends('layouts.app')
  @section('titleTab')
    Products
  @endsection

  @section('content')
        <h1> Products</h1>
          <a class="btn btn-success mb-2" href="{{route('products.create')}}">Create</a>
      
    @if (empty($products)) 
        <div class="alert alert-warning">
          The list of product is empty
        </div>

      
      @else
      	<div class="table-responsive">
      	<table class="table table-striped">
        <thead>
          <th>Id</th>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Status</th>
          <th>Category</th>
          
          <th></th>
          <th>Action</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <th>{{$product->status}}</th>
            <th>{{$product->category['name']}}</th>

            <td>
              <a class="btn btn-info" href="{{ route('products.show',[$product->id])}}">Show</a>
            </td>

            <!-- <td><a class="btn btn-info" href="{{ route('products.show',[$product->title])}}">Show</a></td> -->

            <td><a class="btn btn-success" href="{{ route('products.edit',[$product->id])}}">Edit</a></td>
            <!-- <td><a href="{{ route('products.destroy',[$product->id])}}"> -->
              <td><form method="POST" action="{{ route('products.destroy', [$product->id]) }}">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              </td>
            
          </tr>
        @endforeach
        </tbody>
      </table> 
      </div>
    @endif
  @endsection