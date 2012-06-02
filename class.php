<?php 

class MCDB extends SQLite3
{
  function __construct()
  {
      $this->open('db/missioncontrol.db');
  }
}

$db = new MCDB();

?>