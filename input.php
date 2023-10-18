<?php
$categories = array(
    "В мире" => 'https://news.rambler.ru/rss/world/',
    'Наука и техника' => 'https://news.rambler.ru/rss/tech/',
    'Аналитика' => 'https://news.rambler.ru/rss/articles/',
    'Игры' => 'https://news.rambler.ru/rss/games/',
    'Общество' => 'https://news.rambler.ru/rss/community/',
    'Происшествия' => 'https://news.rambler.ru/rss/incidents/',
);

$selectedCategories = isset($_GET['categories']) ? $_GET['categories'] : array();
?>