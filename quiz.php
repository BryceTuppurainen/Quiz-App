<?php

if (!$_GET) {
    header("Location: quizzes.php");
}

$filename = urldecode($_GET['file']);

$file = fopen($filename, "r");
$questions = json_decode(fread($file, filesize($filename)));
fclose($file);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $questions->{'file'} ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php

    echo "<h1>" . $questions->{'file'} . "</h1>";

    $url = "results.php?file=" . urlencode($filename);

    ?>

    <form action="<?php echo $url ?>" method="POST">
        <ul>
            <?php

            $index = 0;
            foreach ($questions as $question => $answer) {
                if ($question != "file") {
                    echo "<li>$question <input type='text' name='$index' required></input></li>";
                    $index++;
                }
            }

            ?>
        </ul>
        <input type="submit" value="Finish Quiz">
    </form>

    <h3><a href="./index.html">Create a new Quiz</a></h3>
    <h3><a href="./quizzes.php">View all Quizzes</a></h3>

    <?php
    echo "<p>Quiz saved in <a href='./$filename' target='_blank'>$filename</a></p>";
    ?>
</body>

</html>