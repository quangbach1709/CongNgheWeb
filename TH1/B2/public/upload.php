<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_FILES["file"])) {
        echo "<div class='alert alert-danger mt-3'>Chưa chọn file</div>";
        exit();
    }

    $fileHandle = fopen($_FILES["file"]["tmp_name"], "r");
    if (!$fileHandle) {
        echo "<div class='alert alert-danger mt-3'>Lỗi đọc file</div>";
        exit();
    }

    $dbConn = new mysqli("localhost", "root", "", "Quiz");
    if ($dbConn->connect_error) {
        fclose($fileHandle);
        die("Connection error: " . $dbConn->connect_error);
    }

    $dbConn->query("TRUNCATE TABLE Questions");

    $content = fread($fileHandle, filesize($_FILES["file"]["tmp_name"]));
    fclose($fileHandle);

    $questionList = preg_split('/\r?\n\r?\n/', $content);

    foreach ($questionList as $question) {
        if (preg_match('/ANSWER: ([A-D, ]+)/', $question, $matches)) {
            $answer = $matches[1];
        } else {
            $answer = '';
        }

        $questionText = preg_replace('/ANSWER: [A-D, ]+/', '', $question);
        $lines = array_values(array_filter(explode("\n", $questionText), 'trim'));

        $mainQuestion = trim($lines[0]);
        $options = [];
        for ($i = 1; $i <= 4; $i++) {
            $options[] = trim(substr($lines[$i], 3));
        }

        $stmt = $dbConn->prepare("INSERT INTO Questions (question_text, option_a, option_b, option_c, option_d, correct_answers) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $mainQuestion, $options[0], $options[1], $options[2], $options[3], $answer);
        $stmt->execute();
    }

    $dbConn->close();

    header("Location: index.php");
    exit();
}
