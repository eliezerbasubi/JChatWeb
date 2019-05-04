<?php
 
include('connect.php');
 
/*if(isset($_POST['view'])){
 
// $con = mysqli_connect("localhost", "root", "", "notif");
 
if($_POST["view"] != '')
 
{
   $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0";
   mysqli_query($con, $update_query);
}
 
$query = "SELECT * FROM all_users_messages ORDER BY ID DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
 
if(mysqli_num_rows($result) > 0)
{
 
while($row = mysqli_fetch_array($result))
 
{
 
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["From"].'</strong><br />
  <small><em>'.$row["Messages"].'</em></small>
  </a>
  </li>
 
  ';
}
}
 
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
 */
$output = "";
$get_messages_own = $_COOKIE["user_first_name"];
$status_query = "SELECT * FROM all_users_messages WHERE Read_Unread=1 AND to_user='$get_messages_own'";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
 
$data = array(
   'notification' => $get_messages_own,
   'unseen_notification'  => $count
);
 if($count==0){
  echo("");//Dispaly none if there's no new messages
 }else{
  echo($count); //Display number of messages
  echo "<script>
      $(document).ready(function(){
        $('#num_messages').load('Notification.php');
      });
    </script>";
 }
//echo json_encode($data);

?>