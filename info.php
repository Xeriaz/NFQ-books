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
			<h3 class="media-heading"><?=strip_tags($row['title'])?></h3>
			<p>	
				<ul class="list-group">
					<li class="list-group-item"><b>Autorius:</b> <?=strip_tags($row['author'])?></li>
					<li class="list-group-item"><b>Išleidimo metai:</b> <?=strip_tags($row['release_date'])?></li>
					<li class="list-group-item"><b>Žanras:</b> <?=strip_tags($row['genre'])?></li>
				</ul>
			</p>
		</div>
	</div>
<?php include 'footer.php'; ?>

