<?php

	require_once "../includes/header.php";

  // redirecting to back to index if the user was not an adminstrator
  if ($_SESSION['user_role'] == '1'){
    header("location:../index.php");
  }
  //setting the cookie

?>


<main>
  <div class="container py-4">

  <?php
  
  $date = time();

  setcookie("date", "Last accessed: ". date("d-m-Y", $date) ." ", time() + 3600);


  if (isset($_COOKIE['date']) ){
    echo "<p>" . $_COOKIE['date'] ."</p>";
  }
  ?>



  <!-- here we show the list of the user with an option to suspend them -->
    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Users</h2>

          <?php

                      
            $sql ="SELECT * FROM `cb_users`";
                                    
            $result = $db->query($sql);


            if (!$result) {
                die("Error executing query: ($db->errno) $db->error<br>SQL = $sql");
            }

            //okay so that 

            while ($row = $result->fetch_row()){
            echo "<p> User:  "  . $row[1] ." ". $row[2] . " </p>";

            //  giving the user id, as it will be used when we process this
            echo " <p>[ <a href='dashboard.php?suspend=" . $row[0] . "'>Suspend User</a> ]  </p>";

            }
                      
          
          ?>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
      </div>
     
     
     
     <!-- this is the right hand side, show here the reported posts posts with the delete post and clear post option -->
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Reported Posts</h2>

          <?php


                $sql ="SELECT cb_post_content, cb_user_firstname, cb_user_lastname, cb_post_id FROM `cb_posts` JOIN `cb_reported_posts` ON cb_reported_posts.cb_reported_post_id = cb_posts.cb_post_id  JOIN `cb_users` ON  cb_users.cb_user_id = cb_reported_posts.cb_reported_by_user_id";
                        
                $result = $db->query($sql);

                
                if (!$result) {
                    die("Error executing query: ($db->errno) $db->error<br>SQL = $sql");
                }

                //okay so that 
                
               while ($row = $result->fetch_row()){
                 echo "<p> Post" . $row[0] . ". Reported by " . $row[1] ." ". $row[2] . " </p>";

                //  giving the post id, as it will be used when we process this
                 echo " <p>	-- [ <a href='dashboard.php?clear=" . $row[3] . "'> Clear </a> ]  </p>";
                 echo " <p>	-- [ <a href='dashboard.php?delete=" . $row[3] . "'> Delete </a> ]  </p>";

               }

          ?>
          <button class="btn btn-outline-secondary" type="button">Example button</button> 
        </div>
      </div>
    </div>
  </div>
</main>


<!-- Now we implement the functionality of the clear, delete and suspend button, which are mainly sql statments that we need to execute
And we also Need to check if the user is suspended or not, give him access or not and the whole header thing too still needs work -->

<?php

//processing suspending the user

if (isset($_REQUEST['suspend'])){

  $userID = $_REQUEST['suspend'];

  $sql = "UPDATE `cb_users` SET cb_user_suspended = '1' WHERE cb_user_id = '$userID'";

  $result = $db->query($sql);

  //adding suspended variable in session arr to check for it in index
  $_SESSION['suspended'] = true;

}

//processing deleting the tweet

if (isset($_REQUEST['delete'])){

  $postID = $_REQUEST['delete'];

  //Deleting from posts
  $sql = "DELETE FROM `cb_posts` WHERE WHERE cb_post_id= '$postID'";
  $result = $db->query($sql);

  //deleting from reported posts
  $sql2 = "DELETE FROM `cb_reported_posts` WHERE cb_reported_post_id = '$postID'";
  $result = $db->query($sql2);

}

//processing clearing the post

if (isset($_REQUEST['clear'])){

  $postID = $_REQUEST['clear'];

  //resetting the cb post report flag to 0 
  $sql = "UPDATE `cb_posts` SET cb_post_report = '0' WHERE cb_post_id= '$postID'";

  $result = $db->query($sql);

  //set it to clear in the cb_reported posts

  $sql2 = "UPDATE `cb_reported_posts` SET cb_reported_post_status  = 'cleared'  WHERE cb_reported_post_id = '$postID' ";

  $result = $db->query($sql2);

}

?>

<?php
require_once "../includes/footer.php";

?>
