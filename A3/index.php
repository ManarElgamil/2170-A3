

<?php

// Starter file for A3 in CSCI 2170

//linking files, because we started the session in header we don't need to start it again
	require_once "includes/header.php";
?>


<main >
  <div class="container py-4">

	<!-- <main class="pg-main-content"> -->
		<!-- Content here -->


		<?php

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    //if the user is not logged in they will be redirected to login page
    header("location:includes/login.php");

	?>

<?php
	
	 }

	 //if the user is not suspended
	else if ($_SESSION['suspended'] == false) {

		

		//Displaying the posts
		$sql ="SELECT * FROM `cb_posts` ";
	  $result = $db->query($sql);


		if (!$result) {
			die("Error executing query: ($db->errno) $db->error<br>SQL = $sql");
	  }
			while ($row = $result->fetch_row()){
					//here is how we display the actual content I think

					//==========================================

					?>

							
					<div class="card">
					<div class="card-body">

					<?php
				
						echo " <p > ". $row[1] . " .  </p> ";
						echo "  <p > Post Likes = ". $row[3] . " .  </p> ";

						echo " <p>	-- [ <a href='index.php?like=" . $row[0] . "'> Like Post </a> ]  </p>";
						

					if ($row[4] == 0){
					//over here we store the post id 
						echo " <p>	-- [ <a href='index.php?report=" . $row[0] . "'> Report Post </a> ]  </p>";
					}

					else {

						echo " <p> This post has been reported for community guideline violations.</p>";
					}

					echo "</div>  </div>";
					echo "<br> <br>";
			}

			//processing if a post is liked

			if (isset($_REQUEST['like'])){

				$sql ="SELECT * FROM `cb_posts` WHERE cb_post_id= '{$_REQUEST['like']}' ";
				$result = $db->query($sql);
				$row =  $result->fetch_row();

				//increasing current number of likes by 1
				$newLikes = $row[3]+1;
				$id = $_REQUEST['like'];

				$sql2 = "UPDATE `cb_posts` SET cb_post_likes = '$newLikes' WHERE cb_post_id= '$id'";
				$result2 = $db->query($sql2);

			}

			//processing if a post is reported
			if (isset($_REQUEST['report'])){

				$postID = $_REQUEST['report'];
				$userID = $_SESSION['userID'];

				$sql = "UPDATE `cb_posts` SET cb_post_report = '1' WHERE cb_post_id= '$postID'";

				$result = $db->query($sql);

				//then we insert this newly reported post into reported table
				$sql2 = "INSERT INTO `cb_reported_posts` VALUES ( '{$postID}', '{$userID}', 'reported' )";
				$result = $db->query($sql2);
			}

	}
	//if the user was suspended
	else {
		echo "<h4> Your account is suspended until further notice. </h4>";
	}

?>

<!-- here we need to display the content -->


	</main>



<?php


require_once "includes/footer.php";

?>
