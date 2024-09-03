<?php

// Parent class
class Animal {
    // Protected class variable
    protected $name;

    // Constructor to initialize the name
    public function __construct($name) {
        $this->setName($name);
    }

    // Protected setter for name
    public function setName($name) {
        $this->name = $name;
    }

    // Public getter for name
    public function getName() {
        return $this->name;
    }

    // Class method
    public function makeSound() {
        return "Some generic animal sound";
    }

    // Method to display basic info
    public function getInfo() {
        return "This is an animal named " . $this->getName() . ".";
    }
}

// Subclass 1
class Dog extends Animal {
    // Private attribute specific to Dog
    private $breed;

    // Constructor to initialize name and breed
    public function __construct($name, $breed) {
        parent::__construct($name);
        $this->setBreed($breed);
    }

    // Setter for breed
    public function setBreed($breed) {
        $this->breed = $breed;
    }

    // Getter for breed
    public function getBreed() {
        return $this->breed;
    }

    // Overriding the makeSound method
    public function makeSound() {
        return "Bark";
    }

    // Overriding the getInfo method to include breed information
    public function getInfo() {
        return "This is a " . $this->getBreed() . " dog named " . $this->getName() . ".";
    }
}

// Subclass 2
class Cat extends Animal {
    // Private attribute specific to Cat
    private $color;

    // Constructor to initialize name and color
    public function __construct($name, $color) {
        parent::__construct($name);
        $this->setColor($color);
    }

    // Setter for color
    public function setColor($color) {
        $this->color = $color;
    }

    // Getter for color
    public function getColor() {
        return $this->color;
    }

    // Overriding the makeSound method
    public function makeSound() {
        return "Meow";
    }

    // Overriding the getInfo method to include color information
    public function getInfo() {
        return "This is a " . $this->getColor() . " cat named " . $this->getName() . ".";
    }
}

// Create instances of each class
$dog = new Dog("Buddy", "Golden Retriever");
$cat = new Cat("Whiskers", "black");

// Demonstrate that subclasses inherit from the parent class and override methods
echo $dog->getInfo() . '<br>';
echo $dog->makeSound() . '<br>';

echo $cat->getInfo() . '<br>';
echo $cat->makeSound() . '<br>';

?>
