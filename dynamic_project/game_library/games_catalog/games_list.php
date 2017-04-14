<?php include('../view/header.php'); ?>
<main>
    <h1 class="glTitle">Game Manager</h1>
    <aside>
        <h3>Systems</h3>

        <!-- display a list of systems -->
        <nav>
            <ul>
                <?php foreach ($systems as $system) : ?>
                    <li>
                        <a href="?system_id=<?php echo $system['systemID']; ?>">
                            <?php echo $system['systemName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>                    
            </ul>
        </nav>
    </aside>
    <!-- display a list all the games -->
    <section>
        <table>
            <tr>
                <th>Game Code</th>
                <th>Game Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>            
            <?php foreach ($titles as $title) : ?>
                <tr>
                    <td><?php echo $title['gameCode']; ?></td>
                    <td><?php echo $title['gameName']; ?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action" value="delete_game">
                            <input type="hidden" name="game_id" value="<?php echo $title['gameID'] ?>">
                            <input type="hidden" name="system_id" value="<?php echo $title['systemID'] ?>">
                            <input type="submit" value="Delete">
                        </form></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action" value="edit_game_form">
                            <input type="hidden" name="game_id" value="<?php echo $title['gameID']; ?>">
                            <input type="hidden" name="system_id" value="<?php echo $title['systemID']; ?>">
                            <input type="submit" value="Edit">
                        </form></td>    

                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <section class="links">
        <p><a href="?action=show_add_form">Add Game</a></p>
        <p><a href="?action=list_systems">List Systems</a></p> 
    </section>    

</main>
<?php include('../view/footer.php') ?>

