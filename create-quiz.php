<?php

if ($_POST) {

    $questions = json_decode($_POST['questions']);
    $file = fopen($questions->{"file"} . ".quiz", "w");

    fwrite($file, $_POST['questions']);
    fclose($file);
}

header("Location: quizzes.php");
