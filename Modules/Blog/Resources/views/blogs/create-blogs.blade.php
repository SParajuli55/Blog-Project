@extends('dashboard::layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">

            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Create Blog
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-3">
                            <label for="name"> Blog Name</label>
                            <input type="text" id="name" name="name" class="form-control" required="">
                        </div>

                        <div class="dropdown col-md-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id">
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="description">Description</label>
                            <textarea type="text" id="description" name="description" class="form-control" required=""></textarea>
                        </div>



                        <label class="col-lg-2 col-form-label text-right">Blog Image:</label>
                        <div class="col-lg-4">
                            <input type="file" name="image" required class="form-control mb-2"
                                placeholder="Choose Image" value="{{ old('image') }}" />
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add Blog</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

