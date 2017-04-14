<?php
//Get the user from the database for the login screen

function get_email($email) {
    global $db;
    $query = 'SELECT * FROM users WHERE email = :email';    
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute(); 
    $status = false;
    if($statement->rowCount()){
        $status = true;
    }    
    return $status;
}
