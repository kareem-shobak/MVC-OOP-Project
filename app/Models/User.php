<?php

require_once __DIR__ . '/Model.php';

class User extends Model
{
    protected $table = 'users';

    public function findByEmail($email)
    {
        return $this->db->fetch(
            "SELECT * FROM {$this->table} WHERE email = ?",
            [$email]
        );
    }

    public function createUser($data)
    {
        return $this->db->query(
            "INSERT INTO {$this->table} (name, email, password) VALUES (?, ?, ?)",
            [
                $data['name'],
                $data['email'],
                $data['password']
            ]
        );
    }
}

