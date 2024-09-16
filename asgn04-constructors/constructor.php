<?php

class Bird {

  public $commonName;
  public $latinName;

  public function __construct($commonName, $latinName) {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }

}

$birdOne = new Bird('American Robin','Turdus migratorius');
echo 'Common name: ' . $birdOne->commonName . '<br>';
echo 'Latin name: ' . $birdOne->latinName . '<br>';
echo '<hr>';

$birdTwo = new Bird('Eastern Towhee', 'Pipilo erythrophthalmus');
echo 'Common name: ' . $birdTwo->commonName . '<br>';
echo 'Latin name: ' . $birdTwo->latinName . '<br>';
echo '<br>';

?>
