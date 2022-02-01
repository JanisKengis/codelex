<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getBalance():float
    {
        return $this->balance;
    }

    public function show_user_name_and_balance():string
    {
        if($this->getBalance() < 0){
            return $this->getName().', -$'.number_format(abs($this->getBalance()),2, ',', '');
        }
        return $this->getName().', $'.round($this->getBalance(),2);
    }
}

$ben = new BankAccount('Benson', -17.5);
echo $ben->show_user_name_and_balance().PHP_EOL;

