<?php

class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  private $weightKg = 0.0;
  protected $wheels = 2;

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function wheelDetails() {
    $wheelString = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
    return "It has " . $wheelString . ".";
  }

  public function weightKg() {
    return $this->weightKg . ' kg';
  }

  public function setWeightKg($value) {
    $this->weightKg = floatval($value);
  }

  public function weightLbs() {
    $weightLbs = floatval($this->weightKg) * 2.2046226218;
    return $weightLbs . ' lbs';
  }

  public function setWeightLbs($value) {
    $this->weightKg = floatval($value) / 2.2046226218;
  }

}

class Unicycle extends Bicycle {
  // visibility must match property being overridden
  protected $wheels = 1;

  public function bugTest() {
    return $this->weightKg;
  }
}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';

$uni = new Unicycle;

echo "Bicycle: " . $trek->wheelDetails() . "<br>";
echo "Unicycle: " . $uni->wheelDetails() . "<br>";
echo "<hr>";

echo "Set weight using kg<br>";
$trek->setWeightKg(1);
echo $trek->weightKg() . "<br>";
echo $trek->weightLbs() . "<br>";
echo "<hr>";

echo "Set weight using lbs<br>";
$trek->setWeightLbs(2);
echo $trek->weightKg() . "<br>";
echo $trek->weightLbs() . "<br>";
echo "<hr>";

echo "Set weight for Unicycle<br>";
$uni->setWeightKg(1);
echo $uni->weightKg() . "<br>";
echo $uni->weightLbs() . "<br>";
echo $uni->bugTest() . "<br>";
?>