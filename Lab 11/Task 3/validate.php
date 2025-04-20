<?php
require 'db_connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!preg_match('/^[a-zA-Z0-9\s]+$/', $search)) {
    die("Invalid characters in search.");
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(["%$search%"]);
$results = $stmt->fetchAll();
?>

<form method="get">
    Search Product: <input type="text" name="search">
    <button type="submit">Search</button>
</form>

<?php
foreach ($results as $row) {
    echo "Product: " . htmlspecialchars($row['name']) . "<br>";
}
?>
