<?php
include 'header.php';
include 'connect.php';

if (isset($_POST['add_book'])) {
	$stmt = $con->prepare("INSERT INTO books (title, release_date, author, genre, image) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param('sisss', $title, $release_date, $author, $genre, $image);
	$check = true;

	if(empty($_POST['title'])){
		echo '<div class="alert alert-danger"><strong>Klaida!</strong> Įveskite knygos pavadinimą</div>';
		$check = false;
	} else {
		$title = $_POST['title'];
	}

	if (empty($_POST['release_date'])){
		echo '<div class="alert alert-danger"><strong>Klaida!</strong> Įveskite tinkamą datą</div>';
		$check = false;
	} else if ($_POST['release_date'] <= date("Y")){
		$release_date = $_POST['release_date'];
	} else {
		echo '<div class="alert alert-danger"><strong>Klaida!</strong> Netinkamai įvesti leidimo metai</div>';
		$check = false;
	}

	if (empty($_POST['author'])){
		echo '<div class="alert alert-danger"><strong>Klaida!</strong> Įveskite autorių</div>';
		$check = false;
	} else {
		$author = $_POST['author'];
	}

	if (empty($_POST['genre'])){
		echo '<div class="alert alert-danger"><strong>Klaida!</strong> Įveskite žanrą</div>';
		$check = false;
	} else {
		$genre = $_POST['genre'];
	}

	if (empty($_POST['image'])){
		$image = "img/books/no-image.jpg";
	} else {
		$image = "img/books/" . $_POST['image'];
	}

	if($check == true) {
		if ($stmt->execute()) {

			echo '<div class="alert alert-success"><strong>Valio!</strong> Knyga pridėta.</div>';;
		}
	}
	mysqli_close($con);
}
?>

<h3>Knygos pridėjimas</h3>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Pavadinimas</label>
			<div class="col-sm-10">
				<input type="text" name="title" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2">Leidimo metai</label>
			<div class="col-sm-10"> 
				<input type="text" name="release_date" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-sm-2">Autorius</label>
			<div class="col-sm-10"> 
				<input type="text" name="author" class="form-control">
			</div>
		</div>		

		<div class="form-group">
			<label class="control-label col-sm-2">Žanras</label>
			<div class="col-sm-10"> 
				<input type="text" name="genre" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-2">Paveiksliukas</label>
			<div class="col-sm-10"> 
				<label class="btn btn-default btn-file">
				    Pasirinkti
				    <input type="file" name="image" style="display: none;">
				</label>
			</div>
		</div>

		<div class="form-group">        
      		<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="add_book" value="Pridėti" class="btn btn-default">
			</div>
		</div>
	</form>

<?php include 'footer.php'; ?>