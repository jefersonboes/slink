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
</head>
<body>
	<div class="container">
		<?php echo form_open('generate/process');?>

			<fieldset>
				<label for="link">Link</label>
				<input class="edit" name="link"></input>
				<input class="button" type="submit" value="Generate"/>
			</fieldset>
		</form>

		<?php if (isset($link)) {?><a href=<?php echo $link . ">"; echo $link; }?></a>
	</div>
</body>
</html>