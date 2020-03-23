<?php include '../view/header.php'; ?>
<main>

    <h1>Class List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($classes as $class) : ?>
        <tr>
            <td><?php echo $class['name']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="hidden" name="category_type" value="classes" />
                    <input type="hidden" name="category_id"
                           value="<?php echo $class['code']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Class</h2>
    <form id="add_category_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_category" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="hidden" name="category_type" value="classes" />
        <input type="submit" value="Add"/>
    </form>

    <h1>Type List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($types as $type) : ?>
        <tr>
            <td><?php echo $type['name']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="hidden" name="category_type" value="types" />
                    <input type="hidden" name="category_id"
                           value="<?php echo $type['code']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Type</h2>
    <form id="add_category_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_category" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="hidden" name="category_type" value="types" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="index.php?action=list_products">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>