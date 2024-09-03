<?php
include 'connection.php';
if (isset($_GET['name'])) {
	$name = urldecode($_GET['name']); 
	// echo "selected Name: " . htmlspecialchars($SName); 
}
else {
    echo "No name parameter provided.";
    exit; // Stop further execution since name is required
}
// echo''. $_GET['name'] .'';
$input = htmlspecialchars($name);
$query = "select * from products where name like '$input%'"; // OR SName like '$input%' OR Age like '$input%' OR Course like '$input%
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
if ($total != 0) { ?>
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					$title = $row["title"];
                    $name = $row["name"];
                    $imgpath = $row["image_path"];
                    $description = $row["description"];
					?>
					<div class="product">
                    
                        <img src="<?php echo $imgpath ?>" alt="">
					<h1><?php echo $name ?></h1>
					<!-- <h2><?php echo $title ?></h2> -->
					<p><?php echo $description ?></p>
                    <button>Buy now</button>
                    </div>
				<?php
				}
				?>
		<?php
} else {
	echo "<li>No Record Found</li>";
}

?>