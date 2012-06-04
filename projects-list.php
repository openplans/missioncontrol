<div id="projects">
<ul id="all-projects" class="clearfix hidden">
    <?php

    $result = $db->query("SELECT * FROM projects ORDER BY project");
    $row = array(); 
    $i = 0; 

    while($res = $result->fetchArray()){ 

      if(!isset($res['project'])) continue; 

      $row[$i]['project'] = $res['project']; 

      ?><li class="project id-<?php echo $res['project_id']; ?>"><a href="#" class="star">&#10029;</a> <?php echo $res['project']; ?> <span class="team-count">(#)</span> <a href="#" class="delete">&times;</a></li>

      <?php

      $i++; 

    }

  ?>
</ul>
</div>