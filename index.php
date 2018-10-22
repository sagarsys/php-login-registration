<?php
// allow the config
define('__CONFIG__', true);
// require the config
require_once 'inc/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page Title</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="follow">

    <base href="/" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/css/uikit.min.css" />
</head>
<body>
    <div class="uk-section uk-container">
	    <?="<p>Hello world. Today is " . date('dS M Y') . ".</p>"; ?>
	    <p>
		    <a href="php-login-registration/login.php">Login</a>
		    <span> | </span>
		    <a href="php-login-registration/register.php">Register</a>
	    </p>
    </div>
	<?php require_once 'inc/footer.php'; ?>
</body>
</html>
