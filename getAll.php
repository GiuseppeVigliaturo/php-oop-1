<?php

  // header('Content-Type: application/json');

  include "configurazione.php";

  $server = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "hotel";

  $conn = new mysqli($server, $username, $password, $dbname);
  if ($conn -> connect_errno) {

    echo json_encode(-1);
    return;
  }

  $sql = "

      SELECT *
      FROM configurazioni

  ";
  $res = $conn -> query($sql);
  if ($res -> num_rows < 1) {

    echo json_encode(-2);
    return;
  }

  $confs = [];
  while($conf = $res -> fetch_assoc()) {

    $myConf = new Configurazione($conf['id'],
                                 $conf['title'],
                                 $conf['description']);
    $confs[] = $myConf;
  }


  foreach ($confs as $value) {
    echo $value. "<br>";
  }
