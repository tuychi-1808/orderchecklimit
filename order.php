<?php

require_once 'config/layout.php';

$order_id = $_GET['id'];


$order = Order::getById($order_id);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--start bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title><?php echo $title; ?></title>

</head>
<body>
<div class="container" style="margin-top: 100px; border: solid 3px black;;">
    <div class="container" style="text-align: center; margin-bottom: 30px; margin-top: 25px" >
        <h3>Состояние заказа</h3>
    </div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название заказа</th>
                <th scope="col">Дата и время создания</th>
                <th scope="col">Дата и время последнего изменения</th>
                <th scope="col">Статус документа</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $order->orderName; ?></td>
                    <td><?= $order->created_at; ?></td>
                    <td><?= $order->updated_at; ?></td>
                    <td><?= $order->status;?></td>
                    <td>
                        <a href="limit.php?id=<?= $order->id;?>&create_at=<?= $order->created_at; ?>" class="btn btn-outline-info" style="margin: 10px;">Проверка на лимит</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="index.php" class="btn btn-outline-secondary" style="margin: 10px;" type="button">Назад к спискам заказов</a>
</div>
<!--start js link-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>

