<?php
namespace fuller\library{
function get_games($game_id) {
    global $db;
    $query = 'SELECT * FROM games
              WHERE gameID = :game_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":game_id", $game_id);
    $statement->execute();
    $videogame = $statement->fetch();
    $statement->closeCursor();
    return $videogame;
}

function get_game_title($gameCode) {
    global $db;
    $query = 'SELECT * FROM games
              WHERE gameCode = :game_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':game_code', $gameCode);
    $statement->execute();
    $game = $statement->fetch();
    $statement->closeCursor();
    $game_name = $game['gameName'];
    return $game_name;
}

function get_games_by_system($system_id) {
    global $db;
    $query = 'SELECT * FROM games
              WHERE games.systemID = :system_id
              ORDER BY gameID';
    $statement = $db->prepare($query);
    $statement->bindValue(":system_id", $system_id);
    $statement->execute();
    $games = $statement->fetchAll();
    $statement->closeCursor();
    return $games;
}

function add_game($system_id, $code, $name) {
    global $db;
    $query = 'INSERT INTO games
                 (systemID, gameCode, gameName)
              VALUES
                 (:system_id, :code, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':system_id', $system_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function edit_game($system_id, $code, $name, $game_id) {
    global $db;
    $query = 'UPDATE games
                SET systemID=:system_id, gameCode=:game_code, 
                gameName=:game_name
                WHERE gameID = :game_id';
              
    $statement = $db->prepare($query);
    $statement->bindValue(':system_id', $system_id);
    $statement->bindValue(':game_code', $code);
    $statement->bindValue(':game_name', $name);
    $statement->bindValue(':game_id', $game_id);
    $statement->execute();
    $statement->closeCursor();
}


function delete_game($game_id) {
    global $db;
    $query = 'DELETE FROM games
              WHERE gameID = :game_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':game_id', $game_id);
    $statement->execute();
    $statement->closeCursor();
}
}