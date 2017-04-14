<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="edit_game_form">
        <input type="hidden" name="action" value="edit_game">
        <label>System ID:</label>
        <select name="system_id">
            <?php foreach ($systems as $system): ?>
                <option value="<?php echo $system['systemID']; ?>"
                <?php if ($system['systemID'] == $system_id) : ?>
                            selected="selected"
                        <?php endif; ?>
                        >
                            <?php echo $system['systemName']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Game Code:</label>
        <input type="text" name="code" value="<?php echo $game['gameCode']; ?>"/><br>
        <label>Game Name:</label>
        <input type="text" name="name" value="<?php echo $game['gameName']; ?>"/><br>     

        <label>&nbsp;</label>
        <input type="hidden" name="game_id"  value="<?php echo $game['gameID']; ?>"/><br>
        <input type="submit" value="Save Changes"><br>
    </form>
    <p><a href="index.php">View Product List</a></p>
</main>

<?php include '../view/footer.php'; ?>