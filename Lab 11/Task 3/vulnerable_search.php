<?php
$conn = new mysqli('localhost', 'root', '', 'web');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_GET['search'];
$query = "SELECT * FROM products WHERE name LIKE '%$search%'";
$result = $conn->query($query);
?>

<form method="get">
    Search Product: <input type="text" name="search">
    <button type="submit">Search</button>
</form>

<?php
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "Product: " . htmlspecialchars($row['name']) . "<br>";
    }
}
?>
