<?php
namespace Entity;

/**
 * Class Animal
 * @package Entity
 */
abstract class Animal
{
    private $id;
    private $name;
    private $age;

    /**
     * Animal constructor.
     * Для каждого животного при попадании в приют указывается кличка и определяется возраст
     * @param string $name
     * @param $age
     */
    public function __construct(string $name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = uniqid();
    }

    /**
     * Имя животного
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Возраст животного
     * @return mixed
     */
    public function getAge(){
        return $this->age;
    }

    /**
     * Идентификатор
     * @return string
     */
    public function getId(){
        return $this->id;
    }
}