<?php
include 'db.php';

if (isset($_POST['id'], $_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query = "UPDATE appointments SET status = '$status' WHERE id = '$id'";
    echo ($conn->query($query)) ? "success" : "error";
}
?>
