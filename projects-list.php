<div id="projects">
<ul id="all-projects" class="clearfix hidden">
    <?php

    $result = $db->query("SELECT * FROM projects ORDER BY project");
    $row = array(); 
    $i = 0; 

    while($res = $result->fetchArray()){ 

      if(!isset($res['project'])) continue; 

      $row[$i]['project'] = $res['project']; 

      ?><li class="project id-<?php echo $res['project_id']; ?>">
          <a href="#" class="star">&#10029;</a> 
          <?php echo $res['project']; ?> 
          <?php
          $the_project_id = $res['project_id'];
          $rows = $db->query("SELECT count(*) FROM links WHERE project_id = '$the_project_id'");
          $row = $rows->fetchArray();
          $numRows = $row['count(*)'];
          if ( $numRows != "0" ) {
            echo '<span class="team-count">(' . $numRows . ')</span>';
          } else { ?>
          <form class="delete-project" action="delete-project.php" method="post">
            <input type="hidden" name="person_count" value="<?php echo $numRows; ?>" />
            <input type="hidden" name="project_id" value="<?php echo $the_project_id; ?>" />
            <input type="submit" class="delete" value="&times;" />
          </form>
          <?php } ?>
        </li>

      <?php

      $i++; 

    }

  ?>
</ul>
</div>