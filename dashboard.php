<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: auth/login.php");
    exit();
}
include "config/db.php";

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management | Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background-color: #ffffff; border-bottom: 1px solid #e3e6f0; }
        .card { border: none; border-radius: 12px; }
        .table thead { background-color: #f8f9fc; }
        .btn-action { border-radius: 8px; transition: all 0.2s; }
        .btn-action:hover { transform: translateY(-1px); }
        .status-badge { font-size: 0.85rem; padding: 5px 12px; border-radius: 50px; }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#"><i class="bi bi-mortarboard-fill me-2"></i>EduDash</a>
        <div class="d-flex align-items-center">
            <span class="me-3 text-muted d-none d-md-inline">Welcome, <strong><?= htmlspecialchars($_SESSION['user']['username'] ?? 'Admin') ?></strong></span>
            <a href="auth/logout.php" class="btn btn-outline-danger btn-sm rounded-pill">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container">
    
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="fw-bold mb-0 text-dark">Student Directory</h3>
            <p class="text-muted small mb-0">Manage and view all enrolled student records.</p>
        </div>
        <div class="col-auto">
            <a href="students/add.php" class="btn btn-primary px-4 fw-bold shadow-sm btn-action">
                <i class="bi bi-plus-lg me-2"></i> Add New Student
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">ID</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Full Name</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Email Address</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Course</th>
                            <th class="py-3 text-end pe-4 text-uppercase small fw-bold text-muted">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($students)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No students found in the database.</td>
                        </tr>
                        <?php endif; ?>

                        <?php foreach($students as $row): ?>
                        <tr>
                            <td class="ps-4 fw-bold text-muted">#<?= $row['id'] ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                        <?= strtoupper(substr($row['name'], 0, 1)) ?>
                                    </div>
                                    <span class="fw-semibold"><?= htmlspecialchars($row['name']) ?></span>
                                </div>
                            </td>
                            <td class="text-muted small"><?= htmlspecialchars($row['email']) ?></td>
                            <td><span class="badge bg-light text-dark border fw-normal status-badge"><?= htmlspecialchars($row['course']) ?></span></td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm">
                                    <a href="students/view.php?id=<?= $row['id'] ?>" class="btn btn-white btn-sm border" title="View Details">
                                        <i class="bi bi-eye text-info"></i>
                                    </a>
                                    <a href="students/edit.php?id=<?= $row['id'] ?>" class="btn btn-white btn-sm border" title="Edit Profile">
                                        <i class="bi bi-pencil-square text-primary"></i>
                                    </a>
                                    <a href="students/delete.php?id=<?= $row['id'] ?>" class="btn btn-white btn-sm border" onclick="return confirm('Are you sure?')" title="Remove">
                                        <i class="bi bi-trash3 text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white py-3 border-top-0">
            <small class="text-muted">Total Students: <?= count($students) ?></small>
        </div>
    </div>
</div>

</body>
</html>