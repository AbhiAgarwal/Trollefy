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
<h1>Trellofy: Register All</h1>
<?php 
$this->load->helper('form');

$org_name = array(
    'name' => 'org_name',
    'id' => 'search',
    'placeholder' => 'ie- HackNY',
    'style' => 'width:550px; float:left; margin-right:10px;');
	
$email = array(
    'name' => 'user_email',
    'id' => 'search',
    'placeholder' => 'ie- HackNY',
    'style' => 'width:550px; float:left; margin-right:10px;');

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Get Board Data',
    'type'  => 'submit'
);

echo form_open('main/register_with_org_boards');
echo form_input($org_name);
echo form_input($email);
echo form_submit($submit_button);
echo form_close();
?>
</body>
</html>