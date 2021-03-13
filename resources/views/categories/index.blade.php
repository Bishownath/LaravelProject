@extends('layouts.app')

@section('content')
    <h3><strong>Category</strong></h3>
    <a class="btn btn-success mb-3" href="{{route('categories.create')}}">Create Category</a>

    @if(empty($categories))
        <div class="alert alert-warning">
            The category list is empty
        </div>

    @else
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Created Time</th>
        <th></th>
        <th>Action</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->created_at->diffForHumans()}}</td>
      
      <td>
        <!-- <button type="submit" class="btn btn-success" name="archive">Edit</button> -->
        <td><a class="btn btn-success" href="{{ route('categories.edit',[$category->id])}}">Edit</a></td>
        <!-- <button type="submit" class="btn btn-warning" name="archive">Archive</button> -->
      </td>
      <td>
        <form method="post" action="{{route('categories.destroy', [$category->id]) }}" >
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  
    </tbody>
    </table>
    

    @endif
@endsection