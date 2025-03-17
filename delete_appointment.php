<?php
include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM appointments WHERE id = '$id'";
    echo ($conn->query($query)) ? "success" : "error";
}
?>
