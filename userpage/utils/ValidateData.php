<?php
function checkEmail($email) {
    $regex = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
    return preg_match($regex, $email) ? TRUE : FALSE;
}

function checkLengthPw($password){
    return strlen($password) > 7 ? TRUE : FALSE;
}

function checkOrder($receiver, $address, $phoneNumber){
    $err = "";
    if(empty($receiver)) $err .= "Bạn chưa nhập tên người nhận";
    if(empty($address)) $err .= "Bạn chưa nhập địa chỉ";
    if(empty($phoneNumber)) $err .= "Bạn chưa nhập số điện thoại";
    return $err;
}