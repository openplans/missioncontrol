<div id="team-list">
  <ul id="team">
    <?php

    $result = $db->query("SELECT person_id, person FROM team ORDER BY person");
    $row = array(); 
    $i = 0; 

    while($res = $result->fetchArray()){ 

      if(!isset($res['person'])) continue; 

      $row[$i]['person'] = $res['person']; 
      ?>
      <li class="teammate clearfix" id="person-<?php echo $res['person_id']; ?>">
        <header class="teammate-info">
          <h2><span><?php echo $res['person']; ?></span><?php
            $the_person_id = $res['person_id'];
            $the_person_rows = $db->query("SELECT count(*) FROM links WHERE person_id = '$the_person_id'");
            $the_person_row = $the_person_rows->fetchArray();
            $numRows = $the_person_row['count(*)'];
            if ( $numRows == "0" ) {
          ?><form class="delete-person" action="delete-person.php" method="post">
              <input type="hidden" name="project_count" value="<?php echo $numRows; ?>" />
              <input type="hidden" name="person_id" value="<?php echo $the_person_id; ?>" />
              <input type="submit" class="delete" value="&times;" />
            </form><?php 
            }
          ?></h2>
          <span class="timestamp">Updated 05/30/12</span>
        </header>
        <ul class="projects">
          
          <?php 

          $person_id = $res['person_id'];

          $project_result = $db->query("SELECT *
            FROM projects
            INNER JOIN links ON projects.project_id = links.project_id
            WHERE (person_id = '$person_id')");

          $project_row = array(); 
          $project_i = 0; 

          while($project_res = $project_result->fetchArray()){ 

            if(!isset($project_res['project'])) continue; 

            $project_row[$i]['project'] = $project_res['project']; 

            ?><li class="project id-<?php echo $project_res['project_id']; ?>">
                <?php echo $project_res['project']; ?> 
                <form class="delete-link" action="delete-link.php" method="post">
                  <input type="hidden" name="person_id" value="<?php echo $res['person_id']; ?>" />
                  <input type="hidden" name="project_id" value="<?php echo $project_res['project_id']; ?>" />
                  <input type="submit" class="delete" value="&times;" />
                </form>
              </li><?php 
            $i++; 

          }

          ?>
          <li class="add-project hidden">
            <form class="add-project" action="add-project.php" method="post">
              <input type="hidden" name="person_id" value="<?php echo $res['person_id']; ?>" />
              <input type="text" name="project" placeholder="New Project&hellip;"/>
            </form>
          </li>
        </ul>
      </li><?php 

      $i++; 

    }

  ?>
  </ul>
</div>