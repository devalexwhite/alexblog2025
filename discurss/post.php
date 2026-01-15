<?php
// Get form data
$displayName = isset($_POST['displayName']) ? trim($_POST['displayName']) : '';
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

// Validate inputs
$errors = [];

if (empty($displayName)) {
    $errors[] = 'Display Name is required';
} elseif (strlen($displayName) > 100) {
    $errors[] = 'Display Name must not exceed 100 characters';
}

if (empty($comment)) {
    $errors[] = 'Comment is required';
} elseif (strlen($comment) > 500) {
    $errors[] = 'Comment must not exceed 500 characters';
}

// If validation fails, redirect back to index
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: index.php');
    exit;
}

// Load RSS feed
$rssFile = __DIR__ . '/rss.xml';

if (!file_exists($rssFile)) {
    header('Location: index.php');
    exit;
}

$xml = simplexml_load_file($rssFile);
$items = $xml->channel->item;

// Get current topic from first item
if (count($items) > 0) {
    $topicTitle = (string) $items[0]->title;
} else {
    $topicTitle = 'RE: Unknown Topic';
}

// Create new item
$newItem = $xml->channel->addChild('item');
$newItem->addChild('title', 'RE: ' . htmlspecialchars($topicTitle));
$newItem->addChild('author', htmlspecialchars($displayName));
$newItem->addChild('pubDate', gmdate('D, d M Y H:i:s T'));
$newItem->addChild('description', htmlspecialchars($comment));
$newItem->addChild('link', 'https://thatalexguy.dev/discurss');

// Keep only the topic (first item) plus last 50 replies
$itemsArray = $xml->channel->item;
$totalItems = count($itemsArray);

// If we have more than 51 items (1 topic + 50 replies), remove oldest replies
while ($totalItems > 51) {
    // Remove second item (first reply, as first item is the topic)
    unset($itemsArray[1]);
    // Re-index array
    $itemsArray = array_values($itemsArray);
    $totalItems = count($itemsArray);
}

// Save updated RSS
$xml->asXML($rssFile);

// Display success message
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiscuRSS - Reply Submitted</title>
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

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="success">
            <h2>Got it!</h2>
            <p>Your comment has been added to the <a href="rss.xml">RSS feed</a>! Subscribe to the feed for replies and
                new topics!</p>
        </div>

        <p><a href="index.php">← Back to DiscuRSS</a></p>
    </div>
</body>

</html>