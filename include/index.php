<?php
require_once 'Database.php';

$database = new Database();
$db = $database->getConnection();

$sql = "SELECT * FROM customers";
$stmt = $db->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
var_export($result);
echo '</pre>';

?>
