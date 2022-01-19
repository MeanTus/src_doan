<?php
function checkEmail($email) {
    $regex = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
    return preg_match($regex, $email) ? TRUE : FALSE;
}

function checkLengthPw($password){
    return strlen($password) > 7 ? TRUE : FALSE;
}

function checkProduct($product_img, $product_name, $product_desc, $product_amount, $product_price_cur, $product_price_sale){
    $error = "";
    $imageType=array("image/png", "image/jpeg", "image/bmp");

    if(empty($product_img['name'])){
        $error.="Chưa thêm hình!";
    }
    else if($product_img["error"]!=0){
        $error.="Lỗi file hình!";
    }
    else if(!in_array($product_img["type"],$imageType)){
        $error.="Không phải file hình!";
    }
    if(empty($product_name)){
        $error .= "Chưa nhập tên sản phẩm kìa";
    }
    if(empty($product_desc)){
        $error .= "Chưa nhập mô tả cho sản phẩm";
    }
    if(empty($product_amount)){
        $error .= "Chưa nhập số lượng sản phẩm";
    }
    if($product_amount < 0){
        $error .= "Số lượng sản phẩm âm";
    }
    if(empty($product_price_cur)){
        $error .= "Chưa nhập giá sản phẩm";
    }
    if($product_price_cur < 0){
        $error .= "Giá sản phẩm âm";
    }
    if($product_price_sale < 0){
        $error .= "Giá sale sản phẩm âm";
    }

    return $error;
}
function checkProductUpdate($product_name, $product_desc, $product_amount, $product_price_cur, $product_price_sale){
    $error = "";

    if(empty($product_name)){
        $error .= "Chưa nhập tên sản phẩm kìa";
    }
    if(empty($product_desc)){
        $error .= "Chưa nhập mô tả cho sản phẩm";
    }
    if(empty($product_amount)){
        $error .= "Chưa nhập số lượng sản phẩm";
    }
    if($product_amount < 0){
        $error .= "Số lượng sản phẩm âm";
    }
    if(empty($product_price_cur)){
        $error .= "Chưa nhập giá sản phẩm";
    }
    if($product_price_cur < 0){
        $error .= "Giá sản phẩm âm";
    }
    if($product_price_sale < 0){
        $error .= "Giá sale sản phẩm âm";
    }

    return $error;
}