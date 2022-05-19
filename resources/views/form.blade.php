<!doctype html>
<html lang="en">
  <head>
    <title>Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <form action="{{ url('/') }}/register" method="POST">
     @csrf
     {{-- <pre>
      @php
       print_r($errors->all());
      @endphp    

      
     </pre> --}}
     <div class="container">
      <h1 class="text-center"> Registration Form</h1>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="name" value="{{ old('name') }}" >
      <span class="text-danger">
        @error('name')
         {{ $message }}
        @enderror
      </span>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="email" value="{{ old('email') }}">
      <span class="text-danger">
        @error('email')
         {{ $message }}
        @enderror
      </span>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="****">
      <span class="text-danger">
        @error('password')
         {{ $message }}
        @enderror
      </span>
    </div>
    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="****">
      <span class="text-danger">
        @error('password_confirmation')
         {{ $message }}
        @enderror
      </span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>