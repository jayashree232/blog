<?php
if(isset($_POST['post_liked']))
{
  $host ="localhost";
$username ="root";
$password ="";
$databasename ="likeanddislike";
$Connect =  mysqli_connect($host,$username,$password);
  mysqli_select_db($Connect,$databasename);
mysqli_query($Connect,"update rating_system set total_no_of_votes=total_no_of_votes+1,vote_likes=vote_likes+1");
  $select = mysqli_query($Connect,"SELECT * FROM rating_system");
  while($row=mysqli_fetch_array($select,1))
  {
 $total_no_votes=$row['total_no_of_votes'];
 $liked=$row['vote_likes'];
 $disliked=$row['vote_dislike'];
echo "<p id='total_rating'>Total Ratings ( ".$total_no_votes." )</p>";
    echo "<p id='total_like'><img src='like.png'; width='20px'; 
height='20px'>".$liked."</p><div id='like_bar'></div>";
    echo "<p id='total_dislike'><img src='dislike.png'; width='20px';height='20px;'>".$disliked." </p><div id='dislike_bar'></div>";
    exit();
  }
}
if(isset($_POST['post_dislike']))
{
  $host = "localhost";
  $username = "root";
  $password = "";
  $databasename = "likeanddislike";
$connect=mysqli_connect($host,$username,$password);
  mysqli_select_db($connect,$databasename);
 mysqli_query($connect,"update rating_system set total_no_of_votes=total_no_of_votes+1,vote_dislike=vote_dislike+1");
  $select = mysqli_query($connect,"SELECT * FROM rating_system");
  while($row=mysqli_fetch_array($select,1))
  {
   $total_no_votes=$row['total_no_of_votes'];
 $liked=$row['vote_likes'];
 $disliked=$row['vote_dislike'];

    echo "<p id='total_rating'>Total Ratings ( ".$total_no_votes." )</p>";
    echo "<p id='total_like'><img src='like.png'; width='20px';height='20px;'>".$liked."</p><div id='like_bar'></div>";
	echo "<p id='total_dislike'><img src='dislike.png'; width='20px';height='20px;'>".$disliked." </p><div id='dislike_bar'></div>";
    exit();
  }
}
?>
	