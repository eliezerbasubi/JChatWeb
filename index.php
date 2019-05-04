<!DOCTYPE html>
<?php

session_start();

$_SESSION["err"] = "";
if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "chatdb";

    $connection_String = mysqli_connect($host, $user, $pass, $database);

    $username = mysqli_real_escape_string($connection_String, $username);
    $password = mysqli_real_escape_string($connection_String, $password);


    $get_current_user_details = "SELECT * FROM users_table WHERE user_fname = '$username' AND Password = '$password' LIMIT 1";
    $execute_user_details_command = mysqli_query($connection_String, $get_current_user_details);
    $get_additional_info = mysqli_fetch_assoc($execute_user_details_command);

    $users_last_name = $get_additional_info["user_lname"];
    $users_department = $get_additional_info["Country"];
    $users_position = $get_additional_info["position"];


    $command_query = "SELECT * FROM users_table WHERE user_fname = '$username' AND Password = '$password' AND user_lname = '$users_last_name'";

    $execute_command_query = mysqli_query($connection_String, $command_query);

    $user_validity = mysqli_num_rows($execute_command_query);

    if ($user_validity > 0) {

        $checking_online_status = "SELECT * FROM users_online WHERE first_name='$username' AND last_name = '$users_last_name'";

        $execute_checking_online_status = mysqli_query($connection_String, $checking_online_status);

        $online_status_validity = mysqli_num_rows($execute_checking_online_status);

        if ($online_status_validity > 0) {

            setcookie("user_first_name", $username, time() + (86400 * 30));
            setcookie("users_last_name", $users_last_name, time() + (86400 * 30));
            setcookie("user_department", $users_department, time() + (86400 * 30));
            setcookie("user_position", $users_position, time() + (86400 * 30));

            setcookie("default_clicked_on_username", "Welcome", time() + (86400 * 30));

            setcookie("clicked_on_user_last_name", $users_last_name, time() + (86400 * 30));

            setcookie("Selected_Username_Table", "dummy_text", time() + (86400 * 30));
            setcookie("Reversed_selected_Username_Table", "dummy_text", time() + (86400 * 30));

            setcookie("selected_Username_Table_uploads", "dummy_text", time() + (86400 * 30));
            setcookie("reversed_selected_Username_Table_uploads", "dummy_text", time() + (86400 *
                30));

            $update_status_command =
                "UPDATE `users_online` SET status = 'online',`Time`=CURRENT_TIMESTAMP WHERE first_name ='$username' AND last_name = '$users_last_name'";
            $execute_status_command = mysqli_query($connection_String, $update_status_command);


            header("Location:./php/home.php");

        } else {

            $insert_command = "INSERT INTO `users_online` (`ID`, `first_name`,`last_name`, `Time`,`status`) VALUES (NULL, '$username','$users_last_name', CURRENT_TIMESTAMP,'online')";

            $execute_insert_command = mysqli_query($connection_String, $insert_command);

            $UserID = mysqli_insert_id($connection_String);

            mysqli_close($connection_String);

            setcookie("user_first_name", $username, time() + (86400 * 30));
            setcookie("users_last_name", $users_last_name, time() + (86400 * 30));
            setcookie("user_department", $users_department, time() + (86400 * 30));
            setcookie("user_position", $users_position, time() + (86400 * 30));

            setcookie("default_clicked_on_username", "Welcome", time() + (86400 * 30));

            setcookie("clicked_on_user_last_name", $users_last_name, time() + (86400 * 30));

            setcookie("Selected_Username_Table", "dummy_text", time() + (86400 * 30));
            setcookie("Reversed_selected_Username_Table", "dummy_text", time() + (86400 * 30));

            setcookie("selected_Username_Table_uploads", "dummy_text", time() + (86400 * 30));
            setcookie("reversed_selected_Username_Table_uploads", "dummy_text", time() + (86400 *
                30));

            header("Location:./php/home.php");
        }

    } else {
        $_SESSION["err"] = "Wrong Username or Password";
    }
    ;
} else {

}
;

?>
<html>
<head>
  <meta charset="UTF-8">
	<title>JChat App</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-image: url(img/background.png);
			background-repeat: no-repeat;
			background-attachment: cover;
			background-color: skyblue;
			background-position: absolute;
			left: 50%;
		}

		h3{
			font-family: golden age;
			font-size: 30px;
		}

		#content{
			position: absolute;
			top: 15%;
			left: 60%;
			width: 420px;
			height: 400px;
			padding: 40px;
			text-align: center;
			background-color: rgba(255, 255,255, 0.5);
			border-radius: 10px;
		}

		input[type="text"],input[type="password"]{
			width: 310px;
			height: 45px;
		}

		input[type="submit"]{
			width: 100px;
			font-size: 20px;
		}

		a{
			text-decoration: underline;
			font-size: 18px;
		}
	</style>
</head>
<body>
	<div id="content" class="form-group">
	<form  method="post">
		<h3>Welcome to JChat</h3></br>
		<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="username" type="text" class="form-control" name="username" placeholder="Username" id="inputdefault">
  </div></br>

<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password" id="inputdefault">
  </div><br/>
<input type="checkbox" id="option3">
    <label for="option3">Remember me</label>
  	<br/><br/>
		<input type="submit" name="submit" class="btn btn-info" value="LOGIN">
	</form>
	<br/>
		<a href="php/signup.php">Sign Up</a>
	</div>
</body>
</html>