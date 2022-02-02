<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?string $father;
    private ?string $mother;

    public function __construct(string $name, string $sex, ?string $mother = null, ?string $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->father = $father;
        $this->mother = $mother;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }


    public function getFatherName(): string
    {
        if ($this->father == null) {
            return 'Unknown';
        } else {
            return $this->father;
        }
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        return $this->mother === $otherDog->mother;
    }
}

class DogTest
{

    public function mainMethod()
    {
        $max = new Dog('Max', 'male', 'Lady', 'Rocky');
        $rocky = new Dog('Rocky', 'male', 'Molly', 'Sam');
        $sparky = new Dog('Sparky', 'male');
        $buster = new Dog('Buster', 'male', 'Lady', 'Sparky');
        $sam = new Dog('Sam', 'male');
        $lady = new Dog('Lady', 'female');
        $molly = new Dog('Molly', 'female');
        $coco = new Dog('Coco', 'female', 'Molly', 'Buster');

        echo 'Reference to Coco Father name:'.PHP_EOL;
        echo $coco->getFatherName() == 'Buster' ? 'Pass' : 'Fail';
        echo PHP_EOL;
        echo 'Reference to Sparky Father name:'.PHP_EOL;
        echo $sparky->getFatherName() == 'Unknown' ? 'Pass' : 'Fail';
        echo PHP_EOL;
        echo 'Has Coco the same mother as Rocky?'.PHP_EOL;
        echo $coco->hasSameMotherAs($rocky) == true ? 'Pass' : 'Fail';
        echo PHP_EOL;
    }
}

(new DogTest())->mainMethod();


