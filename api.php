<?php
// Přístupové údaje k databázi jsou v config.php (mimo git) — vzor: config.example.php
$config = require __DIR__ . '/config.php';
$servername = $config['host'];
$username = $config['user'];
$password = $config['password'];
$dbname = $config['database'];

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    http_response_code(500);
    die("Databáze je dočasně nedostupná.");
}

$action = $_GET['action'] ?? '';

if ($action === 'get') {
    $year = intval($_GET['year']);
    $month = intval($_GET['month']) + 1;
    $start = "$year-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-01";
    $end = date("Y-m-t", strtotime($start));

    $sql = "SELECT * FROM udalosti WHERE datum BETWEEN '$start' AND '$end' ORDER BY datum";
    $result = $conn->query($sql);

    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[$row['datum']][] = ['id' => $row['id'], 'text' => $row['text']];
    }
    echo json_encode($events);
}

if ($action === 'save') {
    $datum = $_POST['datum'];
    $text = trim($_POST['text']);
    if ($text !== '') {
        $stmt = $conn->prepare("INSERT INTO udalosti (datum, text) VALUES (?, ?)");
        $stmt->bind_param("ss", $datum, $text);
        $stmt->execute();
    }
    echo json_encode(["success" => true]);
}

if ($action === 'delete') {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM udalosti WHERE id = $id");
    echo json_encode(["deleted" => true]);
}

$conn->close();
?>