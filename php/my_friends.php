 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <style type="text/css">

  #friends_container{
    /*width: 770px;*/
    padding:5px;
    margin-left: -95px;
  }
  .my_profile_image{
      border-radius: 50%;
      cursor : hand;
      margin-top: 20px;
      margin-left: 10px;
  }

  .strong_users{
    font-size: 20px;
    margin-top: 50px;
  }

  #list li{
    list-style: none;
    border-bottom: 1px  black;
    padding : 2px;
    margin-left: 0px;
    margin-bottom: 4px;
    width: 800px;
    height: 120px;
    text-transform: capitalize;
    background-color: lightblue;
  }

 #list li:hover{
    cursor: pointer;
  }

  .unfollow_user{
    margin-left: 550px;
  }

  #view_profile{
    margin-left: 450px;
    text-align: center;
    line-height: 1.9;
    padding: 0px 4px 0px 4px;
    font-family: verdana;
    font-weight: bold;
  }

  #unfollow{
    text-align: center;
    line-height: 1.9;
    font-family: verdana;
    font-weight: bold;
  }

  input{
    width: 100px;
    height: 40px;
    font-family: verdana;
    font-size: 12px;
    font-weight: bold;
    line-height: 1.9;
    padding: 0px;
  }

  .user_details{
    margin-left: 90px;
    transform: translate(0px,-50px);
  }
  </style>
 </head>

 </head>
 <body>
 </body>
 </html>
 <head>
  
 <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "chatdb";

$connection_String = mysqli_connect($host,$user,$pass,$database);

$command_query = "SELECT COUNT(*) AS total FROM users_online";

$execute_command_query = mysqli_query($connection_String,$command_query)or die(mysqli_error($connection_String));

$total_Users_Number = mysqli_fetch_assoc($execute_command_query);

echo "";

//echo "<span id='chat-logo'>"."Chat"."</span></br><hr>";

    echo "<div id='friends_container'>";

    echo "<ul id='list'>";

    $command_query = "SELECT * FROM users_table";

    $execute_command_query = mysqli_query($connection_String,$command_query);

    while($row = mysqli_fetch_assoc($execute_command_query)){

    $user_firstname = $row['user_fname'];
    $user_lastname = $row['user_lname'];
    $user_country = $row['Country'];
    $user_position = $row['position'];
    if($row["Profile_Picture"]==""){
        echo "<li class='friends_list' id='' name='' alt=''>
        <img class='my_profile_image' src='../Profile_Pictures/default.png' height='80' width='80' style='float:left;'/>&nbsp;&nbsp;&nbsp;"."<strong class='strong_users'>".$user_firstname. "&nbsp;&nbsp;".$user_lastname."</strong></br>&nbsp;&nbsp;&nbsp;".$user_country."</br>&nbsp;&nbsp;&nbsp;".$user_position."</br><input type='button' id='view_profile' value='View Profile' class='btn btn-default'>&nbsp;&nbsp;&nbsp;&nbsp;
          <input type='button' id='unfollow' value='Unfollow' class='btn btn-default'>
          </li>";
    }else{
        $username_picture = $row["Profile_Picture"];
        echo "<li class='friends_list' id='' name='' alt=''>
              <img class='my_profile_image' src='../Profile_Pictures/$username_picture' height='80' width='80' style='float:left;'/>&nbsp;&nbsp;&nbsp;"."<strong class='strong_users'>".$user_firstname. "&nbsp;&nbsp;".$user_lastname."
              </strong></br>&nbsp;&nbsp;&nbsp;".$user_country."</br>&nbsp;&nbsp;&nbsp;".$user_position."</br><input type='button' id='view_profile' value='View Profile' class='btn btn-default'>&nbsp;&nbsp;&nbsp;&nbsp;
          <input type='button' id='unfollow' value='Unfollow' class='btn btn-default'>
          </li>";
    }
  }
    echo "</ul>";
    echo "</div>";
  
 ?>

<!--<script type="text/javascript">
$(document).ready(function(){
$(".users").click(function(){
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
</script>-->
