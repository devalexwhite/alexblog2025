<?php
// Load environment variables
$envFile = __DIR__ . '/.env';
$adminPassword = '';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            if ($key === 'ADMIN_PASSWORD') {
                $adminPassword = $value;
            }
            putenv($key . '=' . $value);
        }
    }
}

// Get form data
$topic = isset($_POST['topic']) ? trim($_POST['topic']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validate inputs
$errors = [];

if (empty($topic)) {
    $errors[] = 'Topic is required';
} elseif (strlen($topic) > 200) {
    $errors[] = 'Topic must not exceed 200 characters';
}

if (empty($password)) {
    $errors[] = 'Password is required';
} elseif (strlen($password) > 30) {
    $errors[] = 'Password must not exceed 30 characters';
}

// Verify password
if (empty($errors) && $password !== $adminPassword) {
    $errors[] = 'Incorrect password';
}

// If validation fails, redirect back to admin panel
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: admin.php');
    exit;
}

// Load RSS feed or create new one
$rssFile = __DIR__ . '/rss.xml';

// Create new RSS with single topic entry
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel></channel></rss>');

$xml->channel->addChild('title', 'DiscuRSS Discussion Feed');
$xml->channel->addChild('link', 'https://thatalexguy.dev/discurss');
$xml->channel->addChild('description', 'Topic based discussion entirely in RSS');
$xml->channel->addChild('language', 'en-us');

// Add new topic as first item
$newItem = $xml->channel->addChild('item');
$newItem->addChild('title', htmlspecialchars($topic));
$newItem->addChild('author', 'Admin');
$newItem->addChild('pubDate', gmdate('D, d M Y H:i:s T'));
$newItem->addChild('description', 'New topic posted! Join the discussion at https://thatalexguy.dev/discurss');
$newItem->addChild('link', 'https://thatalexguy.dev/discurss');

// Save RSS
$xml->asXML($rssFile);

// Display success message
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiscuRSS Admin - Topic Posted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .success {
            color: #2e7d32;
            background-color: #e8f5e9;
            padding: 15px;
            border-left: 4px solid #2e7d32;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        .topic-display {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        a {
            color: #d32f2f;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="success">
            <h2>New Topic Posted!</h2>
            <p>The daily topic has been updated and all previous replies have been cleared.</p>
        </div>

        <div class="topic-display">
            <h3>New Topic:</h3>
            <p><?php echo htmlspecialchars($topic); ?></p>
        </div>

        <p><a href="admin.php">← Back to Admin Panel</a></p>
    </div>
</body>

</html>