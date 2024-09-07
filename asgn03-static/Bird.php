<?php

class Bird {
    
    // Public properties for Bird details
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    public $song = "chirp";
    
    // Protected property, accessible only within the class and its subclasses
    protected $flying = "yes";
    
    // Static properties
    public static $instanceCount = 0;
    public static $eggNum = 0; // Default egg number for birds

    // Static method to create a new instance of Bird
    public static function create() {
        $className = get_called_class(); // Retrieve the name of the calling class
        $obj = new $className; // Create a new instance of the calling class
        self::$instanceCount++; // Increment the instance count
        return $obj; // Return the created instance
    }

    // Method to check if the bird can fly using ternary operator
    public function canFly() {
        return $this->flying == "yes" ? "bird can fly" : "cannot fly and is stuck on the ground";
    }
}

class YellowBelliedFlyCatcher extends Bird {
    // Public properties specific to YellowBelliedFlyCatcher
    public $name = "yellow-bellied flycatcher";
    public $diet = "mostly insects.";
    public $song = "flat chilk";
    
    // Static property to override eggNum for YellowBelliedFlyCatcher
    public static $eggNum = "3-4, sometimes 5";
}

class Kiwi extends Bird {
    // Public properties specific to Kiwi
    public $name = "kiwi";
    public $diet = "omnivorous";
    
    // Overriding the flying property
    protected $flying = "no";
}

?>
