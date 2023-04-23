
@extends('dashboard::layouts.master');
@section('content')
<div class="content-wrapper">
  <div class="container mt-6">


  <div class="card">
    <div class="card-header text-center font-weight-bold">
    Add Category
    </div>

    <div class="card-body">
      <form method="post" action="{{ url('category/create-category') }}">
       @csrf
        <div class="form-group col-md-6">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
</div>



