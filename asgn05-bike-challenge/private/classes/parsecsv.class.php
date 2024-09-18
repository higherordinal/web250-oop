<?php

class ParseCSV {

  // $delimiter is a static property that sets the character used to separate fields in a CSV file.
  // It defaults to a comma (',') but can be modified to handle other delimiters like tabs or semicolons.
  // Its purpose is to allow flexibility in parsing different types of CSV files.
  public static $delimiter = ',';

  private $filename;
  private $header;
  private $data=[];
  private $row_count = 0;

  public function __construct($filename='') {
    if($filename != '') {
      $this->file($filename);
    }
  }

  // The file() method is used to set the filename of the CSV file to be parsed. 
  // It checks if the file exists and is readable, and then assigns the filename to the instance.
  // Its purpose is to validate and store the file path before parsing the file.
  public function file($filename) {
    if(!file_exists($filename)) {
      echo "File does not exist.";
      return false;
    } elseif(!is_readable($filename)) {
      echo "File is not readable.";
      return false;
    }
    $this->filename = $filename;
    return true;
  }

  // The parse() method reads and parses the CSV file, transforming each row into an associative array.
  // It uses fgetcsv() to read the CSV rows, the first row being the header, and subsequent rows are the data.
  // Its purpose is to convert the CSV file into a format that is easier to work with.
  public function parse() {
    if(!isset($this->filename)) {
      echo "File not set.";
      return false;
    }

    // clear any previous results
    $this->reset();

    $file = fopen($this->filename, 'r');
    while(!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if($row == [NULL] || $row === FALSE) { continue; }
      if(!$this->header) {
     	  $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->row_count++;
     	}
    }
    fclose($file);
    return $this->data;
  }

  // The last_results() method returns the parsed data from the most recent call to the parse() method.
  // Its purpose is to provide access to the data that has been parsed without needing to reparse the file.  
  public function last_results() {
    return $this->data;
  }

  // The row_count() method returns the number of rows parsed from the CSV file.
  // Its purpose is to provide a quick count of how many data rows were processed, useful for reporting or validation.
  public function row_count() {
    return $this->row_count;
  }

  // The reset() method clears the header, data, and row count. 
  // It is used internally by the parse() method to ensure that previous results do not interfere 
  // with a new parsing operation. 
  // Its purpose is to reset the parser to a clean state before processing a new file.
  private function reset() {
    $this->header = NULL;
    $this->data = [];
    $this->row_count = 0;
  }

}

?>
