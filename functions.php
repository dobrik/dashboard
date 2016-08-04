<?php
function imgName($file)
{
    $NameArr = explode('.', $file['name']);
    $extension = '.' . $NameArr[count($NameArr) - 1];
    $NewName = $file['name'] . time() . mt_rand(1, 9999);
    $NewName = md5($NewName);
    return $NewName . $extension;
}

function numericField($field, $value)
{
    $notNumeric = ['product_content', 'product_description', 'product_product', 'product_category'];
    if (!in_array($field, $notNumeric) && is_numeric($value)) {
        return true;
    }
    return false;
}

function textField($field)
{
    $textFields = ['product_content', 'product_description', 'product_product'];
    if (in_array($field, $textFields)) {
        return true;
    }
    return false;
}
function insertValues($post,$link){
    $fieldName = str_replace('product_','',$post['field']);
    $value = $post['value'];
    $id = $post['id'];
    $link->query("UPDATE products SET {$fieldName}='".$value."' WHERE id={$id}");
    if($link->error){
        echo 'Mysql error: '.$link->error;
        exit();
    }
}

function selectField()
{

}