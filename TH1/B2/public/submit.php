<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điểm bài thi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Connect to database
        $conn = new mysqli("localhost", "root", "", "Quiz");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get all questions
        $result = $conn->query("SELECT id, correct_answers FROM Questions");
        $score = 0;
        $total = $result->num_rows;


        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];

            $studentAnswer = [];
            if (isset($_POST["question_$id"])) {
                $studentAnswer = $_POST["question_$id"];
                if (!is_array($studentAnswer)) {
                    $studentAnswer = array($studentAnswer);
                }
            }

            $correct = explode(',', $row["correct_answers"]);
            for ($i = 0; $i < count($correct); $i++) {
                $correct[$i] = trim(strtolower($correct[$i]));
            }

            for ($i = 0; $i < count($studentAnswer); $i++) {
                $studentAnswer[$i] = trim(strtolower($studentAnswer[$i]));
            }

            sort($correct);
            sort($studentAnswer);

            if ($correct == $studentAnswer) {
                $score++;
            }
        }
        echo "<div class='alert alert-success text-center'>";
        echo "<h1>Điểm bài thi</h1>";
        echo "Bạn trả lời đúng <strong>$score</strong>/$total câu.";
        echo "</div>";

        echo "<div class='text-center mt-3'>";
        echo "<a href='index.php' class='btn btn-primary'>Làm lại</a>";
        echo "</div>";


        $conn->close();
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>