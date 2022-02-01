<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getDay():int
    {
        return $this->day;
    }

    public function setDay(int $day):int
    {
        return $this->day = $day;
    }

    public function getMonth():int
    {
        return $this->month;
    }

    public function setMonth(int $month):int
    {
        return $this->month = $month;
    }

    public function getYear():int
    {
        return $this->year;
    }

    public function setYear(int $year):int
    {
        return $this->year = $year;
    }

    public function displayDate():string
    {
        return $this->day.'/'.$this->month.'/'.$this->year;
    }
}


while (true)
{
    echo '[1] Set Date'.PHP_EOL;
    echo '[2] Exit'.PHP_EOL;

    $option = (int)readline('Choose option (1-2): ');

    switch($option)
    {
        case 1:
            $setDay = (int) readline('Please enter Day: ');
            $setMonth = (int) readline('Please enter Month: ');
            $setYear = (int) readline('Please enter Year: ');

            $dateTest = new Date($setDay,$setMonth,$setYear);
            echo 'You entered: '.$dateTest->displayDate().PHP_EOL;
            break;
        case 2:
            exit;
    }
}
