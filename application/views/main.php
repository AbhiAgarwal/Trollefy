<!DOCTYPE html PUBLIC "-//W3C
DTD XHTML 1.0 TransitionalEN"
"http://www.w3.org/TR/xhtml1/DTD/
xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <link rel='stylesheet' href='http://trellofy.nexious.com/assets/css/master.css' />
    	<title><?=$title?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>

</head>
<body>
<h1>Trellofy</h1>
<?php 
$this->load->helper('form');

$search = array(
    'name' => 'org_name',
    'id' => 'search',
    'placeholder' => 'ie- HackNY',
    'style' => 'width:550px; float:left; margin-right:10px;');

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Create Organization',
    'type'  => 'submit'
);

echo form_open('main/create_organization');
echo form_input($search);
echo form_submit($submit_button);
echo form_close();
echo anchor("authen/get_token", "Gain Access");
echo anchor("main/enter_team", "Go to team");
echo anchor("main/register_all_page", "Register");
?>
</body>
</html>

