<?php

class Bird extends DatabaseObject
{

  static protected $table_name = 'birds';
  static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

  public $id;
  public $common_name;
  public $habitat;
  public $food;
  public $conservation_id;
  public $backyard_tips;

  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct',
  ];

  public static function getConservationOptions() {
    return self::CONSERVATION_OPTIONS;
  }

  public function __construct($args = [])
  {
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? '';
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }

  public function name() {
    return "{$this->common_name}";
  }


  public function conservation()
  {
    if ($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown";
    }
  }


  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->common_name)) {
      $this->errors[] = "Bird name cannot be blank.";
    }

    if (is_blank($this->habitat)) {
      $this->errors[] = "Bird habitat cannot be blank.";
    }

    return $this->errors;
  }
}