<?php

include 'class.php';

$project_count = $_POST['project_count'];
$person_id = $_POST['person_id'];

if (!empty($person_id)) {
  $db->exec("DELETE FROM team WHERE person_id = '$person_id'");
}

?>

<?php include 'team-list.php'; ?>
<?php include 'projects-list.php'; ?>