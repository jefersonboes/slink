<!--
Author: Jeferson Ricardo Böes
Email: jefersonboes@gmail.com
Date: 05/2013
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Generate link</title>

	<style type="text/css">
		.container  { padding: 200px 0; max-width: 400px; margin: 0 auto; }

		.edit { width: 250px; }

		.button {
			border-radius: 6px;
			height: 30px;
			font-family: Arial,sans-serif;

			color: #fff;
			text-shadow: 0 -1px 1px rgba(0,0,0,.25);
			background-color: #019ad2;
			background-repeat: repeat-x;
			background-image: linear-gradient(#33bcef,#019ad2);
			border-color: #057ed0;
			box-shadow: inset 0 1px 0 rgba(255,255,255,.1);
		}

		.button:hover {
			color: #fff;
			background-color: #0271bf;
			background-repeat: repeat-x;
			background-image: linear-gradient(#2daddc,#0271bf);
			border-color: #096eb3;
		}


		.button.active {
			background-image: none;
			border-color: #096EB3;
		}

	</style>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

	<script type="text/javascript">
		function generate() {

			$.ajax({
				type: 'post',
				data: {'link':$('#link').attr('value')},
  				url: 'generate/process',
  				success: function(data) {
      				$('#alink').html(data);
      				$('#alink').attr("href", data);
  				},
  				error: function(data) {
  					alert("error: " + data);
  				}
			});

		}
	</script>
</head>
<body>
	<div class="container">
		<fieldset>
			<label for="link">Link</label>
			<input class="edit" id="link" name="link"></input>
			<button class="button" onClick="generate()">Generate</button>

			<a id="alink" href=""></a>
		</fieldset>		
	</div>
</body>
</html>
