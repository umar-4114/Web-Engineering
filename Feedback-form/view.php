<?php
$host = 'localhost';
$dbname = 'feedback_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM faculty_feedback ORDER BY created_at DESC");
    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Feedback</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Feedback Records</h1>
    
    <?php if (empty($feedbacks)): ?>
        <p>No feedback records found.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Student</th>
                <th>Faculty</th>
                <th>Subject</th>
                <th>Delivery Method</th>
                <th>Ratings</th>
                <th>Date</th>
            </tr>
            <?php foreach ($feedbacks as $feedback): ?>
            <tr>
                <td><?= htmlspecialchars($feedback['student_name']) ?></td>
                <td><?= htmlspecialchars($feedback['faculty_name']) ?></td>
                <td><?= htmlspecialchars($feedback['subject_name']) ?></td>
                <td><?= htmlspecialchars($feedback['delivery_method']) ?></td>
                <td>
                    Punctuality: <?= $feedback['punctuality'] ?><br>
                    Preparation: <?= $feedback['preparation'] ?><br>
                    English: <?= $feedback['english_communication'] ?><br>
                    Clarity: <?= $feedback['clarity'] ?><br>
                    Real-world: <?= $feedback['real_world_applications'] ?><br>
                    Environment: <?= $feedback['classroom_environment'] ?><br>
                    Interaction: <?= $feedback['student_interaction'] ?><br>
                    Delivery: <?= $feedback['delivery_method_rating'] ?>
                </td>
                <td><?= date('d/m/Y H:i', strtotime($feedback['created_at'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    
    <p><a href="index.html">Submit another feedback</a></p>
</body>
</html>
