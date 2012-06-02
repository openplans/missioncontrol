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

    <?php include 'team-list.php'; ?>

  </div><!-- #page -->

  <script type="text/javascript">
    $(document).ready(function(){

      $(".teammate").hover(
        function () {
          $(this).find(".delete").removeClass("hidden");
          $(this).find(".add-project").removeClass("hidden");
        }, 
        function () {
          $(this).find(".delete").addClass("hidden");
          if ( $(this).find("input:focus").length ) {
          } else {
            $(this).find(".add-project").addClass("hidden");
          }
        }
      );

      $("#projects-bttn").click(function() {
        $("#all-projects").slideToggle("fast");
        return false;
      });

      $(".delete").click(function() {
        // we'll need a confirm delete dialog here
        return false;
      });

      /* AJAX FORM SUBMIT */
      $("#add-person").submit(function(e) {

        // stop form from submitting normally
        e.preventDefault(); 

        // get the input values
        var $form = $(this),
            term = $form.find( 'input[name="person"]' ).val(),
            url = $form.attr( 'action' );

        // send the data & pull in the results
        $.post( url, { person: term },
          function( data ) {

              var content = $( data ).find( '#team' );
              $( "#team-list" ).empty().append( content );

              // scroll to and hightlight the new person
              $('html, body').animate({
                scrollTop: $("h2:contains('" + term + "')").offset().top -200
              }, 500);
              $("h2:contains('" + term + "')").parents("li.teammate").css('background-color', "#f9f9f9");
              
          }
        );

        // reset the form
        this.reset();

      });

    });
  </script>

</body>
</html>