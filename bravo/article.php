<?php
$host = 'localhost';
$db = 'myapp';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert logic
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $author = $_POST['author'] ?? '';
    $category = $_POST['category'] ?? '';
    $tags = $_POST['tags'] ?? '';
    $body = $_POST['body'] ?? '';

    if ($title && $author && $category && $body) {
        $stmt = $conn->prepare("INSERT INTO articles (title, description, author, category, tags, body, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssssss", $title, $description, $author, $category, $tags, $body);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php?success=1");
        exit;
    } else {
        $error = "Please fill in all required fields.";
    }
}

$result = $conn->query("SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Articles - MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Submit New Article</h1>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Article submitted successfully!</div>
        <?php endif; ?>

        <form method="POST" class="row g-3 mb-5">
            <div class="col-md-6">
                <label for="title" class="form-label">Title *</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="description" class="form-label">Short Description</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <div class="col-md-6">
                <label for="author" class="form-label">Author *</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="category" class="form-label">Category *</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="">Choose...</option>
                    <option value="News">News</option>
                    <option value="Technology">Technology</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Education">Education</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="tags" class="form-label">Tags (comma-separated)</label>
                <input type="text" name="tags" id="tags" class="form-control">
            </div>

            <div class="col-12">
                <label for="body" class="form-label">Body *</label>
                <textarea name="body" id="body" rows="6" class="form-control" required></textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Article</button>
            </div>
        </form>

        <h2 class="mb-4">Submitted Articles</h2>

        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title"><?= htmlspecialchars($row['title']) ?></h4>
                    <?php if (!empty($row['description'])): ?>
                        <h6 class="text-muted"><?= htmlspecialchars($row['description']) ?></h6>
                    <?php endif; ?>
                    <p class="text-muted mb-1">
                        <small>
                            By <?= htmlspecialchars($row['author']) ?> in <?= htmlspecialchars($row['category']) ?>
                            • <?= date('M d, Y', strtotime($row['created_at'])) ?>
                        </small>
                    </p>
                    <p><?= nl2br(htmlspecialchars(substr($row['body'], 0, 200))) ?>...</p>
                    <p><small class="text-secondary">Tags: <?= htmlspecialchars($row['tags']) ?></small></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
