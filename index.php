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
        <input type="text" name="person" placeholder="Add/Find Person&hellip;"/>
      </form>
    </header><!-- #branding -->

    <?php include 'projects-list.php'; ?>

    <?php include 'team-list.php'; ?>

  </div><!-- #page -->

  <script type="text/javascript">
    $(document).ready(function(){

      // show all projects 
      $("#projects-bttn").click(function() {
        $("#all-projects").slideToggle("fast");
        return false;
      });


      // show form & delete bttns on hover of teammates
      $(".teammate").live("mouseenter", 
        function() {
          $(this).find(".delete").removeClass("hidden");
          $(this).find(".add-project").removeClass("hidden");
        }).live("mouseleave", 
        function() {
          $(this).find(".delete").addClass("hidden");
          if ( $(this).find("input:focus").length ) {
          } else {
            $(this).find(".add-project").addClass("hidden");
          }
        }
      );


      $(".delete").click(function() {
        // XXX FIXME - we'll need a confirm delete dialog here
        return false;
      });


      /* AJAX FORM SUBMIT: Person */
      $("#add-person").submit(function(e) {
        // stop form from submitting normally
        e.preventDefault(); 
        // get the input values
        var $form = $(this),
            person_term = $form.find( 'input[name="person"]' ).val(),
            url = $form.attr( 'action' );
        // send the data & pull in the results
        $.post( url, { person: person_term },
          function( data ) {
              var content = $( data ).find( '#team' );
              $( "#team-list" ).empty().append( content );
              // scroll to the new person
              $('html, body').animate({
                scrollTop: $("h2:contains('" + person_term + "')").offset().top -200
              }, 500);
              // hightlight the new person
              // XXX FIXME - make this use the unique person_id to avoid matching multiples
              $("h2:contains('" + person_term + "')").parents("li.teammate").css('background-color', "#f9f9f9");    
          }
        );
        // reset the form
        this.reset();
      });


      /* AJAX FORM SUBMIT: Project */
      $( ".add-project" ).live("submit",
        function(e){
          // stop form from submitting normally
          e.preventDefault(); 
          // get the input values
          var $form = $(this),
              project_term = $form.find( 'input[name="project"]' ).val(),
              person_id = $form.find( 'input[name="person_id"]' ).val(),
              url = $form.attr( 'action' );
          // send the data & pull in the results
          $.post( url, { project: project_term, person_id: person_id },
            function( data ) {
                var team_content = $( data ).find( '#team' );
                $( "#team-list" ).empty().append( team_content );

                var projects_content = $( data ).find( '#all-projects' );
                $( "#projects" ).empty().append( projects_content );
            }
          );
        }
      );


    });
  </script>

</body>
</html>