<?php 
include 'connect.php'; 
include 'header.php';
?>
	

	<h3>Knygų sąrašas:</h3>

	<?php 
	const PER_PAGE = 10;

	$sql = "SELECT COUNT(*) FROM books";
	$i = 1;
	$result = mysqli_query($con, $sql);
	$row = $result->fetch_row();
	$book_total = $row[0];
	

	$page_total = ceil($book_total / PER_PAGE);
	$page = 1;

	if (isset($_GET['page'])) {
		$page = (int) $_GET['page'];
		$page = $page < 1 ? 1 : $page > $page_total ? $page_total : $page;
	}
	$from = ($page - 1) * PER_PAGE;	

	$sql = "SELECT id, title, author FROM books ORDER BY title ASC LIMIT $from, " . PER_PAGE;
	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
		echo '<ul class=list-group>';
		while ($row = $result->fetch_assoc()) {
			$j = $from + $i;
			echo '<li class="list-group-item">';
			echo $j . ". " . "<a href='info.php?id=".$row['id']."'>" . $row['title'] . " – " .$row['author'] . "</a> </li>";
			$i++;
		}
		echo '</ul>';
		echo '<ul class="pagination">';
		for ($i = 1; $i <= $page_total; $i++) {
			if ($i === $page){
				echo '<li class="active"><a href="?page=' . $i . '">'. $i . '</a></li>';
			} else {
				echo '<li><a href="?page=' . $i . '">'. $i . '</a></li>';
			}
		}
		echo "</ul>";
	} else {
		echo '<div class="alert alert-danger"><strong>Klaida!</strong> Rezultatų nėra.</div>';
	}
	?>

<?php include 'footer.php'; ?>