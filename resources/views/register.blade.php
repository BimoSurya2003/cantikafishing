<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-sm mt-5" style="width: 24rem;">
            <h3 class="text-center mb-4">Register</h3>
    
            <!-- Error messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="register-name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="register-email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="register-password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="register-confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="password_confirmation" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
    
            <!-- Login Link -->
            <div class="text-center mt-4">
                <p>Already have an account? <a href="/login">Login here</a></p>
            </div>
        </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>