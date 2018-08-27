<?php
namespace Services;

use Entity\Animal;
use Entity\Person;
use Entity\Shelter;
use Exceptions\AnimalNotFoundException;

/**
 * Class ShelterService
 * Сервис для работы с приютом
 * @package Services
 */
class ShelterService
{

    /**
     * Приют с которым идет работа
     * @var Shelter $shelter
     */
    private $shelter;

    /**
     * ShelterService constructor.
     * @param Shelter $shelter
     */
    public function __construct(Shelter $shelter)
    {
        $this->shelter = $shelter;
    }

    /**
     * Помещение животного в приют
     * @param Animal $animal
     */
    public function put(Animal $animal){
        $this->shelter->putAnimal($animal);
    }

    /**
     * Отдать животное человеку
     * @param $class string - Класс животного
     * @param Person $person
     */
    public function transfer(Person $person, $class = null){
        try{
            $animal = $this->shelter->takeOldestAnimal($class);
            $person->putAnimal($animal);
        }catch (AnimalNotFoundException $exception){
            return false;
        }
    }

    /**
     * Отсортированный список животных из приюта
     * @param $class string - Класс животного
     * @return array
     */
    public function getSortedAnimals($class){
        $animals = $this->shelter->getAnimals();
        $filteredAnimals = array_filter($animals, function($animal) use ($class){
            return $animal instanceof $class;
        });
        usort($filteredAnimals, function($animalA, $animalB){
            return strcmp($animalA->getName(), $animalB->getName());
        });
        return $filteredAnimals;
    }

}