<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <label>Class:</label>
        <select name="class_code">
        <?php foreach ( $classes as $class ) : ?>
            <option value="<?php echo $class['code']; ?>">
                <?php echo $class['name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Type:</label>
        <select name="type_code">
        <?php foreach ( $types as $type ) : ?>
            <option value="<?php echo $type['code']; ?>">
                <?php echo $type['name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Year:</label>
        <input type="text" name="year" />
        <br>

        <label>Make:</label>
        <input type="text" name="makename" />
        <br>

        <label>Model:</label>
        <input type="text" name="model" />
        <br>

        <label>Price:</label>
        <input type="text" name="price" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Product List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>