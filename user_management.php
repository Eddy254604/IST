<?php
session_start();
require 'db_connection.php';

// Fetch users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white py-5 text-center">
        <h1 class="text-4xl font-bold">User Management</h1>
    </header>

    <main class="container mx-auto mt-5 px-4">
        <h2 class="text-3xl font-semibold mb-4">User List</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td class="py-2 px-4 border-b"><?php echo $user['id']; ?></td>
                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($user['name']); ?></td>
                    <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td class="py-2 px-4 border-b">
                        <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="text-blue-600 hover:underline">Edit</a>
                        <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="add_user.php" class="mt-5 inline-block bg-blue-600 text-white py-2 px-4 rounded">Add New User</a>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>