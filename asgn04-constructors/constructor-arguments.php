<?php

class Bird {
    public $commonName;
    public $latinName;

    // Constructor that accepts an array of arguments
    public function __construct($args = []) {
        $this->commonName = $args['commonName'] ?? 'Common Name Unknown';
        $this->latinName = $args['latinName'] ?? 'Latin Name Unknown';
    }
}

// Create two instances of the Bird class with given arguments
$bird1 = new Bird(['commonName' => 'Acadian Flycatcher', 'latinName' => 'Empidonax virescens']);
$bird2 = new Bird(['commonName' => 'Carolina Wren', 'latinName' => 'Thryothorus ludovicianus']);

echo "Common Name: {$bird1->commonName}" . "<br>";
echo "Latin Name: {$bird1->latinName}" . "<hr>";
echo "Common Name: {$bird2->commonName}" . "<br>";
echo "Latin Name: {$bird2->latinName}" . "<br>";

?>
