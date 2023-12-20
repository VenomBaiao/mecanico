<?php
$mysqli = mysqli_connect('127.0.0.1', 'root', 'root', 'compsys_db');

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
