<?php

// Parent class
class Animal {
    // Class variable
    public $name;

    // Constructor to initialize the name
    public function __construct($name) {
        $this->name = $name;
    }

    // Class method
    public function makeSound() {
        return "Some generic animal sound";
    }

    // Method to display basic info
    public function getInfo() {
        return "This is an animal named $this->name.";
    }
}

// Subclass 1
class Dog extends Animal {
    // Additional attribute specific to Dog
    public $breed;

    // Constructor to initialize name and breed
    public function __construct($name, $breed) {
        parent::__construct($name);
        $this->breed = $breed;
    }

    // Overriding the makeSound method
    public function makeSound() {
        return "Bark";
    }

    // Overriding the getInfo method to include breed information
    public function getInfo() {
        return "This is a $this->breed dog named $this->name.";
    }
}

// Subclass 2
class Cat extends Animal {
    // Additional attribute specific to Cat
    public $color;

    // Constructor to initialize name and color
    public function __construct($name, $color) {
        parent::__construct($name);
        $this->color = $color;
    }

    // Overriding the makeSound method
    public function makeSound() {
        return "Meow";
    }

    // Overriding the getInfo method to include color information
    public function getInfo() {
        return "This is a $this->color cat named $this->name.";
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
