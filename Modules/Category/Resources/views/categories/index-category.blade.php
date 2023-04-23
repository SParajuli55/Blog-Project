@include('dashboard::layouts.master');
@section('content')
<div class="content-wrapper">
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="form-group text-right col-9" >
        <form action="{{ route('category.index') }}" method="GET">
        <input type="search" name="search" value="" required/>
        <button class="btn btn-primary">Search</button>
        </form>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            <th scope="col">Add Blog</th>

          </tr>
        </thead>



            @foreach ($categories as $category)
            <tbody>
                <tr>
            <th>{{$loop->iteration }}</th>
            <th>{{$category->name }}</th>
            <th>
                <a href="{{ url('category/show-category/'.$category->id) }}" class="btn btn-primary">Show all blogs</a>
                <a href="{{ url('category/edit-category/'.$category->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('category/delete-category/'.$category->id) }}" class="btn btn-danger">Delete</a>
            </th>
            <th>
                <a href="{{ url('blog/create-blogs') }}" class="btn btn-sm btn-primary">Add Blog</a>

            </th>
                </tr>
        </tbody>
            @endforeach
      </table>
      <a href="{{ url('category/create-category') }}" class="btn btn-primary btn-sm">ADD Category</a>

</div>

