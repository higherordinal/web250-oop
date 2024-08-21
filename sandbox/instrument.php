<?php

class Instrument {
    // Properties (descriptors)
    var $name;
    var $type;
    var $brand;
    var $price;

    // Constructor

    // public function __construct($name, $type, $brand, $price)
    // {
    //    $this->name = $name;
    //    $this->type = $type;
    //    $this->brand = $brand;
    //    $this->price = $price;   
    // }

    // Methods
    // Kevin will call this var for now

    public function displayDetails() {
        echo "Instrument Details<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Type: " . $this->type . "<br>";
        echo "Brand: " . $this->brand . "<br>";
        echo "Price: " . $this->price . "<br>";
    }
}

// Instantiate a new instance
// or create an object

// $guitar = new Instrument("Guitar", "Acoustic", "Martin". 1000);
// $guitar->displayDetails();

// $guitar = new Instrument("Guitar", "Electric", "Fender". 1000);
// $guitar->displayDetails();

$guitar = new Instrument;

$guitar->name = "Guitar";
$guitar->type = "Acoustic";
$guitar->brand = "Alvarez";
$guitar->price = 900; 
echo "<br>";

$guitar->displayDetails();

$accordian = new Instrument;

$accordian->name = "Accordian";
$accordian->type = "Piano Key";
$accordian->brand = "Titano";
$accordian->price = 1100; 
echo "<br>";

$accordian->displayDetails();
