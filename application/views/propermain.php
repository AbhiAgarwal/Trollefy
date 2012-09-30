<!DOCTYPE html>
<html>
  <head>
    <title>Trellofy</title>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet'>
    <link rel='stylesheet' href='http://trellofy.nexious.com/assets/css/master.css' />
  <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
  </head>
  <body>
      <h1>Trellofy</h1>
 <center>

<br>
<?php

$url = "http://hackerleague.org/api/v1/hackathons.json";
$haha = file_get_contents($url);
$decoded = json_decode($haha);
$start = 0;
$limit = 15;

foreach($decoded as $key=>$value){
  $url = "get_all_boards/$value->id/";
  //echo "<a href=\"search.php?id=$value->id&img=$value->logo\"><img src=\"$value->logo\" name=\"$key=>id\" onerror=\"this.style.display='none'\" width=\"200\" height=\"100\" class=\"rounded-img\" style=\"opacity\" /></a>";
echo "<a href=\"$url\"><img src=\"$value->logo\" name=\"$key=>id\" onerror=\"this.style.display='none'\" width=\"200\" height=\"100\" class=\"rounded-img\" style=\"opacity\" /></a>";
$start++;
if($start == $limit)
break;
echo "</br>";
}
?>
</center>
    <div class='container'>
    </div>
  </body>
</html>


