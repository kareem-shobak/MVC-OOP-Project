<?php

require_once __DIR__ . '/../../core/Database.php';

class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function all()
    {
        return $this->db->fetchAll("SELECT * FROM {$this->table}");
    }

    public function find($id)
    {
        return $this->db->fetch("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function delete($id)
    {
        return $this->db->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
