<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
        }
        .login-card {
            border: none;
            border-radius: 15px;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4 login-card" style="width: 400px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Welcome Back</h2>
            <p class="text-muted">Please enter your details</p>
        </div>

        <form method="POST" action="process_login.php">
            <div class="mb-3">
                <label class="form-label small fw-bold">Username</label>
                <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter username" required>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">Don't have an account? <a href="#" class="text-decoration-none">Sign up</a></small>
        </div>
    </div>
</div>

</body>
</html>