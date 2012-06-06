<?php

include 'class.php';

$starred = $_POST['starred'];
$project_id = $_POST['project_id'];

if (!empty($project_id)) {
  if ($starred == '1') {
    $db->exec("UPDATE projects SET starred='0' WHERE project_id = '$project_id'");
    
  } else {
    $db->exec("UPDATE projects SET starred='1' WHERE project_id = '$project_id'");
  }
}

?>

<?php include 'team-list.php'; ?>
<?php include 'projects-list.php'; ?>