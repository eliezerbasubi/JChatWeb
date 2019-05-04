<head>
  <style type="text/css">
    ul .user_lists{
    list-style: none;
    border-bottom: 2px solid black;
    padding : 8px;
    margin-top: 0px;
    margin-left: 0px;
    text-transform: capitalize;
    width: 260px;
  }

  ul li:hover{
    cursor: pointer;
    background-color: gray;
  }

  .messages_lists{
    font-style: italic;
  }
  </style>
</head>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "chatdb";

$connection_String = mysqli_connect($host,$user,$pass,$database);

$command_query = "SELECT COUNT(*) AS total FROM users_online";

$execute_command_query = mysqli_query($connection_String,$command_query)or die(mysqli_error($connection_String));

$total_Users_Number = mysqli_fetch_assoc($execute_command_query);



echo "</br>";
echo "<div>";
echo "<ul>";
$selected_user_uploads_table = $_COOKIE["correct_Uploads_Table"];
$selected_user_table = $_COOKIE["correctTable"];
$get_sender_name = $_COOKIE["user_first_name"];

$chat_log_query = "SELECT primary_table.ID, primary_table.From_user,primary_table.Messages,primary_table.to_user,primary_table.Read_Unread FROM `all_users_messages` primary_table, (SELECT MAX(ID) as pId FROM `all_users_messages` Group by From_user) second_table where primary_table.ID = second_table.pId ";
$executing_chat_log_query = mysqli_query($connection_String,$chat_log_query);
$userID = 0;


$message_log_query = "SELECT * FROM all_users_messages WHERE Read_Unread = 1 ORDER BY ID DESC LIMIT 5";
$execute_num_unread = mysqli_query($connection_String,$message_log_query);

if ($execute_num_unread) {
while($rows = mysqli_fetch_array($executing_chat_log_query))  :

  if($rows["to_user"]==$_COOKIE["user_first_name"]){
    if ($rows["Read_Unread"] == 1) {
     echo "<li class='users user_lists' id='$userID'><div><span class='original_receiver'><div><b>".$rows["From_user"]." :</b></br></div></span>
    <span class='messages_lists'><b>".$rows["Messages"]."</b></span></div></li>";
    }else{
  echo "<li class='users user_lists' id='$userID'><div><span class='original_receiver'><div><b>".$rows["From_user"]." :</b></br></div></span>
    <span class='messages_lists'>".$rows["Messages"]."</span></div></li>";
  }
}

endwhile;
}
echo "</ul>";
echo "</div>";
?>
<script type="text/javascript">
  $(document).ready(function(){
$(".user_lists").click(function(){
var idvalue = $(this).attr('id');
var userclicked = $(this).attr('name');
var lastname = $(this).attr('alt');
  $(function(){
    $.ajax({
      type: "POST",
      url: 'Chat_Tables_Creator.php',
      data: ({userID:idvalue,
              username:userclicked,
               userslast_name:lastname}),
      success: function(data) {
      
      }
    });
  });
  document.getElementById('messages').style.display = "block";
  document.getElementById('active_friends').style.display = "none";
  document.getElementById('defaultOpen').style.backgroundColor ="skyblue";
  document.getElementById('active_users_id').style.backgroundColor ="#2e353d";
});
});
</script>