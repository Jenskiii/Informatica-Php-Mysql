<?php 

function is_input_empty($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function is_username_invalid($result){
    if(!$result){
        return true;
    }else{
        return false;
    }
}

function is_pwd_invalid($pwd,$hashedPwd){
    if(!password_verify($pwd,$hashedPwd)){
        return true;
    }else{
        return false;
    }
}
