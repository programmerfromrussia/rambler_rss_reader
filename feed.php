<?php
function shorten_text($text, $limit) {
  if (($text = str_replace('&nbsp;', ' ', $text)) &&
      (strlen($text) > $limit)) {

    $text = substr($text, 0, $limit);

    if ($i = strrpos($text, ' '))
      $text = substr($text, 0, $i);

    $text.= substr($text, -1) == '.' ? '..' : '&hellip;';
  }

  return $text;
}

function fetch_rss(&$feed, $url, $source_name) {
  if (!$xml = @simplexml_load_file($url)) return false;

  foreach($xml->channel->xpath('//item') as $xml_item){
    $feed_item = false;
    $feed_item['title']		= strip_tags(trim($xml_item->title));
    $feed_item['description']	= strip_tags(trim($xml_item->description));
    $feed_item['link']		= strip_tags(trim($xml_item->link));
    $feed_item['date']		= strtotime($xml_item->pubDate);
    $feed_item['source']	= $source_name;
    $feed[] = $feed_item;
  }
  return $feed;
}


$categories = array(
    "В мире" => 'https://news.rambler.ru/rss/world/',
    'Наука и техника' => 'https://news.rambler.ru/rss/tech/',
    'Аналитика' => 'https://news.rambler.ru/rss/articles/',
    'Игры' => 'https://news.rambler.ru/rss/games/',
    'Общество' => 'https://news.rambler.ru/rss/community/',
    'Происшествия' => 'https://news.rambler.ru/rss/incidents/',
);


if (!is_array($categories)) die('URL к ссылкам для RSS отсутствует');
$feed = false; 
foreach ($categories as $name => $url)
  fetch_rss($feed, $url, $name);
if (!$feed) die('Нет данных для отображения. (Невозможно получить XML-данные из предоставленных URL-адресов.)');

usort($feed, function($a, $b) { 
  return $b['date'] - $a['date']; 
});

function bookmark_article($link) {
    $bookmarkedArticles = isset($_COOKIE['bookmarked_articles']) ? json_decode($_COOKIE['bookmarked_articles']) : [];

    if (!in_array($link, $bookmarkedArticles)) {
        $bookmarkedArticles[] = $link;
    }

    setcookie('bookmarked_articles', json_encode($bookmarkedArticles), time() + 3600 * 24 * 30, '/'); 
}
?> 
