<?php

class SavingsAccount
{

    private float $balance;
    private float $annualInterestRate;

    public function __construct(float $balance, float $annualInterestRate)
    {
        $this->balance = $balance;
        $this->annualInterestRate = $annualInterestRate;
    }

    public function getCurrentBalance(): float
    {
        return $this->balance;
    }

    public function withdrawMoney(float $withdrawAmount):void
    {
        $this->balance -= $withdrawAmount;
    }

    public function depositMoney(float $depositAmount):void
    {
        $this->balance += $depositAmount;
    }

    public function addInterest():float
    {
        return $this->balance += $this->balance*($this->annualInterestRate/12);
    }
}

$startingBalance = (int)readline('Please enter starting balance: ');
$annualInterestRate = (int)readline('Please enter annual interest rate: ');
$periodOfSavings = (int) readline('How long has the account been opened? ');

$account = new SavingsAccount($startingBalance, $annualInterestRate);
$totalDeposited = 0;
$totalWithdrawn = 0;
$totalInterestEarned = 0;


for($i = 1; $i <= $periodOfSavings; $i++)
{
    $depositAmount = (int)readline("Enter amount deposited for month: {$i}: ");
    $account->depositMoney($depositAmount);
    $totalDeposited += $depositAmount;
    $withdrawAmount = (int)readline("Enter amount withdrawn for month: {$i}: ");
    $account->withdrawMoney($withdrawAmount);
    $totalWithdrawn += $withdrawAmount;
    $currentBalance = $account->getCurrentBalance();
    $totalInterestEarned += $account->addInterest() - $currentBalance;
}

echo 'Total deposited: $' . number_format($totalDeposited,2, '.', ',').PHP_EOL;
echo 'Total withdrawn: $' . number_format($totalWithdrawn, 2, '.', ',').PHP_EOL;
echo 'Interest earned: $' . number_format($totalInterestEarned, 2, '.', ',').PHP_EOL;
echo 'Ending Balance: $' . number_format($account->getCurrentBalance(),2, '.', ',').PHP_EOL;
