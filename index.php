<?php include 'class.php'; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

  <title>OpenPlans MissionControl</title>

  <meta charset="utf-8">
  <meta name="description" content="OpenPlans MissionControl">
  <meta name="author" content="OpenPlans">

  <!--  Mobile Viewport Fix -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link rel="stylesheet" href="style.css" type="text/css" media="screen, projection" />

  <!-- jquery -->
  <script src="js/jquery-1.7.2.min.js"></script>

</head>
<body>

  <div id="page">

    <header id="branding" role="banner" class="clearfix">
      <hgroup id="logo">
          <h1 id="site-title"><span><a href="#" title="MissionControl" rel="home">MissionControl</a></span></h1>
      </hgroup>

      <nav>
        <ul>
          <li><a href="#" id="projects-bttn">Edit Projects</a></li>
        </ul>
      </nav>

      <form id="add-person" action="add-person.php" method="post">
        <input type="text" name="person" placeholder="New Person&hellip;"/>
        <input type="submit" value="Add" />
      </form>
    </header><!-- #branding -->

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

  </div><!-- #page -->

  <script src="js/scripts.js"></script>

</body>
</html>