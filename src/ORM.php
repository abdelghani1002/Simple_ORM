<?php

class ObjectRelationalMapping
{
    private $db;
    private $table;

    public function __construct(PDO $db, string $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function create(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        $stmt = $this->db->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        return $stmt->execute();
    }

    public function read(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, array $data)
    {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "{$key} = :{$key}, ";
        }
        $setClause = rtrim($setClause, ', ');

        $query = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        return $stmt->execute();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
