<?php
date_default_timezone_set('Europe/Moscow');

class Order
{
    public static $pdo;

    public $id;
    public $name;
    public $created_at;
    public $updated_at;
    public $status;

    public static function getAll()
    {
        $stmt = self::$pdo->prepare("SELECT * FROM order_self");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
        $stmt->execute();
        $orders = $stmt->fetchAll();

        return $orders;
    }
    //Этот метод создан для того чтобы выбрать заказ из базы по id
    /*
    public static function getById($id)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM order_self WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
        $stmt->execute([$id]);
        $order = $stmt->fetch();

        return $order;
    }*/

    public static function create($orderName,$created_at,$updated_at,$status)
    {
        $stmt = self::$pdo->prepare("INSERT INTO order_self (orderName, created_at, updated_at , status) VALUES (:orderName,:created_at,:updated_at,:status)");
        $stmt->execute([
            'orderName' => $orderName,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
            'status' => $status,
        ]);
        $row = $stmt->rowCount();
        return $row;

    }

    public static function updateStatus($newStatus, $id) {
        $status = $newStatus;
        $updated_at = date('Y-m-d H:i:s');
        // Обновление статуса в базе данных
        $stmt = self::$pdo->prepare('UPDATE order_self SET status = ?, updated_at = ? WHERE id = ?');
        $stmt->execute([$status, $updated_at, $id]);
    }

    public static function chekLimit($created_at, $id)
    {

          $timestap = strtotime($created_at);
          $hour = date('H:i:s', $timestap);

          echo $hour;

        if ($hour > 0 && $hour < "12:00" ) {
            $newStatus = "лимит не превышен";
            self::updateStatus($newStatus, $id);
        } else {
            $newStatus = "лимит превышен";
            self::updateStatus($newStatus, $id);
        }
    }

    public static function delete($id){
        $stmt=self::$pdo->prepare("DELETE FROM order_self WHERE id=:id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }

}
