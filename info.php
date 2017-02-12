<?php include 'header.php'; ?>
	<?php 
	include 'connect.php';

	$sql = "SELECT id, title, release_date, author, genre, image FROM books WHERE id = " . $_GET['id']; 

	$result = $con->query($sql);
	$row = $result->fetch_assoc();
 	?>
	<div class="media">
		<div class="media-left">
			<img src="<?=$row['image']?>"  width="200px" class="media-object">
		</div>
		<div class="media-body">
			<h3 class="media-heading"><?=$row['title']?></h3>
			<p>	
				<ul class="list-group">
					<li class="list-group-item"><b>Autorius:</b> <?=$row['author']?></li>
					<li class="list-group-item"><b>Išleidimo metai:</b> <?=$row['release_date']?></li>
					<li class="list-group-item"><b>Žanras:</b> <?=$row['genre']?></li>
				</ul>
			</p>
		</div>
	</div>
<?php include 'footer.php'; ?>

