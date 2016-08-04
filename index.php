<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

include_once 'config/db.php';
if(!empty($_POST['remove'])){
    $link->query("DELETE FROM products WHERE id={$_POST['remove']}");
}
$query = $link->query("SELECT p.id, product, description, content, price, preview, `count`, category FROM products p JOIN categories c ON p.category_id=c.id");
if ($link->error) {
    echo 'Mysql error: ' . $link->error;
    exit();
} ?>
<div id="debug"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 transition">
            <span class="glyphicon glyphicon-arrow-left pull-right" id="menu"></span>

            <div class="container-fluid pull-left">
                <div><a href="newproduct.php">Добавить товар</a></div>
                <div></div>
            </div>
        </div>
        <div class="col-md-10 transition">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>content</th>
                    <th>price</th>
                    <th>image</th>
                    <th>count</th>
                    <th>category</th>
                    <th>delete</th>
                </tr>
                <?php
                while ($row = $query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><span class="id_product"></span><?php echo $row['id'] ?></td>
                        <td><span class="product_product" data-id="<?php echo $row['id'] ?>"><?php echo $row['product'] ?></span></td>
                        <td><span class="product_description" data-id="<?php echo $row['id'] ?>"><?php echo $row['description'] ?></span></td>
                        <td><span class="product_content" data-id="<?php echo $row['id'] ?>"><?php echo $row['content'] ?></span></td>
                        <td><span class="product_price" data-id="<?php echo $row['id'] ?>"><?php echo $row['price'] ?></span></td>
                        <td><img class="preview" src="<?php echo $row['preview'] ?>" alt=""></td>
                        <td><span class="product_count" data-id="<?php echo $row['id'] ?>"><?php echo $row['count'] ?></span></td>
                        <td><span class="product_category" data-id="<?php echo $row['id'] ?>"><?php echo $row['category'] ?></span></td>
                        <td>
                            <form action="?" method="post">
                                <button name="remove" value="<?php echo $row['id']?>" class="btn btn-danger btn-sm glyphicon glyphicon-remove"></button>
                            </form></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<script src="js/jquery2.2.4.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
</body>
</html>
