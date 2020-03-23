<?php include '../view/header.php'; ?>
<main>
    <aside>
        <a href="?category_id=false&category_type=false">
        Display All
        </a>
        <!-- display a list of categories -->
        <h2>Classes</h2>
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($classes as $class) : ?>
                <li>
                    <a href="?category_id=<?php echo $class['code']; ?>&category_type=1">
                        <?php echo $class['name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
        </ul>
        </nav>   
        <h2>Types</h2>
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($types as $type) : ?>
                <li>
                    <a href="?category_id=<?php echo $type['code']; ?>&category_type=2">
                        <?php echo $type['name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
        </ul>
        </nav>     
        <h2>Makes</h2>
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($makes as $makelink) : ?>
                <li>
                    <a href="?make=<?php echo $makelink; ?>">
                        <?php echo $makelink; ?>
                    </a>
                </li>
                <?php endforeach; ?>
        </ul>
        </nav>     
    </aside>
    <h1>Product List</h1>
    <section>
        <!-- display a table of products -->
        <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th class="right">Price</th>
            </tr>
            <?php foreach ($products as $product) : 
                if ($make == NULL || $make == $product['make']) { ?>
            <tr>
                <td><?php echo $product['year']; ?></td>
                <td><?php echo $product['make']; ?></td>
                <td><?php echo $product['model']; ?></td>
                <td class="right">$<?php echo $product['price']; ?></td>
            </tr>
            <?php } endforeach; ?>
        </table>      
    </section>
</main>
<?php include '../view/footer.php'; ?>