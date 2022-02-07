<?php

class Account
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

    public function deposit(float $amount)
    {
        $this->balance += $amount;
    }

    public function withdrawal(float $amount)
    {
        $this->balance -= $amount;
    }
}

$firstAccount = new Account('My First Account', 100);
$firstAccount->deposit(20);
echo $firstAccount->getName().', balance: '. $firstAccount->getBalance().PHP_EOL;

class MoneyTransfer
{
    private Account $account;

    public function wireMoney()
    {
        $matt = new Account('Matt`s account', 1000);
        $me = new Account('My account', 0);
        $matt->withdrawal(100);
        $me->deposit(100);
        echo $matt->getName().', balance: '.$matt->getBalance().PHP_EOL;
        echo $me->getName(). ', balance: '.$me->getBalance().PHP_EOL;

    }

}

(new MoneyTransfer())->wireMoney();

class AnotherMoneyTransfer
{
    private Account $account;

    public function transfer(Account $from, Account $to, int $howMuch)
    {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }

    public function main()
    {
        $A = new Account('A', 100);
        $B = new Account('B', 0);
        $C = new Account('C', 0);
        $this->transfer($A, $B, 50);
        $this->transfer($B, $C, 25);
        echo $A->getName(). ' transferred 50 to: '.$B->getName().' and currently have '.$A->getBalance().PHP_EOL;
        echo $B->getName(). ' transferred 25 to: '.$C->getName().' and currently have '.$B->getBalance().PHP_EOL;
        echo $C->getName(). ' currently have '.$C->getBalance().PHP_EOL;
    }
}

(new AnotherMoneyTransfer())->main();