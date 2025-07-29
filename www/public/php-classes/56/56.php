<?php
require_once "Date.php";

$date = new Date('2025-12-31');

echo $date->getYear();  // выведет '2025'
echo '<br>';
echo $date->getMonth(); // выведет '12'
echo '<br>';
echo $date->getDay();   // выведет '31'
echo '<br>';

echo $date->getWeekDay();     // выведет '3'
echo '<br>';
echo $date->getWeekDay('ru'); // выведет 'среда'
echo '<br>';
echo $date->getWeekDay('en'); // выведет 'wednesday'
echo '<br>';
echo (new Date('2025-12-31'))->addYear(1); // '2026-12-31'
echo '<br>';
echo (new Date('2025-12-31'))->addDay(1);  // '2026-01-01'
echo '<br>';
echo (new Date('2025-12-31'))->subDay(3)->addYear(1); // '2026-12-28'