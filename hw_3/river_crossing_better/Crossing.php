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
    private $children = array();
    private $adult = array();
    private $data;

    public function addPerson(Person $person)
    {
        if ($person->personType === 'child') {
            $this->children[] = $person;
        }
        if ($person->personType === 'adult') {
            $this->adult[] = $person;
        }
    }

    public function storeToFile($fileName)
    {
        $this->crossing();
        file_put_contents($fileName, $this->data);
    }

    private function crossing()
    {
        $numberChildren = count($this->children);
        if ($numberChildren < 2){
            throw new \Exception ('Crossing impossible. Because number children is less 2.');
        }
        $numberAdults = count($this->adult);

        for ($j = 0; $j < $numberAdults; $j++) {

            $this->crossingTwoChildren();
            $this->crossingFirstChild();

            $this->adult[$j]->setPositionCoast('right');
            $this->data .= "{$this->adult[$j]->person} crossing the river" . PHP_EOL;

            $this->crossingSecondChild();
        }


        if ($numberChildren > 2) {
            for ($j = 2; $j < $numberChildren; $j++) {

                $this->crossingTwoChildren();
                $this->crossingFirstChild();

                $this->children[$j]->setPositionCoast('right');
                $this->data .= "{$this->children[$j]->person} crossing the river" . PHP_EOL;

                $this->crossingSecondChild();
            }
        }

        $this->crossingTwoChildren();
        $this->data .= "Fishman has a boat.";
    }

    private function crossingTwoChildren()
    {
        $this->children[0]->setPositionCoast('right');
        $this->children[1]->setPositionCoast('right');
        $this->data .= "Children ({$this->children[0]->person} and {$this->children[1]->person}) crossing the river.(Now they are on the {$this->children[0]->getPositionCoast()} coast)" . PHP_EOL;
    }

    private function crossingFirstChild()
    {
        $this->children[0]->setPositionCoast('left');
        $this->data .= "{$this->children[0]->person} crossing the river.Now he (she) is on the {$this->children[0]->getPositionCoast()} coast." . PHP_EOL;
    }

    private function crossingSecondChild()
    {
        $this->children[1]->setPositionCoast('left');
        $this->data .= "{$this->children[1]->person} crossing the river.Now he (she) is on the {$this->children[1]->getPositionCoast()} coast." . PHP_EOL;
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