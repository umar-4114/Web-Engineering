<?php
$host = 'localhost';
$dbname = 'feedback_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("INSERT INTO faculty_feedback (
        student_name, faculty_name, subject_name, topics_covered, delivery_method,
        punctuality, preparation, english_communication, clarity,
        real_world_applications, classroom_environment, student_interaction,
        delivery_method_rating
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )");
    
    $stmt->execute([
        $_POST['student_name'] ?? null,
        $_POST['faculty_name'] ?? null,
        $_POST['subject_name'] ?? null, 
        $_POST['topics_covered'] ?? null,
        $_POST['delivery_method'] ?? null,
        $_POST['punctuality'] ?? null,
        $_POST['preparation'] ?? null,
        $_POST['english_communication'] ?? null,
        $_POST['clarity'] ?? null,
        $_POST['real_world_applications'] ?? null,
        $_POST['classroom_environment'] ?? null,
        $_POST['student_interaction'] ?? null,
        $_POST['delivery_method_rating'] ?? null
    ]);
    
    echo "<h1>Thank you for your feedback!</h1>";
    echo "<p><a href='view.php'>View all feedback</a> | <a href='index.html'>Submit another</a></p>";
} catch (PDOException $e) {
    die("<p style='color: red'>Database error: " . $e->getMessage() . "</p>");
}
?>