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
            <h3 class="text-center mb-4">Login</h3>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="login-email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="login-password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label" for="remember"> Remember me </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <!-- Divider -->
            <hr class="my-4">

            <!-- Login with Google -->
            <div class="text-center">
                <a href="/auth/redirect" class="btn btn-outline-success w-100">
                    <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google logo" class="me-2">
                    Login with Google
                </a>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="/register">Register here</a></p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>