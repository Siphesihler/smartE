<?php

declare(strict_types=1);

function check_signup_errors(){
    if(isset($_SESSION['errors_signup'])){
        $errors = $_SESSION['errors_signup'];

        echo'<br>';

        foreach($errors as $error){
            echo '<span class="failure">'.$error.'<br> </span>';
        }
        unset($_SESSION['error_signup']);
    }else if (isset($_GET["signup"]) && $_GET["signup"]==="success"){
        echo '<br>';
        echo'<span class="success">Signup success!</span>';
    }
}