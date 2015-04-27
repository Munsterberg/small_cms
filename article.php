<?php

include_once('inc/connection.php');
include_once('inc/article.php');

$article = new Article;

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_data($id);

?>

    <html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" href="assets/style.css"/>
    </head>
    <body>

    <div class="container">
        <a href="index.php" id="brand">CMS</a>

        <h3><?php echo $data['article_title']; ?></h3>
        <small><?php echo date('d, M Y', $data['article_timestamp']) ?></small>
        <p><?php echo $data['article_content']; ?></p>
    </div>

    </body>
    </html>

<?php

} else {
    header('Location: index.php');
    exit();
}

?>