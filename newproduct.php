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
include_once 'functions.php';

if (!empty($_POST['submit'])) {
    $dist = 'images/' . imgName($_FILES['img']);
    move_uploaded_file($_FILES['img']['tmp_name'], $dist);
    $link->query("INSERT INTO `products` (product, description, content, price, preview, `count`, category_id)
VALUES ('{$_POST['name']}', '{$_POST['description']}', '{$_POST['content']}', '{$_POST['price']}', '{$dist}', '{$_POST['count']}', '{$_POST['category']}')");
    if ($link->error) {
        echo 'Mysql error: ' . $link->error;
        exit();
    }
}

?>
<div class="row">
    <div class="col-md-offset-4 col-md-4 text-center">
        <h2 class="text-center">Add product</h2>

        <form action="?" method="post" enctype="multipart/form-data">
            <input type="text" name="name" class="form-control" placeholder="Name">
            <input type="text" name="description" class="form-control" placeholder="Description">
            <input type="text" name="content" class="form-control" placeholder="Content">
            <input type="text" name="price" class="form-control" placeholder="Price">
            <input type="number" min="0" max="999" name="count" class="form-control" placeholder="Count">
            <select name="category" class="form-control">
                <option value="0">Set category</option>
                <?php
                $categories = $link->query("SELECT id, category FROM categories");
                while ($row = $categories->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['category'] ?></option>
                    <?php
                }
                ?>
            </select>
            <input type="file" name="img">
            <input type="submit" name="submit">
            <!--            <button class="btn btn-success form-control" value="send" name="submit"><span class="glyphicon glyphicon-plus-sign"></span>Добавить-->
            <!--            </button>-->
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>