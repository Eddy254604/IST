<?php
session_start();

// DB connection
$host = 'localhost';
$db = 'myapp'; // Your DB name
$user = 'root'; // Your DB user
$pass = ''; // Your DB password
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $body = $tags = $category = $author = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $body = trim($_POST['body']);
    $tags = trim($_POST['tags']);
    $category = trim($_POST['category']);
    $author = trim($_POST['author']);
    $user_id = $_SESSION['user_id'] ?? null;

    // Validation
    if (empty($title)) $errors[] = "Title is required.";
    if (empty($body)) $errors[] = "Body content is required.";
    if (empty($author)) $errors[] = "Author is required.";

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO articles (title, body, tags, category, author, user_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $title, $body, $tags, $category, $author, $user_id);
        $stmt->execute();
        $stmt->close();

        header("Location: articles.php?success=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Article - MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Submit an Article</h1>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium">Title</label>
                <input type="text" name="title" class="w-full border px-3 py-2 rounded" value="<?= htmlspecialchars($title) ?>" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Body</label>
                <textarea name="body" rows="6" class="w-full border px-3 py-2 rounded" required><?= htmlspecialchars($body) ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">Tags (comma-separated)</label>
                <input type="text" name="tags" class="w-full border px-3 py-2 rounded" value="<?= htmlspecialchars($tags) ?>">
            </div>

            <div>
                <label class="block text-sm font-medium">Category</label>
                <select name="category" class="w-full border px-3 py-2 rounded">
                    <option value="">Select Category</option>
                    <option value="Technology" <?= $category == "Technology" ? "selected" : "" ?>>Technology</option>
                    <option value="Business" <?= $category == "Business" ? "selected" : "" ?>>Business</option>
                    <option value="Lifestyle" <?= $category == "Lifestyle" ? "selected" : "" ?>>Lifestyle</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Author</label>
                <input type="text" name="author" class="w-full border px-3 py-2 rounded" value="<?= htmlspecialchars($author) ?>" required>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Submit Article</button>
            </div>
        </form>
    </div>
</body>
</html>
