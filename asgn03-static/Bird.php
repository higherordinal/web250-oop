<?php

class Bird {
    
    // Public properties for Bird details
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    
    // Protected and static properties
    protected $flying = "yes";
    protected static $song = "chirp"; // Static property for the generic bird song

    // Static properties for instance counting
    public static $instanceCount = 0; // Shared across all subclasses
    public static $eggNum = 0; // Default egg number for birds

    // Static method to create a new instance of Bird using late static binding
    public static function create() {
        $className = get_called_class(); // Retrieve the name of the calling class
        $obj = new $className; // Create a new instance of the calling class
        Bird::$instanceCount++; // Always increment the Bird class instance count
        return $obj; // Return the created instance
    }

    // Static method to get the generic song of a bird
    public static function getSong() {
        return static::$song; // Late static binding to allow overriding in subclasses
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
    
    // Override static song property
    protected static $song = "flat chilk"; // Specific song for YellowBelliedFlyCatcher
    
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
