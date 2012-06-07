<?php

include 'class.php';

$person = $_POST['person'];
$person_es = sqlite_escape_string($person);

$add_person = $_POST['add'];

if ( !empty($person) && $add_person == 'add_person' ) {
  $db->exec("INSERT OR IGNORE INTO team (person) VALUES ('$person_es')");
}

?>

<?php include 'team-list.php'; ?>