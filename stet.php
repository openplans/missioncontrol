<?php

include 'class.php';

$person_id = $_POST['person_id'];

if (!empty($person_id)) {

  // update the timestamp
  $db->exec("UPDATE team SET updated=datetime() WHERE person_id=$person_id");

}

?>

<?php include 'team-list.php'; ?>