<?php include '../view/header.php'; ?>
<main>
    <h1>Add Game</h1>
    <form action="index.php" method="post" class="add_game_form">
        <input type="hidden" name="action" value="add_game">

        <label>System:</label>
        <select name="system_id">
        <?php foreach ( $systems as $system ) : ?>
            <option value="<?php echo $system['systemID']; ?>">
                <?php echo $system['systemName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Game Code:</label>
        <input type="text" name="code" />
        <br>

        <label>Game Name:</label>
        <input type="text" name="name" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Game" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_games">View Game List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>