<?php include '../view/header.php'; ?>
<main>

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>      
        <?php foreach ($systems as $system) : ?>
        <tr>
            <td><?php echo $system['systemName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_system" />
                    <input type="hidden" name="system_id" value="<?php echo $system['systemID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add System</h2>
    <form id="add_system_form" action="index.php" method="post">
        <input type="hidden" name="action" value="add_system" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="index.php?action=list_games">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>