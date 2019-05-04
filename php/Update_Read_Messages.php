<head>
  <!--<meta http-equiv="refresh" content="30">-->
</head>
<?php 
	include ('connect.php');
	//
	$last_username_clicked_on = $_COOKIE['default_clicked_on_username'];
	$get_messages_own = $_COOKIE["user_first_name"];
	$status_query = "UPDATE all_users_messages SET Read_Unread=0 WHERE to_user='$get_messages_own' AND From_user='$last_username_clicked_on'AND Read_Unread = 1";

$chat_log_query = "SELECT * FROM all_users_messages WHERE Read_Unread = 1 order by ID DESC limit 5";

$executing_chat_log_query = mysqli_query($con,$chat_log_query);

if($executing_chat_log_query){
while($rows = mysqli_fetch_array($executing_chat_log_query))  :
if ($rows['From_user'] == $last_username_clicked_on) {
	$result = mysqli_query($con, $status_query);
	if($result){
		echo"'Message has been read by ".$last_username_clicked_on."'";
	}else{
		echo("This message is not yours");
	}
}else{
	echo "Not from ".$rows['From_user'];
}

endwhile;
}else{
	echo"We don't have such message";
}

 ?>
<script type="text/javascript">
	/*$(document).ready(function () {
		setInterval(function () {
			$(document).load("Update_Read_Messages.php");
		});
	},1000);*/
</script>