<?php
namespace Entity;

use Exceptions\AnimalNotFoundException;
use Traits\StorableAnimals;

/**
 * Class Shelter
 * @package Entity
 */
class Shelter
{
    use StorableAnimals;

    /**
     * Забрать самого долгоживущего. Забираем по принципу кто первый вошел, тот первый вышел
     * @param $class
     * @throws AnimalNotFoundException
     */
    public function takeOldestAnimal($class = null){
        $animals =  $this->getAnimals();
        /**
         * @var Animal
         */
        $oldestAnimal = null;
        if($class === null){
            $oldestAnimal = array_shift($animals);
        }else{
            foreach($animals as $animal){
                if($animal instanceof $class){
                    $oldestAnimal = $animal;
                    break;
                }
            }
        }
        if(!$oldestAnimal){
            throw new AnimalNotFoundException();
        }
        unset($this->animals[$oldestAnimal->getId()]);
        return $oldestAnimal;
    }
}