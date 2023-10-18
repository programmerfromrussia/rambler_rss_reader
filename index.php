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
  include 'input.php';
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
  include 'feed.php';
  ?>
</body>

</html>