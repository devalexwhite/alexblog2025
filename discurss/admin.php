<?php
// Load and parse RSS feed
$rssFile = __DIR__ . '/rss.xml';
$currentTopic = 'Loading topic...';
$replyCount = 0;

if (file_exists($rssFile)) {
    $xml = simplexml_load_file($rssFile);
    $items = $xml->channel->item;

    if (count($items) > 0) {
        // First item is the current topic
        $currentTopic = (string) $items[0]->title;

        // Count replies (total items minus the topic item)
        $replyCount = count($items) - 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiscuRSS Admin - Set Topic</title>
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

        h1 {
            color: #333;
            border-bottom: 2px solid #d32f2f;
            padding-bottom: 10px;
        }

        .current-info {
            background-color: #fff3e0;
            padding: 15px;
            border-left: 4px solid #f57c00;
            margin-bottom: 20px;
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            box-sizing: border-box;
            resize: vertical;
            min-height: 100px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .char-count {
            font-size: 12px;
            color: #666;
            margin-top: 3px;
        }

        button {
            background-color: #d32f2f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #b71c1c;
        }

        .warning {
            background-color: #ffebee;
            color: #c62828;
            padding: 10px;
            border-left: 4px solid #d32f2f;
            margin-bottom: 15px;
            border-radius: 3px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Admin Panel - Set New Topic</h1>

        <div class="warning">
            ⚠️ Setting a new topic will clear all current replies!
        </div>

        <div class="current-info">
            <h2>Current Topic</h2>
            <p><strong><?php echo htmlspecialchars($currentTopic); ?></strong></p>
            <p>Current replies: <?php echo $replyCount; ?></p>
        </div>

        <h2>Set New Topic</h2>
        <form method="POST" action="topic.php">
            <div class="form-group">
                <label for="topic">New Topic (max 200 characters)</label>
                <textarea id="topic" name="topic" maxlength="200" required></textarea>
                <div class="char-count"><span id="topicCount">0</span>/200</div>
            </div>

            <div class="form-group">
                <label for="password">Admin Password (max 30 characters)</label>
                <input type="password" id="password" name="password" maxlength="30" required>
            </div>

            <button type="submit">Set New Topic</button>
        </form>
    </div>

    <script>
        const topicInput = document.getElementById('topic');
        const topicCount = document.getElementById('topicCount');

        topicInput.addEventListener('input', () => {
            topicCount.textContent = topicInput.value.length;
        });
    </script>
</body>

</html>