<?php

// Нужно написать алгоритм решения следующей задачи:
// «Семья - Отец, мать и двое детей – сын и дочь, должны переправиться через реку.
// Поблизости случился рыбак, который мог бы одолжить им свою лодку. Однако, в лодке
// могут поместится только один взрослый или двое детей.
// Как семье переправиться через реку и вернуть рыбаку его лодку?»
// Условия: Каждый член семьи должен быть классом с определенными свойствами.
// Сообщения о доставке должны писаться в log-файл так, чтоб было понятно, кто кого на
// какой берег перевез. Писать код на PHP5. Программа должна поддерживать
// расширяемость, к примеру, если захотим добавить еще детей.

require_once 'Father.php';
require_once 'Mother.php';
require_once 'Son.php';
require_once 'Daughter.php';
require_once 'Fishman.php';
require_once 'Children.php';

class Crossing
{
    public $people;
    public $data;
    public $position_boat;
    public $file;
    public $position_coast;
    private static $count_people = 0;
    const COUNT_PEOPLE = 3;

    function writeData($data)
    {
        $this->file = 'file.txt';
        file_put_contents($this->file, $this->data, FILE_APPEND);
    }

    public function numberPeople()
    {
        var_dump(self::$count_people++);
    }

    public function sitDown()
    {
        return $this->position_boat = 1;
    }

    public function standUp()
    {
        return $this->position_boat = 0;
    }

    function crosssing($people)
    {
        if (self::$count_people <= self::COUNT_PEOPLE && $this->people !== 'children') {
            self::numberPeople();
            self::crossingChildren();
            Son::cross();
            $this->data .= "{$this->people} crossing the river" . PHP_EOL;
            Daughter::cross();
            self::writeData($this->data);
        } elseif (self::COUNT_PEOPLE === self::$count_people && $this->people === 'children') {
            self::crossingChildren();
            self::writeData($this->data);
        }
    }

    function crossingChildren()
    {
        Son::sitDown();
        Daughter::sitDown();
        Children::crossToRight();
        $this->data .= "Children (Son and Daughter) crossing the river. (Now they are on the {$this->position_coast} coast)" . PHP_EOL;
        Son::standUp();
        Daughter::standUp();
    }
}
//
//$children = new Children();
//$father = new Father();
//$mother = new Mother();
//$fishman = new Fishman();
/*
$fishman = new AdultPerson('fishman');
$son = new ChildPerson('son');

$crossingAlgorithm = new Crossing();
$crossingAlgorithm->addPerson($fishman);
$crossingAlgorithm->addPerson($mother);
$crossingAlgorithm->addPerson($father);
$crossingAlgorithm->addPerson($son);
$crossingAlgorithm->addPerson($daughter);

$crossingAlgorithm->storeToFile('file.txt');*/

////Children must be crossing last.
//$fishman->crossing();
//$mother->crossing();
//$father->crossing();
//$children->crossing();