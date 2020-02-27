<?php include 'view/header.php'; ?>
<link rel="stylesheet" type="text/css"
          href="view/css/main.css">
<main>
    <section>
        <table>
            <tr>
                <th colspan="2">Name</th>
            </tr>
            <?php  if ($categories == null) {echo "No categories exist yet.";} else {
                 foreach ($categories as $ListItem) : ?>
            <tr>
                <td class="title"> <?php echo $ListItem['categoryName']; ?></td>
                 <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                           value="delete_category">
                        <input type="hidden" name="category_id"
                            value="<?php echo $ListItem['categoryID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach;}?>
        </table>
        <form action="." method="post">
            <input type="hidden" name="action"
                           value="add_category">
            Name: <input type="text" name="category_name"><br>
            <input type="submit" value="Submit">
        </form>
        <a href="?action=list_items">View To-Do List</a>
    </section>
</main>
<?php include 'view/footer.php'; ?>