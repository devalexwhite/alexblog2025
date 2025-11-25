<?php

$DATABASE_PATH =  "sqlite:/var/data/1sa.sqlite";
// $DATABASE_PATH =  "sqlite:./test.sqlite";


$db = new PDO($DATABASE_PATH);

if (isset($_POST["mode"]) && $_POST["mode"] == "track") {
    $ip = null;

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP);
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP);
    } else {
        $ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
    }

    $path = $_POST['page'] ?? null;
    $referrer = $_POST['referrer'] ?? null;
    $ip_date_hash = md5(date("mdy") . $ip);
    $browser = $_SERVER['HTTP_USER_AGENT'];

    if (str_contains(strtolower($browser), 'firefox')) {
        $browser = 'Firefox';
    } elseif (str_contains(strtolower($browser), 'safari')) {
        $browser = 'Safari';
    } elseif (str_contains(strtolower($browser), 'chrome')) {
        $browser ='Chrome';
    }

    $stmt = $db->prepare("INSERT INTO views (ip_date_hash, visit_time, page, referrer, browser_agent) VALUES (:ip, :time, :page, :referrer, :browser)");
    $stmt->bindValue(':ip', $ip_date_hash);
    $stmt->bindValue(':time', date('Y-m-d H:i:s'));
    $stmt->bindValue(':page', $path);
    $stmt->bindValue(':referrer', $referrer);
    $stmt->bindValue(':browser', $browser);

    $stmt->execute();


    header('Content-Type: image/svg+xml');
} else {
    $stmt = $db->query("SELECT COUNT(DISTINCT ip_date_hash) as cnt FROM views WHERE datetime(visit_time) >= datetime('now', '-24 Hour')");
    $u24h = $stmt->fetch()['cnt'];

    $stmt = $db->query("SELECT COUNT(DISTINCT ip_date_hash) as cnt FROM views WHERE datetime(visit_time) >= datetime('now', '-7 Day')");
    $u7d = $stmt->fetch()['cnt'];

    $stmt = $db->query("
        SELECT COUNT(DISTINCT ip_date_hash) as cnt, strftime('%Y-%m-%d', visit_time) as visit_time FROM VIEWS 
        WHERE datetime(visit_time) >= datetime('now', '-7 day') 
        GROUP BY strftime('%Y-%m-%d', visit_time) 
        ORDER BY visit_time ASC
    ");
    $stmt->execute();
    $visitors_by_day = $stmt->fetchAll();

    $max_visitors = max(array_column($visitors_by_day, 'cnt'));

    $visitors_by_day_pct = array_map(function ($v) use ($max_visitors) {
        if ($v['cnt'] > 0) {
            return number_format($v['cnt'] / $max_visitors * 100, 2);
        }
        return 0;
    }, $visitors_by_day);


    $stmt = $db->query("SELECT COUNT(ip_date_hash) as cnt, page FROM views WHERE datetime(visit_time) >= datetime('now', '-7 Day') GROUP BY page ORDER BY cnt DESC");
    $stmt->execute();
    $views_by_page = $stmt->fetchAll();

    $stmt = $db->query("SELECT COUNT(ip_date_hash) as cnt, referrer FROM views WHERE datetime(visit_time) >= datetime('now', '-7 Day') AND referrer IS NOT NULL GROUP BY referrer ORDER BY cnt DESC");
    $stmt->execute();
    $views_by_referrer = $stmt->fetchAll();

    $stmt = $db->query("SELECT COUNT(DISTINCT ip_date_hash) as cnt, browser_agent FROM views WHERE datetime(visit_time) >= datetime('now', '-7 Day') AND browser_agent IS NOT NULL GROUP BY browser_agent ORDER BY cnt DESC");
    $stmt->execute();
    $top_browsers = $stmt->fetchAll();
}


?>

<?php if (isset($_POST["mode"]) && $_POST["mode"] == "track") { ?>
<?php } else { ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1Script Analytics</title>

    <style>
        header {
            background-color: #cfcfe1;
            padding: 0.5rem 1rem;
            font-family: Iowan Old Style, Apple Garamond, Baskerville, Times New Roman, Droid Serif, Times, Source Serif Pro, serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            line-height: 0;
            width: fit-content; 
            margin-bottom: 2rem;

            h1 {
                font-size: 2rem; 
                font-weight: 200;
                font-style: italic;
            }
        }
        body {
            background-color: #63639c;
            padding: 2rem;
        }

        details {
            box-shadow: 2px 2px 0px black;
            border-top: 1px solid white;
            border-left: 1px solid white;
            width: 100%;
            padding: 0.5rem;
            box-sizing: border-box;
            background-color: #dddddd;
        }

        table thead tr td {
            font-weight: bold;
        }

        table tr td {
            padding: 0.25rem;
        }

        .grid {
            display: grid;
            gap: 2rem;
        }

        @media (min-width: 320px) {
            .grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        @media (min-width: 600px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 801px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .graph {
            display: flex;
            flex-direction: row;
            align-items: flex-end;
            gap: 0.5rem;
            height: 200px;
            background-color: white;
            border: 1px solid black;
            padding: 0.5rem 0.5rem 0 0.5rem;
            box-shadow: inset 1px 1px 0 black;
            margin-bottom: 1rem;
        }

        .bar {
            width: 40px;
            background-color: #02ccff;
            border-left: 2px solid #66ffff;
            border-top: 2px solid #66ffff;
            border-right: 2px solid #0399cc;
        }

        .legend {
            width: 100%;
            display: flex;
            font-size: 0.75rem;
            justify-content: space-between;
            padding: 0 0.5rem;
            box-sizing: border-box;
            margin-bottom: 0.5rem;

            .tick {
                font-weight: bold;
            }
        }
    </style>
</head>

<body>
    <main>
        <header>
            <h1>Web Traffic</h1>
        </header>

        <div class="grid">
            <details open>
                <summary>
                    <strong>👤 Unique Visitors</strong>
                </summary>
                <p><strong><?php echo $u24h; ?></strong> visitor(s) in 24 hours</p>
                <p><strong><?php echo $u7d; ?></strong> visitor(s) in 7 days</p>

                <div class="graph">
                    <?php foreach ($visitors_by_day_pct as $pct) { ?>
                        <div class="bar" style="height: <?php echo $pct ?>%"></div>
                    <?php } ?>
                </div>
                <div class="legend">
                    <div class="tick">- 7 Days</div>
                    <div class="tick">Today</div>
                </div>
            </details>

            <details open>
                <summary>
                    <strong>📄 Views by Page (Past 7 Days)</strong>
                </summary>
                <table>
                    <thead>
                        <tr>
                            <td>Path</td>
                            <td>Views</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($views_by_page as $page) { ?>
                        <tr>
                            <td><?php echo $page['page'] ?></td>
                            <td><?php echo $page['cnt'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </details>

            <details open>
                <summary>
                    <strong>🗣️ Views by Referrer (Past 7 Days)</strong>
                </summary>
                <table>
                    <thead>
                        <tr>
                            <td>Referrer</td>
                            <td>Views</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($views_by_referrer as $referrer) { ?>
                        <tr>
                            <td><?php echo trim($referrer['referrer']) == '' ? 'N/A' : $referrer['referrer'] ?></td>
                            <td><?php echo $referrer['cnt'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </details>

            <details open>
                <summary>
                    <strong>🌎 Views by Browser (Past 7 Days)</strong>
                </summary>
                <table>
                    <thead>
                        <tr>
                            <td>Browser Agent</td>
                            <td>Views</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($top_browsers as $browser) { ?>
                        <tr>
                            <td><?php echo $browser['browser_agent'] ?></td>
                            <td><?php echo $browser['cnt'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </details>
        </div>
    </main>
</body>

</html>
<?php } ?>