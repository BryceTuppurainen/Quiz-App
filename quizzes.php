<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Created Quizzes</h1>

    <?php

    $files = scandir(".");
    foreach ($files as $file) {

        if ($file != "." && $file != ".." && substr($file, -5) === ".quiz") {
            $url = 'quiz.php?file=' . urlencode($file);
            echo "<a href=$url>$file</a><br>";
        }
    }

    if ($_GET) {
        if ($_GET['delete'] === "true") {
            foreach ($files as $file) {
                if ($file != "." && $file != ".." && substr($file, -5) === ".quiz") {
                    unlink($file);
                }
            }
        }
        header("Location: index.html");
    }

    ?>

    <h3><a href="./index.html">Create a Quiz</a></h3>

    <form action="./quizzes.php" method="GET">
        <input type="hidden" name="delete" value="true">
        <input type="submit" value="Delete All Quizzes">
    </form>
</body>

</html>