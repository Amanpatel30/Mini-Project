<?php
include 'connection.php';
if (isset($_POST['input'])) {
	$input = $_POST['input'];
	$query = "SELECT DISTINCT  title FROM products WHERE title LIKE '%$input%'"; // SID like '$input%' OR Age like '$input%' OR Course like '$input%'
	$result = mysqli_query($conn, $query);
	$total = mysqli_num_rows($result);
	// echo $total;
	if ($total != 0) { ?>
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					$name =  $row['title'];
					// $title = $row['title'];
					$encodedName = urlencode($name);
					?>
					<a  href="product-page/product.php?name=<?php echo $encodedName; ?>" ><?php echo $name; ?></a>
					
					<?php
				}
			?>
		<?php
} else {
	echo "<ul>No Record Found</ul>";
}
}
?>