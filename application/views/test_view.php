
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
<?php 
echo anchor("authen/get_token", "Retrieve Token");
echo anchor("main/create_boards", "Create Boards");
echo anchor("main/create_organization", "Create Organization"); ?>
</body>
</html>

