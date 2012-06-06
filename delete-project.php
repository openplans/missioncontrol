<?php

include 'class.php';

$person_count = $_POST['person_count'];
$project_id = $_POST['project_id'];

if (!empty($project_id)) {
  $db->exec("DELETE FROM projects WHERE project_id = '$project_id'");
}

?>

<?php include 'team-list.php'; ?>
<?php include 'projects-list.php'; ?>