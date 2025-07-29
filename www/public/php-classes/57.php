<?php
require_once '56/Date.php';

class Interval
{
    private $date1;
    private $date2;

    public function __construct(Date $date1, Date $date2)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function toDays()
    {
        return $this->timestampDiff() / 60 / 60 / 24;
    }

    public function toMonths()
    {
        return round($this->timestampDiff() / 60 / 60 / 24 / 30);
    }

    public function toYears()
    {
        return abs($this->date1->getYear() - $this->date2->getYear());
    }

    private function timestampDiff()
    {
        $date1 = mktime(0, 0, 0, $this->date1->getMonth(), $this->date1->getDay(), $this->date1->getYear());
        $date2 = mktime(0, 0, 0, $this->date2->getMonth(), $this->date2->getDay(), $this->date2->getYear());
        return abs($date2 - $date1);
    }
}

$date1 = new Date('2025-12-31');
$date2 = new Date('2026-11-28');

$interval = new Interval($date1, $date2);

echo $interval->toDays() . "<br>";   // выведет разницу в днях
echo $interval->toMonths() . "<br>"; // выведет разницу в месяцах
echo $interval->toYears();