<?php
function dnd($data){
    echo '<pre>';
    var_dump($data);
    echo '</prev>';
    die();
}

function sanitize($dirty){
    return htmlentities($dirty,ENT_QUOTES,'UTF-8');
}

function currentUser(){
    return Employee::currentLoggedInEmployee();
}