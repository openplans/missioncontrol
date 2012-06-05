<?php

include 'class.php';

$project = $_POST['project'];
$project_es = sqlite_escape_string($project);

$person_id = $_POST['person_id'];

if (!empty($project)) {

  //add the project to the projects table if it doesn't exist
  $db->exec("INSERT OR IGNORE INTO projects (project) VALUES ('$project_es')");

  // get the project_id 
  // FIXME - there's probably aneasier way to do this
  $get_project_id = $db->query("SELECT project_id FROM projects WHERE project = '$project_es'");
  $row = array(); 
  $i = 0; 
  while($res = $get_project_id->fetchArray()){ 
    if(!isset($res['project_id'])) continue; 
    $row[$i]['project_id'] = $res['project_id']; 
    $project_id = $res['project_id'];
  }

  //add the person & project to the links table
  $db->exec("INSERT INTO links (person_id,project_id)
             SELECT $person_id,$project_id
             WHERE NOT EXISTS (SELECT 1 FROM links WHERE person_id=$person_id AND project_id = $project_id)"
  );


}

?>

<?php include 'projects-list.php'; ?>
<?php include 'team-list.php'; ?>