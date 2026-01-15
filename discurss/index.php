<?php
// Load and parse RSS feed
$rssFile = __DIR__ . '/rss.xml';
$currentTopic = 'Loading topic...';
$lastReply = 'No replies yet.';
$replyCount = 0;

if (file_exists($rssFile)) {
    $xml = simplexml_load_file($rssFile);
    $items = $xml->channel->item;
    $itemsCount = count($items);

    if ($itemsCount > 0) {
        // First item is the current topic
        $currentTopic = (string) $items[0]->title;


        // Last reply is the second item (index 1)
        if ($itemsCount > 1) {
            $lastReply = (string) $items[$itemsCount - 1]->description;
            $lastAuthor = (string) $items[$itemsCount - 1]->author;
            $lastReply = $lastAuthor . ': ' . $lastReply;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiscuRSS - Submit Reply</title>
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
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .topic-section {
            background-color: #e8f4f8;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin-bottom: 20px;
            border-radius: 3px;
        }

        .last-reply {
            background-color: #f0f0f0;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 3px;
            font-size: 14px;
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
            min-height: 120px;
        }

        input[type="text"] {
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
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: #d32f2f;
            padding: 10px;
            background-color: #ffebee;
            border-left: 4px solid #d32f2f;
            margin-bottom: 15px;
            border-radius: 3px;
        }

        .reply-count {
            color: #666;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>DiscuRSS</h1>
        <p>The only RSS based discussion thread on the net (<i>probably</i>).</p>
        <p>Subscribe to the <a href="https://thatalexguy.dev/discurss/rss.xml">RSS feed</a> to watch the discussion and
            be alerted when a new topic is posted!</p>

        <div class="topic-section">
            <h2>Today's Topic</h2>
            <p><?php echo htmlspecialchars($currentTopic); ?></p>
        </div>

        <div class="last-reply">
            <h3>Last Reply</h3>
            <p><?php echo htmlspecialchars($lastReply); ?></p>
            <div class="reply-count">Total replies: <?php echo $itemsCount - 1; ?> (max 50)</div>
        </div>

        <h2>Submit Your Reply</h2>
        <form method="POST" action="post.php">
            <div class="form-group">
                <label for="displayName">Public Display Name (max 100 characters)</label>
                <input type="text" id="displayName" name="displayName" maxlength="100" required>
                <div class="char-count"><span id="nameCount">0</span>/100</div>
            </div>

            <div class="form-group">
                <label for="comment">Comment (max 500 characters)</label>
                <textarea id="comment" name="comment" maxlength="500" required></textarea>
                <div class="char-count"><span id="commentCount">0</span>/500</div>
            </div>

            <button type="submit">Submit Reply</button>
        </form>
    </div>

    <script>
        const nameInput = document.getElementById('displayName');
        const commentInput = document.getElementById('comment');
        const nameCount = document.getElementById('nameCount');
        const commentCount = document.getElementById('commentCount');

        nameInput.addEventListener('input', () => {
            nameCount.textContent = nameInput.value.length;
        });

        commentInput.addEventListener('input', () => {
            commentCount.textContent = commentInput.value.length;
        });
    </script>
</body>

</html>