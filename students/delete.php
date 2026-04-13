<?php
include "../config/db.php";

$id = $_GET['id'] ?? null;
if(!$id) { header("Location: ../dashboard.php"); exit(); }

// Fetch student info for display
$stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if(!$row) { header("Location: ../dashboard.php"); exit(); }

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $stmt = $pdo->prepare("DELETE FROM students WHERE id=?");
    $stmt->execute([$id]);
    header("Location: ../dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #fff5f5; } /* Slight reddish tint to signify danger */
        .card { border: none; border-top: 5px solid #dc3545; border-radius: 12px; }
        .warning-icon { font-size: 4rem; color: #dc3545; }
    </style>
</head>

<body class="d-flex align-items-center vh-100">

<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 text-center" style="width: 400px;">
        
        <div class="warning-icon mb-2">
            <i class="bi bi-exclamation-octagon-fill"></i>
        </div>

        <h4 class="fw-bold text-dark">Are you sure?</h4>
        <p class="text-muted px-3">
            You are about to permanently delete the student record for:
        </p>
        
        <div class="bg-light p-3 rounded mb-4">
            <h5 class="mb-0 fw-bold"><?= htmlspecialchars($row['name']) ?></h5>
            <small class="text-muted"><?= htmlspecialchars($row['course']) ?></small>
        </div>

        <form method="POST">
            <button type="submit" class="btn btn-danger w-100 py-2 fw-bold mb-2">
                <i class="bi bi-trash3 me-2"></i> Confirm Delete
            </button>
            <a href="../dashboard.php" class="btn btn-link text-secondary text-decoration-none">
                No, Keep Record
            </a>
        </form>

    </div>
</div>

</body>
</html>