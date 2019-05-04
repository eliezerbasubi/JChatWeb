<head>
  <!--<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php

$selected_Username_Table = $_COOKIE["Selected_Username_Table"];
$reversed_selected_Username_Table = $_COOKIE["Reversed_selected_Username_Table"];

$selected_Username_Uploads_Table = $_COOKIE["selected_Username_Table_uploads"];
$reversed_selected_Username_Uploads_Table = $_COOKIE["reversed_selected_Username_Table_uploads"];


$host = "localhost";
$user = "root";
$pass = "";
$database = "chatdb";

$connection_String = mysqli_connect($host,$user,$pass,$database);
$command_query = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$selected_Username_Table' LIMIT 1";
$execute_command_query = mysqli_query($connection_String,$command_query);
$check_table_existence = mysqli_num_rows($execute_command_query);
if($check_table_existence>0){
  $getting_correct_tablename_orinalname = "true";
}else{
  $getting_correct_tablename_orinalname = "false";
}

$command_query_uploads = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$selected_Username_Uploads_Table' LIMIT 1";

$execute_command_query_uploads = mysqli_query($connection_String,$command_query_uploads);

$check_table_uploads_existence = mysqli_num_rows($execute_command_query_uploads);

if($check_table_uploads_existence>0){

  $getting_correct_uploads_tablename_orinalname = "true";

}else{

  $getting_correct_uploads_tablename_orinalname = "false";
}



$command_query = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$reversed_selected_Username_Table' LIMIT 1";

$execute_command_query = mysqli_query($connection_String,$command_query);

$check_table_existence = mysqli_num_rows($execute_command_query);

if($check_table_existence>0){

  $getting_correct_tablename_reversedname = "true";

}else{
  $getting_correct_tablename_reversedname = "false";
}


$command_query_uploads = "SELECT * FROM information_schema.tables WHERE table_schema = '$database' AND table_name = '$reversed_selected_Username_Uploads_Table' LIMIT 1";

$execute_command_query_uploads = mysqli_query($connection_String,$command_query_uploads);

$check_table_uploads_existence = mysqli_num_rows($execute_command_query_uploads);

if($check_table_uploads_existence>0){

  $getting_correct_uploads_tablename_reversedname = "true";

}else{
  $getting_correct_uploads_tablename_reversedname = "false";
}



if($getting_correct_tablename_orinalname == "true" && $getting_correct_tablename_reversedname=="false"){
  setcookie("correctTable",$selected_Username_Table,time() + (86400 * 30));
}elseif($getting_correct_tablename_orinalname == "false" && $getting_correct_tablename_reversedname=="true"){
  setcookie("correctTable",$reversed_selected_Username_Table,time() + (86400 * 30));
}else{
  return;
}



if($getting_correct_uploads_tablename_orinalname == "true" && $getting_correct_uploads_tablename_reversedname=="false"){
  setcookie("correct_Uploads_Table",$selected_Username_Uploads_Table,time() + (86400 * 30));
}elseif($getting_correct_uploads_tablename_orinalname == "false" && $getting_correct_uploads_tablename_reversedname=="true"){
  setcookie("correct_Uploads_Table",$reversed_selected_Username_Uploads_Table,time() + (86400 * 30));
}else{
  return;
}

$selected_user_uploads_table = $_COOKIE["correct_Uploads_Table"];
$selected_user_table = $_COOKIE["correctTable"];
$get_messages_own = $_COOKIE["user_first_name"];

$sql="SELECT * FROM all_users_messages WHERE Read_Unread = '1' AND to_user ='$get_messages_own'";

      if ($result=mysqli_query($connection_String,$sql))
        {

        // Return the number of rows in result set

        $rowcount=mysqli_num_rows($result);
        echo("<div class='alert alert-info alert-dismissable fade in'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          You have <strong>".$rowcount."</strong> unread message(s).
        </div>");
        // Free result set
        mysqli_free_result($result);
        }else{
          echo "<script>alert('You dont have any messages')</script>";
        }

      mysqli_close($connection_String);
//echo ($_COOKIE["user_first_name"]);
?>
