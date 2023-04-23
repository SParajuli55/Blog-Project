<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

</body>
</html>

<div class=content-wrapper>
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="row form" id="form">
        <div class="col-6 mx-auto mt-3">
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <h1>Login</h1>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="" value="{{ old('email') }}">
                    <div id="email" class="form-text">We'll never share your email with anyone else.</div>
                    <span class= "text-danger">
                      @error('email'){{$message }}
                      @enderror
                  </span>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <span class= "text-danger">
                      @error('password'){{ $message }}
                      @enderror
                  </span>
                  </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="check-me-out" name="check-me-out">
                  <label class="form-check-label" for="check-me-out">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
                <a href="{{ route('auth.register') }}">Not registerd? Register Here!!</a>

              </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>
</html>

