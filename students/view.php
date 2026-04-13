<?php
include "../config/db.php";
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: ../dashboard.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if(!$student){
    echo "Student not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fc; }
        .profile-card { border: none; border-radius: 20px; overflow: hidden; }
        .profile-header { 
            background: linear-gradient(45deg, #4e73df 0%, #224abe 100%); 
            height: 120px; 
        }
        .avatar-placeholder { 
            width: 110px; height: 110px; 
            margin-top: -55px; 
            border: 6px solid #fff;
            font-size: 2.8rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .info-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            color: #b7b9cc;
            margin-bottom: 5px;
        }
        .info-value {
            font-size: 1.1rem;
            color: #4e5e7a;
            font-weight: 500;
        }
        .data-section {
            background-color: #ffffff;
            border: 1px solid #e3e6f0;
            border-radius: 12px;
            padding: 20px;
        }
    </style>
</head>
<body class="d-flex align-items-center vh-100">

<div class="container d-flex justify-content-center">
    <div class="card profile-card shadow-lg" style="width: 420px;">
        <div class="profile-header"></div>
        
        <div class="card-body text-center pt-0 px-4">
            <div class="avatar-placeholder bg-white rounded-circle mx-auto d-flex align-items-center justify-content-center text-primary fw-bold">
                <?= strtoupper(substr($student['name'], 0, 1)) ?>
            </div>

            <h3 class="mt-3 fw-bold text-dark mb-1"><?= htmlspecialchars($student['name']) ?></h3>
            <p class="text-muted small mb-4">Student ID: #<?= $student['id'] ?></p>

            <div class="text-start mb-4">
                <div class="data-section mb-3 shadow-sm">
                    <div class="info-label">Full Name</div>
                    <div class="info-value"><i class="bi bi-person me-2 text-primary"></i> <?= htmlspecialchars($student['name']) ?></div>
                </div>

                <div class="data-section mb-3 shadow-sm">
                    <div class="info-label">Email Address</div>
                    <div class="info-value"><i class="bi bi-envelope-at me-2 text-primary"></i> <?= htmlspecialchars($student['email']) ?></div>
                </div>

                <div class="data-section shadow-sm">
                    <div class="info-label">Course Enrolled</div>
                    <div class="info-value"><i class="bi bi-mortarboard me-2 text-primary"></i> <?= htmlspecialchars($student['course']) ?></div>
                </div>
            </div>

            <div class="d-grid gap-2 mb-3">
                <a href="../dashboard.php" class="btn btn-primary py-2 fw-bold rounded-pill">
                    <i class="bi bi-arrow-left-short fs-5 align-middle"></i> Back to Directory
                </a>
            </div>
        </div>
        
        <div class="card-footer bg-light border-0 py-3 text-center">
            <span class="text-muted extra-small" style="font-size: 0.7rem;">Record fetched from Database: <?= date("Y-m-d") ?></span>
        </div>
    </div>
</div>

</body>
</html>