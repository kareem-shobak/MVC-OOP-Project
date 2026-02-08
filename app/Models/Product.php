<?php

require_once 'Model.php';

class Product extends Model
{
    protected $table = 'products';

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (name, price) VALUES (:name, :price)";
        $this->db->query($sql, [
            'name'  => $data['name'],
            'price' => $data['price']
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET name = :name, price = :price WHERE id = :id";
        return $this->db->query($sql, [
            'name'  => $data['name'],
            'price' => $data['price'],
            'id'    => $id
        ]);
    }
}
