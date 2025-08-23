<?php

class DatabaseShell
{
    private $link;

    public function __construct($host, $user, $password, $database)
    {
        $this->link = mysqli_connect($host, $user, $password, $database);
        mysqli_query($this->link, "SET NAMES 'utf8'");
    }

    public function save($table, $data)
    {
        $columns = implode(',', array_keys($data));
        $values = [];
        foreach (array_values($data) as $value) {
            if (!is_int($value)) {
                $values[] = "'" . $value . "'";
            } else {
                $values[] = $value;
            }
        }
        $values = implode(',', $values);

        mysqli_query($this->link, "INSERT INTO $table ($columns) VALUES ($values)");
    }

    public function del($table, $id)
    {
        mysqli_query($this->link, "DELETE FROM $table WHERE id = $id");
    }

    public function delAll($table, $ids)
    {
        foreach ($ids as $id) {
            $this->del($table, $id);
        }
    }

    public function get($table, $id)
    {
        return mysqli_fetch_assoc(mysqli_query($this->link, "SELECT * FROM $table WHERE id = $id"));
    }

    public function getAll($table, $ids)
    {
        $users = [];
        foreach ($ids as $id) {
            $users[] = $this->get($table, $id);
        }
        return $users;
    }

    public function selectAll($table, $condition)
    {
        $sql = mysqli_query($this->link, "SELECT * FROM {$table} {$condition}");
        for ($users = []; $row = mysqli_fetch_assoc($sql); $users[] = $row) ;
        return $users;
    }
}


$db = new DatabaseShell('mysql', 'laravel', 'secret', 'laravel');
//$db->save('users', ['name' => 'user2', 'age' => 48]);
//$db->save('users', ['name' => 'user3', 'age' => 49]);
//$db->del('users', 17);
//$db->delAll('users', [11, 12, 13, 14]);
$users = $db->get('users', 18);
print_r("ID 18:<br>" . implode(", ", $users));
$users = $db->getAll('users', [15, 16]);
print_r("<br>ID [15 16]:<br>");
foreach ($users as $user) {
    print_r(implode(", ", $user) . "; ");
}
$users = $db->selectAll('users', 'where id > 5');
print_r("<br>ID >5:<br>");
foreach ($users as $user) {
    print_r(implode(", ", $user) . "; ");
}