<?php
$conn = new mysqli("localhost", "root", "", "db_blog");
if ($conn->connect_error) die("Koneksi gagal: " . $conn->connect_error);

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-blog me-2"></i>My Daily Routine Blog</a>
        </div>
    </nav>
    <div class="container mt-5 pt-4">
        <div class="hero">
            <h1><i class="fas fa-feather-alt me-2"></i>Selamat Datang!</h1>
            <p class="lead">Bagaimana Dengan Harimu</p>
        </div>
        <a href="add.php" class="btn btn-primary mb-3"><i class="fas fa-plus me-2"></i>Buat Post Baru</a>
        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                        <p class="card-text"><?= substr(htmlspecialchars($row['content']), 0, 120) ?>...</p>
                        <p class="text-muted"><i class="fas fa-user me-1"></i><?= htmlspecialchars($row['author']) ?> | <i class="fas fa-clock me-1"></i><?= $row['created_at'] ?></p>
                        <div class="d-flex gap-2">
                            <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Baca</a>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>