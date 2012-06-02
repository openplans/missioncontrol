<div id="team-list">
  <ul id="team">
    <?php

    $result = $db->query("SELECT person FROM team ORDER BY person");
    $row = array(); 
    $i = 0; 

    while($res = $result->fetchArray()){ 

      if(!isset($res['person'])) continue; 

      $row[$i]['person'] = $res['person']; 
      echo '<li class="teammate clearfix">';

      echo '<header class="teammate-info">';
      echo '<h2>' . $res['person'] . '</h2>';
      echo '<span class="timestamp">Updated 05/30/12</span>';
      echo '</header>';

      echo '</li>';

      $i++; 

    }

  ?>
  </ul>
</div>