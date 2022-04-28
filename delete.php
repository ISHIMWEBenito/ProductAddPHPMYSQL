<?php
require_once "Mainproduct.php";

$record = new productType();

if (isset($_POST['delete'])) {
    $checkbox = $_POST['checkbox'];
    if (!$checkbox) {
        header("Location:index.php");
    } else {
        foreach ($checkbox as $id) {
            $record->set_Id($id);
            $result = $record->delete();
            header("Location:index.php");
        }
    }
}

if (isset($_POST['add'])) {
    header("Location:Form.php");
}
