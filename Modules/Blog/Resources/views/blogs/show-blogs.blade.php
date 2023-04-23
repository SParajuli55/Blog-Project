@extends('dashboard::layouts.master')
@section('content')
    <div class="content-wrapper">
        {{-- <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div> --}}

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


            <tbody>

                <tr>
                    <td> {{ $blog->id }}</td>
                    <td> {{ $blog->name }}</td>
                    <td> {{ optional($blog->categories)->name }}</td>
                    <td>{{ $blog->description }} </td>
                    <td>
                        <img src="{{ url('uploads/images/blogs/' . $blog->image) }}" style="border-radius: 50%;"
                            width="100px" height="100px" alt="No image Found">
                    </td>
                    <td>
                        <a href="{{ route('blogs.edit', ['id' => $blog->id]) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('blog/delete-blogs/' . $blog->id) }}"
                            class="btn btn-danger btn-sm">Delete</a>

                    </td>

                </tr>

            </tbody>
        </table>
        <a href="{{ url('/blog/create-blogs') }}" class="btn btn-xs btn-info pull-right">Add Blog</a>



    </div>

