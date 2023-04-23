@extends('dashboard::layouts.master')
@section('content')
    <div class="content-wrapper">
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="topnav">
            <a href="{{ url('/blog/create-blogs') }}" class="btn btn-primary btn-info pull-right">Add Blog</a>
            <div class="container"><br>

                <form action="{{ route('blogs.view') }}" method="GET">
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
                        <a href="{{ url('blog/show-blogs/' . $blog->id) }}"
                            class="btn btn-primary btn-sm">Show</a>
                        <a href="{{ route('blogs.edit', ['id' => $blog->id]) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('blog/delete-blogs/' . $blog->id) }}"
                            class="btn btn-danger btn-sm">Delete</a>

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

