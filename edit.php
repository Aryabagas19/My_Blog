<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "db_blog");
$sql = "SELECT * FROM posts WHERE id=$id";
$row = $conn->query($sql)->fetch_assoc();
if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $update_sql = "UPDATE posts SET title='$title', content='$content', author='$author' WHERE id=$id";
    if ($conn->query($update_sql)) header("Location: index.php");
    $conn->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit: <?= htmlspecialchars($row['title']) ?></title>
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
                        <h1 class="text-center mb-4"><i class="fas fa-edit me-2"></i>Edit Post</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-heading me-1"></i>Judul</label>
                                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($row['title']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-paragraph me-1"></i>Isi Artikel</label>
                                <textarea name="content" class="form-control" rows="8" required><?= htmlspecialchars($row['content']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-user me-1"></i>Penulis</label>
                                <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($row['author']) ?>">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update</button>
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