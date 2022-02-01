<?php

class Person
{
    private string $name;
    private string $surname;
    private string $idNumber;

    public function __construct(string $name, string $surname, int $idNumber)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->idNumber = $idNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getIdNumber(): string
    {
        return $this->idNumber;
    }
}

class Register
{
    private array $register = [];


    public function addToRegister(Person $person): void
    {
        $this->register[] = $person;
    }

    public function getPerson(): array
    {
        return $this->register;
    }
}

$registry = new Register();
while (true) {

    echo "[1] Enter new person: " . PHP_EOL;
    echo "[2] Open register: " . PHP_EOL;
    echo "[3] Exit" . PHP_EOL;
    echo PHP_EOL;

    $option = (int)readline('Please select Your choice (1-3): ');

    switch ($option) {
        case 1:

            $name = readline('Enter persons first Name: ');
            $surname = readline('Enter persons last Name: ');
            $idNumber = (int)readline('Enter ID number: ');

            $person = new Person($name, $surname, $idNumber);

            $registry->addToRegister($person);
            echo PHP_EOL;
            echo "New person added to register." . PHP_EOL;
            echo PHP_EOL;
        break;
        case 2:
            echo "List of persons:".PHP_EOL;
            echo "Nr - Name - Last name - Id Number".PHP_EOL;
            foreach($registry->getPerson() as $index => $person){
                /**@var Person $person */
                echo "{$index} - {$person->getName()} - {$person->getSurname()} - {$person->getIdNumber()}".PHP_EOL;
            }
            echo PHP_EOL;
        break;
        case 3:
            exit;
    }
}



