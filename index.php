<?php
use Entity\Dog;
use Entity\Cat;
use Entity\Turtle;
use Entity\Person;
use Entity\Shelter;
use Services\ShelterService;

spl_autoload_register(function($class){
    $filename = str_replace('\\', '/', $class) . '.php';
    include($filename);
});

$shelter = new Shelter();
$shelterService = new ShelterService($shelter);

$dogA = new Dog('dog a', 5);
$dogB = new Dog('dog b', 5);
$dogC = new Dog('dog c', 5);

$catA = new Cat('cat a', 10);
$catB = new Cat('cat b', 10);
$catC = new Cat('cat c', 10);

$turtleA = new Turtle('turtle a', 50);
$turtleB = new Turtle('turtle b', 50);
$turtleC = new Turtle('turtle c', 50);

$shelterService->put($dogC);
$shelterService->put($dogA);
$shelterService->put($dogB);

$shelterService->put($catA);
$shelterService->put($catB);
$shelterService->put($catC);

$shelterService->put($turtleB);

$sortedDogs = $shelterService->getSortedAnimals(Dog::class);

$person = new Person();
$shelterService->transfer($person, Turtle::class);
$personAnimals = $person->getAnimals();
