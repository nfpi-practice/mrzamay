<?php
class Date {
    private $day;
    private $month;
    private $year;
    private $timestamp;
    public function __construct($date = null)
    {
        if ($date == null) {
            $this->day = date('d');
            $this->month = date('n');
            $this->year = date('Y');
            $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        }
        else
        {
            $this->day = date('d', strtotime($date));
            $this->month = date('n', strtotime($date));
            $this->year = date('Y', strtotime($date));
            $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        }
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getMonth($lang = null)
    {
        $ruMonths = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        if ($lang === null)
        {
            return $this->month;
        }
        elseif ($lang === 'en') {
            return date('F', $this->timestamp);
        }
        elseif ($lang === 'ru')
        {
            return $ruMonths[$this->month - 1];
        }
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getWeekDay($lang = null)
    {
        $ruWeekDays = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресение'];
        // возвращает день недели
        if ($lang === null)
        {
            return date('N', $this->timestamp);
        }
        elseif ($lang === 'en')
        {
            return date('l', $this->timestamp);
        }
        elseif ($lang === 'ru')
        {
            return $ruWeekDays[date('N', $this->timestamp) - 1];
        }
    }

    public function addDay($value)
    {
        $this->day += $value;
        while ($this->day > date('t', mktime(0, 0, 0, $this->month, 1, $this->year)))
        {
            $this->day -= date('t', mktime(0, 0, 0, $this->month, 1, $this->year));
            $this->month++;
            if ($this->month > 12) {
                $this->month = 1;
                $this->year++;
            }
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function subDay($value)
    {
        $this->day -= $value;
        while ($this->day < 1)
        {
            $this->month--;

            if ($this->month < 1)
            {
                $this->month = 12;
                $this->year--;
            }
            $this->day += date('t', mktime(0, 0, 0, $this->month, 1, $this->year));
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function addMonth($value)
    {
        $this->month += $value;
        while ($this->month > 12) {
            $this->month -= 12;
            $this->year++;
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function subMonth($value)
    {
        $this->month -= $value;
        while ($this->month < 1)
        {
            $this->month += 12;
            $this->year--;
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function addYear($value)
    {
        $this->year += $value;
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function subYear($value)
    {
        $this->year -= $value;
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function format($format)
    {
        echo date($format, $this->timestamp);
    }

    public function __toString()
    {
        return $this->year . '-' . $this->month . '-' . $this->day;
    }
}