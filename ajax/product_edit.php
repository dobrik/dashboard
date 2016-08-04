<?php
include_once '../config/db.php';
include_once '../functions.php';

if (!empty($_POST['edit'])) { // edit = true, id = **, field = product_*** , value = ***
    if (numericField($_POST['field'], $_POST['value'])) {
        insertValues($_POST,$link);
        $response = ['result' => true, 'value' => $_POST['value']];
    }else if (textField($_POST['field'])) {
        insertValues($_POST,$link);
        $response = ['result' => true, 'value' => $_POST['value']];
    } else {
        $response = ['result' => false, 'value' => 'error'];
    }
} else {
    $response = ['result' => false, 'value' => 'error'];
}
echo json_encode($response);