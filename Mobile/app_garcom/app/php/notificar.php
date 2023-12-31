<?php
require_once (__DIR__ . '/conn.php');

$sqlQuery = "SELECT mesa, estado FROM mesas WHERE chamando = 'sim'";
$result = $sql->query($sqlQuery);

$mesa = null;

if ($result->num_rows > 0) {
    $mesa = $result->fetch_assoc();
}

if ($mesa) {
    echo "A mesa " . $mesa["mesa"] . " está chamando.";
} else {
    exit;
}
?>