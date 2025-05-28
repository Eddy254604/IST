<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-20 text-center">
        <h1 class="text-3xl font-bold">Thank You!</h1>
        <p class="mt-4">Your message has been sent successfully. We will get back to you shortly.</p>
        
        <?php if (isset($_GET['name'])): ?>
            <div class="mt-4 bg-white p-4 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold">Message Details</h2>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($_GET['email']); ?></p>
                <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($_GET['message'])); ?></p>
            </div>
        <?php endif; ?>
        
        <a href="index.php" class="mt-5 inline-block bg-blue-600 text-white py-2 px-4 rounded">Back to Home</a>
    </div>
</body>
</html>