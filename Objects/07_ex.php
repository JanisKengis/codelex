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

    public function getName():string
    {
        return $this->name;
    }

    public function getSex():string
    {
        return $this->sex;
    }

    public function getFatherName(): string
    {
        if($this->father == null){
            return 'Unknown';
        } else {
            return $this->father;
        }
    }
}

class DogTest
{
    private array $dogs;
    public function __construct(Dog $dog)
    {
        $this->dogs[] = $dog;
    }

    public function getDogs():array
    {
        return $this->dogs;
    }
}

//$dogs = new DogTest([
//    new Dog('Max', 'male', 'Lady', 'Rocky'),
//    new Dog('Rocky', 'male', 'Molly', 'Sam'),
//    new Dog('Sparky', 'male'),
//    new Dog('Buster', 'male', 'Lady', 'Sparky'),
//    new Dog('Sam', 'male'),
//    new Dog('Lady', 'female'),
//    new Dog('Molly', 'female'),
//    new Dog('Coco', 'female', 'Molly', 'Buster'),
////]
//);
//var_dump($dogs);