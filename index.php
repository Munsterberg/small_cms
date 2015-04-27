<?php

include_once('inc/connection.php');
include_once('inc/article.php');

$article = new Article;
$articles = $article->fetch_all();

?>

<html>
<head>
    <title>CMS</title>
    <link rel="stylesheet" href="assets/style.css"/>
</head>
<body>

<div class="container">
    <a href="index.php" id="brand">CMS</a>

    <?php foreach($articles as $article) { ?>
    <ol>
        <li><a href="article.php?id=<?php echo $article['article_id']; ?>">
                <?php echo $article['article_title']; ?>
            </a>
            <small><?php echo date('l jS', $article['article_timestamp']) ?></small></li>
    </ol>
    <?php } ?>
</div>

</body>
</html>