<?php
include 'header.php';
include 'connect.php';

const PER_PAGE = 10;

if(isset($_GET['title_search'])) {
	if(empty($_GET['title_search'])) {
		echo "Įveskite ieškomos knygos pavadinimą.";
	}
	else {
		$search = $_GET['title_search'];
		$sql = "SELECT COUNT(*) FROM books WHERE title LIKE '%$search%'";
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

		$sql = "SELECT id, title, author FROM books WHERE title LIKE '%$search%' ORDER BY title ASC LIMIT $from, " . PER_PAGE;
		$result = mysqli_query($con, $sql);

		if($result === false)
		{
			echo '<div class="alert alert-danger"><strong>Klaida!</strong> Kažkas nepavyko.</div>';
		}
		if ($result->num_rows > 0) {
			echo "<h3>Paieška</h3>";
			echo "Ieškoma fraze: " . $_GET['title_search'] . " <small>(Rasta rezultatų: $book_total)</small>";
			echo '<ul class=list-group>';
			while ($row = $result->fetch_assoc()) {
				echo '<li class="list-group-item">';
				$j = $page * PER_PAGE - PER_PAGE + $i;
				echo $j . ". ";
				echo "<a href='info.php?id=".$row['id']."'>" . strip_tags($row['title']) . " — " . strip_tags($row['author']) . "</a> </li>" ;
				$i++;
			}
			echo "</ul>";
			echo '<ul class="pagination">';
			for ($i = 1; $i <= $page_total; $i++) {
				if ($i === $page){
					echo '<li class="active"><a href="?title_search=' . $search . '&page=' . $i . '">'. $i . '</a></li>';
				} else {
					echo '<li><a href="?title_search=' . $search . '&page=' . $i . '">'. $i . '</a></li>';
				}
			}
			echo "</ul>";
	
		} else {
			echo '<div class="alert alert-danger"><strong>Klaida!</strong> Rezultatų nėra.</div>';
		}
	}
} 

include 'footer.php';