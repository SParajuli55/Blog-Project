@include('dashboard::layouts.master');
@section('content')
<div class="content-wrapper">
    <h1> blogs details of corresponding category</h1>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
          </tr>
        </thead>



            @foreach ($blogs as $blog)
            <tbody>
                <tr>
            <th>{{$loop->iteration }}</th>
            <th>{{$blog->name }}</th>
            <th>{{$blog->description }}</th>
            <td>
                <img src="{{ url('uploads/images/blogs/' . $blog->image) }}" style="border-radius: 50%;"
                            width="100px" height="100px" alt="No image Found">
            </td>

                </tr>
        </tbody>
            @endforeach
      </table>
      <a href="{{ url('category/create-category') }}" class="btn btn-primary btn-sm">ADD Category</a>

</div>

