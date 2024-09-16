<?php

class Bird {

  public $commonName;
  public $latinName;

  public function __construct($commonName, $latinName) {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }

}

$birdOne = new Bird('Acadian Flycatcher','Empidonax virescens');
echo 'Common name: ' . $birdOne->commonName . '<br>';
echo 'Latin name: ' . $birdOne->latinName . '<br>';
echo '<hr>';

$birdTwo = new Bird('Carolina Wren', 'Thyrothorus ludovicianus');
echo 'Common name: ' . $birdTwo->commonName . '<br>';
echo 'Latin name: ' . $birdTwo->latinName . '<br>';
echo '<br>';

?>
