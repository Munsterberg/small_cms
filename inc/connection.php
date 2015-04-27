<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=smallcms', 'root', 'root');
} catch(PDOException $e) {
    exit('Database error.');
}

?>