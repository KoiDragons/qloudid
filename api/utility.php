<?php
function cleanMe($input, $removeHTML = 1)
{
    $input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
    if ($removeHTML == 1) {
        $input = strip_tags($input);
    }
    
    $input = stripslashes($input);
    return $input;
}

function start_session($id)
{
    session_start();
    $_SESSION['user_id'] = $id;
    
}


function checkLogin()
{
   
    if (session_id() == '') {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            return 0;
        } else {
            return 1;
        }
       
    } else {
        if (!isset($_SESSION['user_id'])) {
            return 0;
        } else {
            return 1;
        }
    }
}

function warning($due)
{
    if ($due == 0) {
        $warning = "you are not register with us";
        return $warning;
    } else if ($due == 1) {
        $warning = "Please check you Email";
        return $warning;
    }
    
    else if ($due == 2) {
        $warning = "Please verify your email address.";
        return $warning;
    } else if ($due == 3) {
        $warning = "Given Password is wrong.";
        return $warning;
    } else if ($due == 4) {
        $warning = "You are allready registered please login here.";
        return $warning;
    }
}

$viewData = array();

?>