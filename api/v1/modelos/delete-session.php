<?php

if(!isset($conn)) die();

session_start();
if(isset($_SESSION)){
    unset($_SESSION);
    session_destroy();
}