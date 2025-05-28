<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Nerd App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white py-5 text-center">
        <h1 class="text-4xl font-bold">Welcome to MyApp</h1>
        <p class="mt-2">Your gateway to managing your account and accessing features.</p>
    </header>

    <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3">
                <a href="#" class="text-xl font-semibold">Nerd App</a>
                <div class="space-x-4">
                    <a href="index.php" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="register.php" class="text-gray-700 hover:text-blue-600">Register</a>
                    <a href="login.php" class="text-gray-700 hover:text-blue-600">Login</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php" class="text-gray-700 hover:text-blue-600">Logout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-5 px-4">
        <h2 class="text-3xl font-semibold mb-4">Featured Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <h5 class="font-semibold text-lg">User Management</h5>
                <p class="text-gray-700">Manage user accounts, view profiles, and control access.</p>
                <a href="user_management.php" class="mt-3 inline-block bg-blue-600 text-white py-2 px-4 rounded">Manage Users</a>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <h5 class="font-semibold text-lg">Reports</h5>
                <p class="text-gray-700">Generate detailed reports on user activity and system performance.</p>
                <a href="reports.php" class="mt-3 inline-block bg-blue-600 text-white py-2 px-4 rounded">View Reports</a>
            </div>
            <div class="bg-white p-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <h5 class="font-semibold text-lg">Settings</h5>
                <p class="text-gray-700">Adjust application settings and user preferences.</p>
                <a href="settings.php" class="mt-3 inline-block bg-blue-600 text-white py-2 px-4 rounded">Go to Settings</a>
            </div>
        </div>

        <h2 class="text-3xl font-semibold mt-8 mb-4">Latest Updates</h2>
        <ul class="bg-white rounded-lg shadow-lg">
            <li class="p-4 border-b">✨ New features added to user management.</li>
            <li class="p-4 border-b">🚀 Performance improvements in the reporting module.</li>
            <li class="p-4">🔒 Updated privacy policy effective immediately.</li>
        </ul>

        <h2 class="text-3xl font-semibold mt-8 mb-4">Upcoming Features</h2>
        <div class="bg-white p-5 rounded-lg shadow-lg">
            <h5 class="font-semibold text-lg">User Analytics</h5>
            <p class="text-gray-700">Get insights into user behavior and engagement metrics.</p>
            <p class="mt-2">Stay tuned for more updates!</p>
        </div>

        <h2 class="text-3xl font-semibold mt-8 mb-4">Contact Support</h2>
        <div class="bg-white p-5 rounded-lg shadow-lg">
            <p class="text-gray-700">If you have any questions or need assistance, feel free to reach out!</p>
            <a href="contact.php" class="mt-3 inline-block bg-blue-600 text-white py-2 px-4 rounded">Contact Us</a>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>