<?php
if ($_POST) {
    $conn = new mysqli("localhost", "root", "", "db_blog");
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'] ?? 'Admin';
    $sql = "INSERT INTO posts (title, content, author) VALUES ('$title', '$content', '$author')";
    if ($conn->query($sql)) header("Location: index.php");
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Post Baru</title>
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-4"><i class="fas fa-pen-fancy me-2"></i>Buat Post Baru</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-heading me-1"></i>Judul</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-paragraph me-1"></i>Isi Artikel</label>
                                <textarea name="content" class="form-control" rows="8" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-user me-1"></i>Penulis</label>
                                <input type="text" name="author" class="form-control" value="Admin">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Publish</button>
                                <a href="index.php" class="btn btn-secondary"><i class="fas fa-times me-2"></i>Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>