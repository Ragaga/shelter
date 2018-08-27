<?php
namespace Traits;

use Entity\Animal;

/**
 * Trait StorableAnimals
 * @package Traits
 */
trait StorableAnimals
{
    /**
     * Хранилище животных
     * @var Animal[]
     */
    private $animals = [];

    /**
     * Поместить животное в хранилище
     * @param Animal $animal
     */
    public function putAnimal(Animal $animal){
        //Храним с идентификаторами, чтобы потом проще было удалять из хранилища
        $this->animals[$animal->getId()] = $animal;
    }

    /**
     * Вернуть список животных
     * @return array
     */
    public function getAnimals(){
        return $this->animals;
    }
}