<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "db_blog");
$sql = "SELECT * FROM posts WHERE id=$id";
$row = $conn->query($sql)->fetch_assoc();
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($row['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
        </div>
    </nav>
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h1><?= htmlspecialchars($row['title']) ?></h1>
                        <p class="text-muted mb-4"><i class="fas fa-user me-1"></i><?= htmlspecialchars($row['author']) ?> | <i class="fas fa-clock me-1"></i><?= $row['created_at'] ?></p>
                        <div class="lead mb-0"><?= nl2br(htmlspecialchars($row['content'])) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-primary"><i class="fas fa-home me-2"></i>Kembali</a>
        </div>
    </div>
</body>
</html>