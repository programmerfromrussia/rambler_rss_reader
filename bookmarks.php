<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сохранённое</title>
    <script src="bookmarks.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php';?>
    <?php
    $bookmarkedArticles = isset($_COOKIE['bookmarked_articles']) ? json_decode($_COOKIE['bookmarked_articles']) : [];
    
    // Display the bookmarked articles
    if (!empty($bookmarkedArticles)) {
        echo '<h1>Ссылки на сохранённые статьи:</h1>';
        echo '<ul>';
        foreach ($bookmarkedArticles as $articleLink) {
            echo '<li><a href="' . $articleLink . '" target="_blank">' . $articleLink . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Пока ничего не было сохранено.</p>';
    }
    ?>
    
</body>
</html>