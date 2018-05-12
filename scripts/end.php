<!DOCTYPE html>
<html lang="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro" rel="stylesheet">
	<meta charset="utf-8" />
</head>
<script type="text/javascript">
	window.onload = function espera() {
		setTimeout(volta, 1);
	}

	function volta() {
		window.history.go(-1);
	}

</script>

<body>
	<?php
         include "connect.php";
         session_start();
         $_SESSION = array();
         session_destroy();
         pg_close($conecta);
     ?>
</body>

</html>
