<?php
//creo la configurazione
class Configurazione {

  public $id;
  public $title;
  public $description;
 //metodo construct
  function __construct($id, $title = '', $description = '') {

    $this -> id = $id;
    $this -> title = $title;
    $this -> description = $description;
  }

  function deleteMe($conn) {

    $sql = "

      DELETE FROM configurazioni
      WHERE id = ?

    ";

    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param('i', $this -> id);

    return $stmt -> execute();
  }

  public function printMe() {

    echo json_encode($this);
  }
  public function __toString() {

    return "[" . $this -> id . "] "
               . $this -> title . " - "
               . $this -> description;
  }
}
