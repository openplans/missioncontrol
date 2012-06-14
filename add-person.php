<?php

include 'class.php';

$person = $_POST['person'];
$person_es = sqlite_escape_string($person);

$add_person = $_POST['add'];

if ( !empty($person) && $add_person == 'add_person' ) {
  $db->exec("INSERT OR IGNORE INTO team (person) VALUES ('$person_es')");
}

// get the new person_id
// FIXME - there's probably an easier way to do this
$get_person_id = $db->query("SELECT person_id FROM team WHERE person = '$person_es'");
$row = array(); 
$i = 0; 
while($res = $get_person_id->fetchArray()){ 
  if(!isset($res['person_id'])) continue; 
  $row[$i]['person_id'] = $res['person_id']; 
  $person_id = $res['person_id'];
}

// update the timestamp
$db->exec("UPDATE team SET updated=datetime() WHERE person_id=$person_id");

?>

<?php include 'team-list.php'; ?>