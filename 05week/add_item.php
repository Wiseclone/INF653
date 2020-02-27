<header><h2>Add Item</h2></header>
<main>
    <section>
        <form action="." method="post">
        <input type="hidden" name="action"
                           value="add_item">
        Title: <input type="text" name="title"><br>
        Category: <select name="category_id">
        <?php
            foreach($categories as $category):
        ?> 
        <option value="<?php echo $category['categoryID']?>"><?php echo $category['categoryName']?></option>
        <?php
            endforeach;
        ?>
        </select><br>
        Description: <input type="textArea" name="description"><br>
        <input type="submit" value="Submit">
        </form>
        <a href="?action=list_items">View To-Do List</a>
    </section>
</main>
