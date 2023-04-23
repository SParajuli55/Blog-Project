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
        <div class="container mt-4">

            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Edit Blog
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('userblogs.update', ['id' => $blog->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-6">
                            <label for="name"> Blog Name</label>
                            <input type="text" id="name" name="name" class="form-control" required=""
                                value="{{ $blog->name }}">
                            <div><br>

                                <div class="dropdown col-md-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id">
                                        <option value="{{ optional($blog->categories)->id }}">
                                            {{ optional($blog->categories)->name }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div><br>




                                <div class="form-group col-md-8">
                                    <label for="description">Description</label>
                                    <input type="text" id="description" name="description" class="form-control" required
                                        value="{{ $blog->description }}">
                                </div><br>


                                <div class="form-group col-md-6">
                                    <label for="image">Blog Image</label>
                                    <input type="file" id="image" name="image" class="form-control"
                                        value="{{ $blog->image }}">
                                    <img src="{{ url('uploads/images/blogs/' . $blog->image) }}"
                                        style="border-radius: 50%;" width="100px" height="100px" alt="No image Found">
                                </div><br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </body>


    </html>
