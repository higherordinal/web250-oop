<?php

class Bicycle {
    
    // Static property to count instances of the class
    public static $instanceCount = 0;

    // Public properties for bicycle details
    public $brand;
    public $model;
    public $year;
    public $category;
    
    // Default description for all bicycles
    public $description = 'Used bicycle';

    // Protected properties, accessible within the class and its subclasses
    protected $weightKg = 0.0;
    protected static $wheels = 2; // Default number of wheels for bicycles

    // Constant array holding all possible bicycle categories
    public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

    // Static method to create an instance of the calling class
    public static function create() {
        $className = get_called_class(); // Retrieve the name of the calling class
        $obj = new $className; // Create a new instance of the calling class
        self::$instanceCount++; // Increment instance count
        return $obj; // Return the created instance
    }

    // Public method to get the name of the bicycle as a string
    public function getName() {
        return $this->brand . " " . $this->model . " (" . $this->year . ")";
    }

    // Static method to return details about the number of wheels
    public static function getWheelDetails() {
        $wheelString = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels"; // Check if singular or plural
        return "It has " . $wheelString . ".";
    }

    // Public method to get the weight in kilograms
    public function getWeightKg() {
        return $this->weightKg . ' kg';
    }

    // Public method to set the weight in kilograms
    public function setWeightKg($value) {
        $this->weightKg = floatval($value); // Ensure the value is a float
    }

    // Public method to get the weight in pounds
    public function getWeightLbs() {
        $weightLbs = floatval($this->weightKg) * 2.2046226218; // Convert kilograms to pounds
        return $weightLbs . ' lbs';
    }

    // Public method to set the weight in pounds (converts to kilograms)
    public function setWeightLbs($value) {
        $this->weightKg = floatval($value) / 2.2046226218; // Convert pounds to kilograms
    }
}

// Subclass of Bicycle representing a Unicycle
class Unicycle extends Bicycle {
    
    // Override the number of wheels for unicycles
    protected static $wheels = 1;

    // Public method for testing (returns the weight in kg)
    public function bugTest() {
        return $this->weightKg;
    }
}

// Creating an instance of Bicycle
$trek = new Bicycle();
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';

// Display the number of Bicycle and Unicycle instances before creating new objects
echo 'Bicycle count: ' . Bicycle::$instanceCount . '<br>';
echo 'Unicycle count: ' . Unicycle::$instanceCount . '<br>';

// Create new instances of Bicycle and Unicycle using the static method
$bike = Bicycle::create();
$uni = Unicycle::create();

// Display the updated instance count after creating new objects
echo 'Bicycle count: ' . Bicycle::$instanceCount . '<br>';
echo 'Unicycle count: ' . Unicycle::$instanceCount . '<br>';

echo "<hr>";

// Display available categories for bicycles
echo 'Categories: ' . implode(', ', Bicycle::CATEGORIES) . '<br>';
$trek->category = Bicycle::CATEGORIES[0]; // Assign the first category (Road) to the $trek instance
echo 'Category: ' . $trek->category . '<br>';

echo "<hr>";

// Display wheel details for Bicycle and Unicycle
echo "Bicycle: " . Bicycle::getWheelDetails() . "<br>";
echo "Unicycle: " . Unicycle::getWheelDetails() . "<br>";

?>
