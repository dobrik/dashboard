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
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['product'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['content'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><img class="preview" src="<?php echo $row['preview'] ?>" alt=""></td>
                        <td><?php echo $row['count'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td>
                            <form action="?" method="post">
                                <button name="remove" value="<?php echo $row['id']?>" class="glyphicon glyphicon-remove"></button>
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
</body>
</html>
