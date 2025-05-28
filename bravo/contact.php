<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white py-5 text-center">
        <h1 class="text-4xl font-bold">Contact Us</h1>
        <p class="mt-2">We'd love to hear from you!</p>
    </header>

    <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3">
                <a href="index.php" class="text-xl font-semibold">MyApp</a>
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
        <h2 class="text-3xl font-semibold mb-4">Get in Touch</h2>
        <p class="text-gray-700 mb-6">If you have any questions or need assistance, please fill out the form below:</p>
        
        <form action="process_contact.php" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" />
                </div>
            </div>

            <div class="mt-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" rows="4"></textarea>
            </div>

            <button type="submit" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded">Send Message</button>
        </form>

        <h2 class="text-3xl font-semibold mt-8 mb-4">Contact Information</h2>
        <p class="text-gray-700">You can also reach us at:</p>
        <ul class="list-disc list-inside text-gray-700">
            <li>Email: Eddy machira @gmail.com</li>
            <li>Phone: +254 456-7890</li>
            <li>Address: 00-100 Nairobi</li>
        </ul>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>