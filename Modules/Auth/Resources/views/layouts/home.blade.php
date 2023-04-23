<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: #fff;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            font-size: 36px;
            margin: 0 0 20px;
        }
        p {
            font-size: 18px;
            line-height: 1.5;
            margin: 0 0 30px;
        }
        button {
            font-size: 16px;
            padding: 10px 20px;
            background-color: #008cba;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #005c80;
        }
    </style>
</head>
<body>
    <div class="container">





      <h1>Hello!!</h1>
     <h2>Welcome to my Blog Project</h2><br>

    <span>
         <a href="{{ route('authuser.index') }}"class="btn btn-primary btn-sm">Login</a>
            <a href="{{ route('auth.register')}}"class="btn btn-primary btn-sm">Register</a>
            <a href="{{ route('auth.admin-login')}}"class="btn btn-primary btn-sm">User Admin</a>
        </span>

    </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>
</html>
