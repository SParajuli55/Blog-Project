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

    <div class="row form" id="form">
        <div class="col-6 mx-auto mt-3">
            <form action="{{ route('auth.store') }}" method="POST">
                @csrf
                {{-- <div class="col-md-4"> --}}
                    <h1>Registration</h1>
                    <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required value="{{ old("name") }}">
                    <span class= "text-danger">
                        @error('name'){{ $message }}
                        @enderror
                    </span>
                  </div>
                {{-- <div class="col-md-4"> --}}
                    <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required value="{{ old("phone") }}">
                    <span class= "text-danger">
                        @error('phone'){{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required value="{{ old("address") }}">
                    <span class= "text-danger">
                        @error('address'){{ $message }}
                        @enderror
                    </span>
                  </div>

                  <div>
                    <label for="gender">{{ __('Gender') }}</label>
                    <select id="gender" name="gender" required>
                        <option value="unspecified" selected>Unspecified</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div><br>

                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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
                <a href="{{ route('auth.login') }}">Already registered? Login Here.</a>


              </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>
</html>

