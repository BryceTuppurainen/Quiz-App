<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if ($_GET) {
        $filename = urldecode($_GET['file']);
        $file = fopen($filename, "r");
        $questions = json_decode(fread($file, filesize($filename)));
        fclose($file);

        $score = 0;
        $total = 0;

        echo "<h1>Results</h1>";

        foreach ($questions as $question => $answer) {
            if ($question != "file") {
                echo "<p>$question</p><ul><li> Answered: " . $_POST["$total"] . "</li><li> Expected: " . $answer . "</li></ul></p>";
                if ($_POST[$total] === $answer) {
                    $score++;
                }
                $total++;
            }
        }

        $percentage_score = $score / $total * 100;

        echo "<p>You got $score out of $total questions correct. $percentage_score%</p>";
        echo "<h3><a href='./index.html'>Create a new Quiz</a></h3>";
        echo "<h3><a href='./quizzes.php'>View all Quizzes</a></h3>";
    } else {
        header("Location: quizzes.php");
    }
    ?>
</body>

</html>