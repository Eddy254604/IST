<?php
session_start();
require 'db_connection.php';

// Get user ID from query string
$user_id = $_GET['id'];

// Fetch user data
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Update user in the database
    $query = "UPDATE users SET name='$name', email='$email' WHERE id=$user_id";
    if (mysqli_query($conn, $query)) {
        header("Location: user_management.php?success=User updated successfully");
        exit;
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white py-5 text-center">
        <h1 class="text-4xl font-bold">Edit User</h1>
    </header>

    <main class="container mx-auto mt-5 px-4">
        <form action="edit_user.php?id=<?php echo $user_id; ?>" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" />
            </div>
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" />
            </div>
            <button type="submit" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded">Update User</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="text-red-600 mt-4"><?php echo $error; ?></p>
        <?php endif; ?>
    </main>
</body>
</html>