<?php

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
	    <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
		    <form class="js-login">
			    <fieldset class="uk-fieldset">
				    <legend class="uk-legend">Login</legend>
				    <div class="uk-margin">
					    <input class="uk-input" type="email" placeholder="Email" required>
				    </div>
				    <div class="uk-margin">
					    <input class="uk-input" type="password" placeholder="Password" required>
				    </div>
				    <div class="uk-margin">
					    <button class="uk-button uk-button-default" type="submit">Login</button>
				    </div>
			    </fieldset>
		    </form>
	    </div>
    </div>

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.19js/uikit-icons.min.js"></script>
</body>
</html>
