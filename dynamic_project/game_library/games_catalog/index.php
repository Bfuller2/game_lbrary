<?php

require('../model/database.php');
require('../model/library_db.php');
require('../model/systems_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_games';
    }
}
if ($action == 'list_games') {
    $system_id = filter_input(INPUT_GET, 'system_id', FILTER_VALIDATE_INT);
    if ($system_id == NULL || $system_id == FALSE) {
        $system_id = 1;
    }
    $system_name = fuller\systems\get_system_name($system_id);
    $systems = fuller\systems\get_systems();
    $titles = fuller\library\get_games_by_system($system_id);
    include('games_list.php');
} else if ($action == 'login') {
    $system_id = filter_input(INPUT_GET, 'system_id', FILTER_VALIDATE_INT);
    $game_id = filter_input(INPUT_GET, 'game_id', FILTER_VALIDATE_INT);
    if ($system_id == NULL || $system_id == FALSE) {
        $system_id = 1;
    }
    $systems = fuller\systems\get_systems();
    $videogames = fuller\systems\get_games($game_id);
    $titles = fuller\library\get_games_by_system($system_id);
    $system_name = fuller\systems\get_system_name($system_id);
    include('games_list.php');
} else if ($action == 'show_add_form') {
    $systems =  fuller\systems\get_systems();
    include('games_add.php');
}else if ($action == 'add_game') {
    $system_id = filter_input(INPUT_POST, 'system_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    if ($system_id == NULL || $code == NULL || $name == NULL) {
        $error = "Invalid game data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
         fuller\library\add_game($system_id, $code, $name);
         header('Location: .?system_id=$system_id');
    }
} else if ($action == 'list_systems'){
    
        $system_id = filter_input(INPUT_GET, 'system_id', FILTER_VALIDATE_INT);
    $game_id = filter_input(INPUT_GET, 'game_id', FILTER_VALIDATE_INT);
    if ($system_id == NULL || $system_id == FALSE) {
        $system_id = 1;
    }
    $systems =  fuller\systems\get_systems();
    $videogames =  fuller\library\get_games($game_id);
    $titles = fuller\library\get_games_by_system($system_id);
    $system_name = fuller\systems\get_system_name($system_id);
    include('consoles.php');
} else if ($action == 'add_system') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid system name. Check name and try again.";
        include('../errors/error.php');
    } else {
        fuller\systems\add_system($name);
        header('Location: .?action=list_systems');  // display the Category List page
    }
}  else if ($action == 'edit_game_form') {
    $game_id = filter_input(INPUT_POST, 'game_id', FILTER_VALIDATE_INT);
    $system_id = filter_input(INPUT_POST, 'system_id', FILTER_VALIDATE_INT);
    $systems =  fuller\systems\get_systems();
    $game =  fuller\library\get_games($game_id);
    include('games_edit.php');
}else if ($action == 'edit_game') {
    $system_id = filter_input(INPUT_POST, 'system_id', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $game_id = filter_input(INPUT_POST, 'game_id');
    if ($system_id == NULL || $system_id == FALSE|| $code == NULL ||$code == FALSE
            || $name == FALSE || $name == NULL || $game_id == FALSE) {
        $error = "Invalid game data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        fuller\library\edit_game($system_id, $code, $name, $game_id);
        header("Location: .?system_id=$system_id");
    }
} else if ($action == 'delete_system') {
    $system_id = filter_input(INPUT_POST, 'system_id', FILTER_VALIDATE_INT);
    fuller\systems\delete_system($system_id);
    header('Location: .?action=list_systems');      // display the Console List page
} else if ($action == 'delete_game') {
    $game_id = filter_input(INPUT_POST, 'game_id', FILTER_VALIDATE_INT);
    $system_id = filter_input(INPUT_POST, 'system_id', FILTER_VALIDATE_INT);
    if ($game_id == NULL || $game_id == FALSE ||
            $system_id == NULL || $system_id == FALSE) {
        $error = "Missing or incorrect game id or system id.";
        include('../errors/error.php');
    } else {
        fuller\library\delete_game($game_id);
        header("Location: .?system_id=$system_id");
    }
}




