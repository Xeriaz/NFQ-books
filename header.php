<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Books</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
		.bg-1 { 
		    background-color: #e2e2e2;
		}
	</style>
</head>
<body class="bg-1">
	<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Knygos</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Knygų sąrašas</a></li>
				<li><a href="add_book.php">Knygų pridėjimas</a></li>
			</ul>
			
			<form action="search.php" class="navbar-form navbar-right" method="GET">
		  		<div class="input-group">
					<input type="text" class="form-control" placeholder="Paieška" name="title_search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit" name="search_submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
	  			</div>
			</form>
		</div>
	</nav>	