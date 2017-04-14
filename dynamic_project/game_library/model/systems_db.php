<?php

namespace fuller\systems{
function get_systems() {
    global $db;
    $query = 'SELECT * FROM systems
              ORDER BY systemID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_system_name($system_id) {
    global $db;
    $query = 'SELECT * FROM systems
              WHERE systemID = :system_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':system_id', $system_id);
    $statement->execute();    
    $system = $statement->fetch();
    $statement->closeCursor();    
    $system_name = $system['systemName'];
    return $system_name;
}

function add_system($name) {
    global $db;
    $query = 'INSERT INTO systems (systemName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}


function delete_system($system_id) {
    global $db;
    $query = 'DELETE FROM systems
              WHERE systemID = :system_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':system_id', $system_id);
    $statement->execute();
    $statement->closeCursor();
}
}
