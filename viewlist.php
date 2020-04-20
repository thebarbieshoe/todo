<?php
require("base.php");
    ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>To Do List App by Julie</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html"><h1>To Do List App <i>by Julie</i></h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">View List<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="index.html">Add To Do</a>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <?php
    @$fp = fopen("$document_root/list/list.txt", 'rb');
    flock($fp, LOCK_SH); //lock file for reading

    if (!$fp) {
        echo "<p><strong>Something went wrong. Please check back later.<br /></strong></p>";
        exit;
    }
    echo "<ul>";

    //feof tests for end of file, while NOT end of file
    while (!feof($fp)) {
        $list = fgets($fp);
        if ($list==''){
            echo "</ul>";
            echo "end of list";
        } else {
            echo "<li>" . htmlspecialchars($list) . "<button type=\"edit\" class=\"btn btn-primary btn-sm\">Edit</button></li>";
        }
    }

    flock($fp, LOCK_UN);
    fclose($fp);
?>

