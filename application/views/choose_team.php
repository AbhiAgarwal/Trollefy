<!DOCTYPE html PUBLIC "-//W3C
DTD XHTML 1.0 TransitionalEN"
"http://www.w3.org/TR/xhtml1/DTD/
xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<title><?=$title?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="style.css"/>

</head>
<body>
<h1>Trellofy</h1>
<?php 
$this->load->helper('form');

$search1 = array(
    'name' => 'org_name',
    'id' => 'search',
    'placeholder' => 'ie- HackNY',
    'style' => 'width:550px; float:left; margin-right:10px;');
	
$search2 = array(
    'name' => 'board_name',
    'id' => 'search',
    'placeholder' => 'ie- HackNY',
    'style' => 'width:550px; float:left; margin-right:10px;');

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Get Board Data',
    'type'  => 'submit'
);

echo form_open('main/get_board_data');
echo form_input($search1);
echo form_input($search2);
echo form_submit($submit_button);
echo form_close();
?>
</body>
</html>
