<!DOCTYPE html>
<html>
  <head>
    <title>Trellofy</title>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet'>
    <link rel='stylesheet' href='http://trellofy.nexious.com/assets/css/master.css' />
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
<img src="<?php echo $img; ?>" class="rounded-img" style="opacity; 0;" />
</span>
</center>

    <center>

    <h1>Trellofy</h1>
<?php $this->load->helper('form');echo form_open("main/login_to_board"); ?>
            <dropdown> 
<?php

function generateSelect($name = '', $options = array()) {
    $html = '<center><select name="board_name" size="1">';
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
      <input type="submit" name="submit" value="Go to Board"/>
      <?php echo form_close(); ?>
    </div>
  </body>
</html>


