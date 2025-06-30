<?php
phpinfo();
try {
    $pdo = new PDO("mysql:host=mysql;dbname=laravel", 'laravel', 'secret');
    echo "Подключение к БД успешно!";
} catch (PDOException $e) {
    echo "<h2>Ошибка подключения к БД:</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>