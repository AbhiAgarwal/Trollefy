<!DOCTYPE html>
<html>
  <head>
    <title>Trellofy</title>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet'>
    <link rel='stylesheet' href='assets/css/master.css' />
  <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $(".rounded-img, .rounded-img2").load(function() {
    $(this).wrap(function(){
      return '<span class="' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
    });
    $(this).css("opacity","0");
  });

});
</script>

  </head>
  <body>
<center>
  <?php
$id = $_GET["id"];
$img = $_GET["img"];
?>
<img src="<?php echo $img = $_GET["img"]; ?>" width="500" height="250" class="rounded-img" style="opacity; 0;" />
</span>
</center>


    <h1>Trellofy</h1>

    <center>
            <dropdown> 
<?php
$id = $_GET["id"];
$img = $_GET["img"];

function generateSelect($name = '', $options = array()) {
    $html = '<center><select name="'.$name.'" size="1">';
    foreach ($options as $row) {
    	$test = $row->name;
        $html .= "<center><option value='.$row->name.'>$test</option></center>";
    }
    $html .= '</select>';
    return $html;
}

$html = generateSelect('Groups', $projects);
echo $html;
?>
</dropdown>
<br>
<div class='password'>
<input type="password" class="contentb" name="passwd" id="passwd" value="test" size="30" maxlength="12" style="font-family: courier, sans-serif;">
</div>
</center>
    <div class='container'>


      <button>Login</button>
    </div>
  </body>
</html>


