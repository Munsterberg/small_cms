<?php

session_start();

include_once('../inc/connection.php');

if(isset($_SESSION['logged_in'])) {
    if(isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);

        if(empty($title) or empty($content)) {
            $error = 'All fields required';
        } else {
            $query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES (?, ?, ?)');

            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());
            $query->execute();
            header('Location: index.php');
        }
    }

?>

    <html>
    <head>
        <title>CMS</title>
        <link rel="stylesheet" href="../assets/style.css"/>
    </head>
    <body>

    <div class="container">
        <a href="../index.php" id="brand">CMS</a>

        <br/>

        <h4>Create Article</h4>

        <?php if(isset($error)) { ?>
            <small style="color: #aa0000;"><?php echo $error; ?></small>
            <br/>
        <?php } ?>

        <form action="add.php" method="post" autocomplete="off">
            <input type="text" name="title" placeholder="Title"/>
            <br/>
            <br/>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="Content"></textarea>
            <input type="submit" value="Create"/>
        </form>
    </div>

    </body>
    </html>

<?php

} else {
    header('Location: index.php');
}

?>