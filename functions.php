<?php
function imgName($file){
    $NameArr = explode('.', $file['name']);
    $extension = '.'.$NameArr[count($NameArr)-1];
    $NewName = $file['name'].time().mt_rand(1,9999);
    $NewName = md5($NewName);
    return $NewName.$extension;
}