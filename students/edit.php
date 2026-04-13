<?php
include "../config/db.php";
$id = $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $stmt = $pdo->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->execute([$name, $email, $course, $id]);

    header("Location: ../dashboard.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student | Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: linear-gradient(135deg, #f8f9fc 0%, #e2e8f0 100%); min-height: 100vh; }
        .card { border: none; border-radius: 16px; border-top: 5px solid #4e73df; }
        .btn-primary { background-color: #4e73df; border: none; padding: 12px; font-weight: 600; }
    </style>
</head>
<body class="d-flex align-items-center vh-100">

<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="width: 450px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold">Update Profile</h3>
            <p class="text-muted small">Modifying record for Student ID: <strong>#<?= htmlspecialchars($id) ?></strong></p>
        </div>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted text-uppercase">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person-fill"></i></span>
                    <input type="text" name="name" class="form-control border-start-0" value="<?= htmlspecialchars($row['name']) ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold text-muted text-uppercase">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope-at"></i></span>
                    <input type="email" name="email" class="form-control border-start-0" value="<?= htmlspecialchars($row['email']) ?>" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold text-muted text-uppercase">Course Enrolled</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-book-half"></i></span>
                    <input type="text" name="course" class="form-control border-start-0" value="<?= htmlspecialchars($row['course']) ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3 shadow-sm">
                <i class="bi bi-check-circle me-1"></i> Update Record
            </button>

            <a href="../dashboard.php" class="btn btn-light w-100 text-muted border">Cancel</a>
        </form>
    </div>
</div>

</body>
</html>