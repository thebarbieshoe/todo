<?php
require("base.php");

/**
 * CREATE FUNCTION
 */
// create variable for to do list item
$todo = $_POST['todo'];

if ($todo == null)
{
    echo 'Please enter a to do.<br />';
}
else {
    //create to do list variable
    $todo = htmlspecialchars($todo);
    //OPEN FILE, mode append/binary, if not created, create it
    $fp = @fopen("$document_root/list/list.txt", 'ab');

    //if $fp fails..
    if (!$fp) {
        echo "<p><strong>Your to do list could not be processed at this time. Please try again later.</strong></p></body></html>";
        exit;
    }

    else {
        // add a new line character.
        $todoString = $todo . "\n";
        //write to file
        fwrite($fp, $todoString);
        //close the file
        fclose($fp);
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>To Do List App by Julie</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html"><h1>To Do List App <i>by Julie</i></h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="viewlist.php">View List<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="index.html">Add To Do</a>
            </div>
        </div>
    </nav>
    <?php echo "You added: " . $todo . "<br />"; ?>

    <!--  append to do to list.txt -->
</div>
</body>
</html>
