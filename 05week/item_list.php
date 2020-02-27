<?php include 'view/header.php'; ?>
<link rel="stylesheet" type="text/css"
          href="view/css/main.css">
<main>
    <aside>
        <h2>Categories</h2>
        <nav>
            <form action="." method="get">
                <select name="category_id">
                    <option value="NULL">All</option>
                    <?php
                        foreach($categories as $category):
                    ?> 
                    <option value="<?php echo $category['categoryID']?>"><?php echo $category['categoryName']?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="submit" value="Submit">
            </form>
        </nav>
    </aside>
    <section>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th colspan="2">Category</th>
            </tr>
            <?php  if ($items == null) {echo "No to-do list items exist yet.";} else {
                 foreach ($items as $ListItem) : ?>
            <tr>
                <td class="title"> <?php echo $ListItem['Title']; ?></td>
                <td class="desc"><?php echo $ListItem['Description']; ?></td>
                <td class= "cat"><?php echo get_category_name($ListItem['categoryID']); ?></td>
                 <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                           value="delete_item">
                        <input type="hidden" name="item_id"
                            value="<?php echo $ListItem['ItemNum']; ?>">
                        <input type="hidden" name="category_id"
                            value="<?php echo $ListItem['categoryID']; ?>">
                        <input type="submit" value="Delete">
                </td>
            </tr>
            <?php endforeach;}?>
        </table>
        <a href="?action=show_add_form">Add Item</a><br>
        <a href="?action=list_categories">View/Edit Categories</a>
    </section>
</main>
<?php include 'view/footer.php'; ?>