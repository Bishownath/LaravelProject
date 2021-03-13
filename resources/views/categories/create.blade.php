@extends('layouts.app')

@section('content')
<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label>Category name</label>
    <input type="text" name="name" class="form-control"  placeholder="Category Name" required>
  </div>

  <button type="submit" class="btn btn-primary">Create New Category</button>
</form>
@endsection