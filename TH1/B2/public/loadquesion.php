<?php
$conn = new mysqli("localhost", "root", "", "Quiz");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, question_text, option_a, option_b, option_c, option_d, correct_answers FROM Questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $correctAnswers = explode(',', $row["correct_answers"]);
        $inputType = count($correctAnswers) > 1 ? 'checkbox' : 'radio';

        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<p class='fw-bold'>Câu " . $row["id"] . ": " . htmlspecialchars($row["question_text"]) . "</p>";
        echo "<div class='options'>";
        foreach (['a', 'b', 'c', 'd'] as $option) {
            $optionText = htmlspecialchars($row["option_$option"]);
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='$inputType' name='question_{$row["id"]}[]' id='question_{$row["id"]}_$option' value='$option'>";
            echo "<label class='form-check-label' for='question_{$row["id"]}_$option'>$optionText</label>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p class='text-danger'>Chưa có câu hỏi</p>";
}

$conn->close();