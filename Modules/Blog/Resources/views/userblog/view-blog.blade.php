<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>


    <div class="content-wrapper">
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

                <div class="topnav">
                    <a href="{{ url('/') }}" class="btn btn btn-info pull-right">Home</a>
                    <div class="container"><br>
                        <div class="topnav">
                            <a href="{{ url('/userblog/create-blogs') }}" class="btn btn-primary btn-info pull-right">Add Blog</a>
                            <div class="container"><br>
                <form action="{{ route('userblogs.view') }}" method="GET">
                    <div class="input-group" class="form-outline" class="col-9">
                        <input type="search" id="search" name="search" class="form-control"
                            placeholder="Search by name">
                        <button class="btn btn-primary">Search</button>

                </form>
            </div>
        </div>
    </div>




    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

            </tr>
        </thead>


        @foreach ($blogs as $blog)
            <tbody>

                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td> {{ $blog->name }}</td>
                    <td> {{ optional($blog->categories)->name }}</td>
                    <td>{{ $blog->description }} </td>
                    <td>
                        <img src="{{ url('uploads/images/blogs/' . $blog->image) }}" style="border-radius: 50%;"
                            width="100px" height="100px" alt="No image Found">
                    </td>
                    <td>
                        <a href="{{ url('userblog/show-blogs/' . $blog->id) }}"
                            class="btn btn-primary btn-sm">Show</a>
                        <a href="{{ route('userblogs.edit', ['id' => $blog->id]) }}"
                            class="btn btn-primary btn-sm">Edit</a>


                    </td>

                </tr>

            </tbody>
        @endforeach
    </table>

    {{-- continue pagination --}}
    <div class='dataTables_paginate paging_simple_numbers float-right card-body'>
        {{ $blogs->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
    </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

