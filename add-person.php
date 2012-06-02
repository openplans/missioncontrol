<?php

include 'class.php';

$person = $_POST['person'];
$person_es = sqlite_escape_string($person);

if (!empty($person)) {
  $db->exec("INSERT INTO team (person) VALUES ('$person_es')");
}

?>