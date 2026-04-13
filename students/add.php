<?php
include "../config/db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $stmt = $pdo->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $course]);

    header("Location: ../dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: linear-gradient(135deg, #f8f9fc 0%, #e2e8f0 100%); min-height: 100vh; }
        .card { border: none; border-radius: 16px; }
        .form-control:focus { border-color: #4e73df; box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25); }
        .btn-success { background-color: #1cc88a; border: none; padding: 12px; font-weight: 600; }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 450px;">
        <div class="text-center mb-4">
            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-person-plus-fill fs-3"></i>
            </div>
            <h3 class="fw-bold">Add New Student</h3>
            <p class="text-muted small">Fill in the details to register a new student</p>
        </div>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" class="form-control border-start-0" placeholder="e.g. John Doe" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="name@example.com" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold text-muted">Assigned Course</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-book"></i></span>
                    <input type="text" name="course" class="form-control border-start-0" placeholder="e.g. Computer Science" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 mb-3 shadow-sm">
                Save Student Record
            </button>

            <a href="../dashboard.php" class="btn btn-light w-100 text-muted border">
                <i class="bi bi-arrow-left me-1"></i> Cancel and Go Back
            </a>
        </form>
    </div>
</div>

</body>
</html>