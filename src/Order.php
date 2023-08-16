<?php

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

    public static function getById($id)
    {
        $stmt = self::$pdo->prepare("SELECT * FROM order_self WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
        $stmt->execute([$id]);
        $order = $stmt->fetch();

        return $order;
    }

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

    public static function chekLimit($created_at)
    {
        $half_day = strtotime(date('Y-m-d').' 12:00:00');
        $created_at = strtotime($limit->created_at);

        if ($created_at < $half_day) {
            return "лимит не превышен";
        } else {
            return "лимит превышен";
        }
        exit();
    }

    public function updateStatus($newStatus) {
        $this->status = $newStatus;
        $this->updated_at = date('Y-m-d H:i:s');
        // Обновление статуса в базе данных
        $stmt = self::$pdo>prepare('UPDATE order_self SET status = ?, updated_at = ? WHERE id = ?');
        $stmt->execute([$newStatus, $this->updated_at, $this->id]);
    }
}
