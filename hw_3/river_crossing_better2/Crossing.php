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

namespace river_crossing_better;

require_once 'AdultPerson.php';
require_once 'ChildPerson.php';
require_once 'Person.php';

class Crossing
{
    private $persons = array();
    private $two_children = array();
    private $adult = array();
    private $data;
    public $file_name;

    public function addPerson(Person $name)
    {
        return $this->persons[] = $name;
    }

    private function createTwoArrays()
    {
        $number_persons = count($this->persons);
        $i = 0;
        while( $i < $number_persons){

            $number_children = count($this->two_children);
            if ($this->persons[$i]->person_type === 'child' && $number_children < 2) {
                $this->two_children[] = $this->persons[$i];
            }
            // Array adult has adult persons and another children, that not in array two_children
            if ($this->persons[$i]->person_type === 'adult' ||
                ($this->persons[$i]->person_type === 'child' && !in_array($this->persons[$i], $this->two_children))) {
                $this->adult[] = $this->persons[$i];
            }
            ++$i;
        }
    }

    private function crossingTwoChildren()
    {
        $this->two_children[0]->position_boat = 1;
        $this->two_children[1]->position_boat = 1;

        $this->two_children[0]->position_coast = 'right';
        $this->two_children[1]->position_coast = 'right';
        $this->two_children[1]->position_boat = 0;
        $this->data .= "Children ({$this->two_children[0]->name} and {$this->two_children[1]->name}) crossing the river.(Now they are on the {$this->two_children[0]->position_coast} coast)" . PHP_EOL;
    }

    private function crossingFirstChild()
    {
        $this->two_children[0]->position_coast = 'left';
        $this->two_children[0]->position_boat = 0;
        $this->data .= "{$this->two_children[0]->name} crossing the river.Now he (she) is on the {$this->two_children[0]->position_coast} coast." . PHP_EOL;
    }

    private function crossingSecondChild()
    {
        $this->two_children[1]->position_boat = 1;
        $this->two_children[1]->position_coast = 'left';
        $this->two_children[1]->position_boat = 0;
        $this->data .= "{$this->two_children[1]->name} crossing the river.Now he (she) is on the {$this->two_children[1]->position_coast} coast." . PHP_EOL;
    }

    private function crossing()
    {
        $this->createTwoArrays();

        $number_adults = count($this->adult);

        for ($j = 0; $j < $number_adults; $j++) {

            $this->crossingTwoChildren();
            $this->crossingFirstChild();
            $this->adult[$j]->position_boat = 1;
            $this->adult[$j]->position_coast = 'right';
            $this->adult[$j]->position_boat = 0;
            $this->data .= "{$this->adult[$j]->name} crossing the river" . PHP_EOL;
            $this->crossingSecondChild();
        }

        $this->crossingTwoChildren();
        $this->two_children[0]->position_boat = 0;
        $this->data .= "Fishman has a boat.";
    }

    public function storeToFile($file_name)
    {
        $this->crossing();
        file_put_contents($file_name, $this->data);
    }
}

$fishman = new AdultPerson('Fishman');
$son = new ChildPerson('Son');
$mother = new AdultPerson('Mother');
$father = new AdultPerson('Father');
$daughter = new ChildPerson('Daughter');

$crossingAlgorithm = new Crossing();
$crossingAlgorithm->addPerson($fishman);
$crossingAlgorithm->addPerson($mother);
$crossingAlgorithm->addPerson($father);
$crossingAlgorithm->addPerson($son);
$crossingAlgorithm->addPerson($daughter);

$crossingAlgorithm->storeToFile('file.txt');