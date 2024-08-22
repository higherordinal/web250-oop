<?php

// Define the Bird class
class Bird {
    // Properties
    public $commonName;
    public $food;
    public $nestPlacement;
    public $conservationLevel;

    // Constructor to initialize the properties
    public function __construct($commonName, $food, $nestPlacement, $conservationLevel) {
        $this->commonName = $commonName;
        $this->food = $food;
        $this->nestPlacement = $nestPlacement;
        $this->conservationLevel = $conservationLevel;
    }

    // Methods
    public function song() {
        // Return the song based on the bird's common name
        if ($this->commonName == "Eastern Towhee") {
            return "drink-your-tea!";
        } elseif ($this->commonName == "Indigo Bunting") {
            return "whatwhat!";
        } else {
            return "Unknown song";
        }
    }

    public function canFly() {
        return "This bird can fly";
    }
}

// Create two bird instances
$bird1 = new Bird("Eastern Towhee", "seeds, fruits, insects, spiders", "Ground", "Low");
$bird2 = new Bird("Indigo Bunting", "small seeds, berries, buds, and insects", "roadsides, and railroad rights-of-way, fields and on the edges of woods", "Low");

// Display the content for both bird instances
echo "<h1>Bird 1</h1>";
echo "<p>Common Name: " . $bird1->commonName . "</p>";
echo "<p>Food: " . $bird1->food . "</p>";
echo "<p>Nest Placement: " . $bird1->nestPlacement . "</p>";
echo "<p>Conservation Level: " . $bird1->conservationLevel . "</p>";
echo "<p>Song: " . $bird1->song() . "</p>";
echo "<p>Can Fly: " . $bird1->canFly() . "</p>";

echo "<h1>Bird 2</h1>";
echo "<p>Common Name: " . $bird2->commonName . "</p>";
echo "<p>Food: " . $bird2->food . "</p>";
echo "<p>Nest Placement: " . $bird2->nestPlacement . "</p>";
echo "<p>Conservation Level: " . $bird2->conservationLevel . "</p>";
echo "<p>Song: " . $bird2->song() . "</p>";
echo "<p>Can Fly: " . $bird2->canFly() . "</p>";

?>
