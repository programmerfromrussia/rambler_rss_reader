<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Новости на сегодня</title>
  <script src="bookmarks.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <?php 
  include "header.php";
  include 'feed.php';;
  $selectedCategories = isset($_GET['categories']) ? $_GET['categories'] : array();
  var_dump($selectedCategories);

  ?>
<form method="get">
    <label>Выберите категории:</label><br>
    <?php
    foreach ($categories as $categoryName => $categoryValue) {
        $checked = (is_array($selectedCategories) && in_array($categoryValue, $selectedCategories)) ? 'checked' : '';
        echo "<input type='checkbox' name='categories[]' value='$categoryValue' $checked> $categoryName<br>";
    }
    ?>
    <input type="submit" value="Submit">
</form>

<?php
var_dump($selectedCategories);

  foreach ($feed as $feed_item) {
    var_dump($feed_item);
    if (empty($selectedCategories) || in_array($feed_item['source'], $selectedCategories)) {
        $time = date('d.m.Y G:i:s', $feed_item['date']);
        $title = shorten_text($feed_item['title'], 300);
        $text = shorten_text($feed_item['description'], 300);

        echo <<<END
        <a href="$feed_item[link]" target="_blank"><b>$title</b></a>
        <a href="#" onclick="bookmarkArticle('$feed_item[link]'); return false;"><i class="fas fa-bookmark"></i> Сохранить</a><br />
        <small><b>$feed_item[source]</b> :: $time</small><br />
        $text</a><hr />
        END;
    }
}
?>
</body>

</html>