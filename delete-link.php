<?php

include 'class.php';

$person_id = $_POST['person_id'];
$project_id = $_POST['project_id'];

if ( !empty($person_id) && !empty($project_id) ) {
  $db->exec("DELETE FROM links WHERE person_id = '$person_id' AND project_id = '$project_id'");
}

?>

<?php include 'team-list.php'; ?>