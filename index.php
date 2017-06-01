<?php

interface ProgramBase {
  function __construct();
  public function setPlace($place);
  public function setTime($time);
  public function setName($name);
  public function getType();
}

abstract class Program implements ProgramBase {
  public $place, $time, $name;
  protected $type, $label, $note;

  public function setPlace($place) {
    $this->place = $place;
  }

  public function setTime($time) {
    $this->time = $time;
  }

  public function getTime() {
    return $this->time;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function getType() {
    return $this->type;
  }

  public function getLabel() {
    return $this->label;
  }

  public function getNote() {
    return $this->note;
  }

  public function show() {
    echo $this->getLabel() . "\n";
    echo $this->place . ' - ' . $this->time . "\n" . $this->name . "\n";
    echo $this->getType() . "\n";
    if ($note = $this->getNote()) {
      echo '(' . $this->getNote() . ")\n";
    }
    echo "\n";
  }



}

class MusicProgram extends Program {
  public $type, $label;

  function __construct() {
    $this->label = '=== Music program ===';
    $this->type = 'Music program';
  }

}

class FilmProgram extends Program {
  public $type, $label;

  function __construct() {
    $this->label = '=== Film program ===';
    $this->note = 'Not part of the original program, you need to buy separate ticket';
    $this->type = 'Film program';
  }

}



class Table {

  public static $programs;
  public static function Add($program) {
    self::$programs[] = $program;
  }

  public static function ShowProgram() {
    foreach (self::$programs as $program) {
      $program->show();
    }
  }
}

$a = new MusicProgram;
$a->setPlace('Győr');
$a->setName('Aurora');
$a->setTime('20:30');
Table::add($a);

$a = new FilmProgram;
$a->setPlace('Miskolc');
$a->setName('A nagy Lebowski');
$a->setTime('22:30');
Table::add($a);


Table::ShowProgram();
