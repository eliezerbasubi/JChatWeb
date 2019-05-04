<?php date_default_timezone_set('Africa/Nairobi'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title>JChat</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="lib/css/emoji.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	 <script src="../js/bootstrap.min.js"></script>
	 <script src="../js/jquery.yacal.min.js"></script>

	<!-- Link to my stylesheet -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	


	<script type="text/javascript">
		function openCity(cityName, elmnt, color) {
	    // Hide all elements with class="tabcontent" by default */
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }

	    // Remove the background color of all tablinks/buttons
	    tablinks = document.getElementsByClassName("tablink");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].style.backgroundColor = "";
	    }

	    // Show the specific tab content
	    document.getElementById(cityName).style.display = "block";

	    // Add the specific color to the button used to open the tab content
	    elmnt.style.backgroundColor = color;
	}

	// Get the element with id="defaultOpen" and click on it
	//document.getElementById("defaultOpen").click();
	document.getElementById("cityName").openNode.ClassName = "selected";


	function loadColor() {
		document.getElementById('defaultOpen').style.backgroundColor = "skyblue";
	}

	function show_menu() {
		alert("work");
	}

	</script>

	<!-- Script for user logout-->
	<script type="text/javascript">
	  function Logout(){
	    $.get("Logout.php");
	}
 	</script>


 	<!-- JQuery to load profile picture -->
 	<script type="text/javascript">

		 $(document).ready(function(){

		  $("#profile_picture").load("Fetch_Profile_Picture.php");
		});

		 $(document).ready(function () {
		 	$("#active_friends").load("Active_Users.php");
		 });
	</script>
</head>
<body onload="loadColor();">
	<header>
		<nav>
			<h3 class="chat-logo">JChat Messenger</h3>
			<span class="brand" onclick="show_menu();"><img src="../img/menu.png" width="40px" height="40px" onclick="show_menu()"></span>
			<aside class="aside">
				<div id="profile_picture"></div>
				<h4 class="welcome_text">Welcome,</h4><span id="my_username"><h3 id="username"><?php echo ($_COOKIE["user_first_name"]); ?></h3></span>
			</aside>
		</nav>
		
	</header>

	

<div class="nav-side-menu">
    
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
            	<a href="#">
	                <li>
	                  <i class="fa fa-dashboard fa-lg"></i> &nbsp Dashboard
	                </li>
            	</a>

            	<a href="#">
	                 <li>
	                  <i class="fa fa-user fa-lg"></i> &nbsp Profile
	                 </li>
             	</a>

             	<a href="#">
	                 <li>
	                  <i class="fa fa-users fa-lg"></i> &nbsp Users
	                </li>
            	</a>

            	<a href="#">
	                <li>
	                  <i class="fa fa-cogs fa-lg"></i> &nbsp Settings
	                </li>
            	</a>
                
                <a href="../index.php">
                <li onclick="Logout()">
                  <i class="fa fa-sign-out fa-lg" ></i> &nbsp Logout
                 </li>
             	</a>
            </ul>
     </div>
</div>


<div id="chat-panel">
	<button class="tablink" onclick="openCity('messages', this, 'skyblue')" id="defaultOpen">Messages &nbsp<span class="label label-pill label-danger count" style="border-radius:10px;"></span></button>
		<button class="tablink" onclick="openCity('active_friends', this, 'skyblue')" id="active_users_id">Active Chat <span id="num_users_online"></span></button>
		<button class="tablink" onclick="openCity('myfriends', this, 'skyblue')">My Friends</button>
		<button class="tablink" onclick="openCity('news', this, 'skyblue')">News</button>


		<!--Div for sending and displaying messages -->
		<div id="messages" class="tabcontent" style="display: block;">
		  <h3 id="get_name"></h3><hr>
		   <div id="messages_holder">
			<div id="out" style="overflow:auto; height: 280px;"></div>
			  <div id="messages_writer">
			  	<form method="post" action="home.php" id="form_send_message">
			  		<p class="lead emoji-picker-container">
			    <textarea class="form-control textarea-control" id="text_area" placeholder="Type a message" name="txtmessage" spellcheck="false" data-emojiable="true"></textarea></p>
			    <!--<img src="../img/unnamed.png" alt="Send Image" id="send_button" height="65" width="65" /><button type="submit"><img src="arrow.png" alt="Arrow Icon"></button>-->
			    <input type="submit" name="send_message" value="Send" id="btn_Send"/>
			  </div>
			</div>

			<!-- Script to load emojis-->
			 <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
			  <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
			   <script src="lib/js/config.js"></script>
			  <script src="lib/js/util.js"></script>
			  <script src="lib/js/jquery.emojiarea.js"></script>
			  <script src="lib/js/emoji-picker.js"></script>
			  <script>
			      $(function() {
			        // Initializes and creates emoji set from sprite sheet
			        window.emojiPicker = new EmojiPicker({
			          emojiable_selector: '[data-emojiable=true]',
			          assetsPath: 'lib/img/',
			          popupButtonClasses: 'fa fa-smile-o'
			        });
			        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
			        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
			        // It can be called as many times as necessary; previously converted input fields will not be converted again
			        window.emojiPicker.discover();
			      });
			    </script>

			<!-- End script to load emojis-->

			<!-- Script to allow Enter key to send data and shift+enter to go to next line-->
				<script type="text/javascript">
				$(document).ready(function(){
				    $('#text_area').keypress(function(e){
				      if(e.which ==  13){
				           // submit via ajax or
				           $('form').submit();
				       }
				    });
				});
				</script>

			<!-- End script to allow Enter key -->

			<!-- Div to display messages sent to friends-->
			<div id="users_you_write_to">
				<h3>All Messages</h3>
				<content id="content_for_friends"></content>
				<div id="num_messages" style="height: 40px; margin-top: 130px;">
			
				</div>
			</div>
		</div>
		

		<!-- PHP codes to send messages -->
		<?php

        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "chatdb";

        $connection_String = mysqli_connect($host,$user,$pass,$database);
        $clicked_on_username = $_COOKIE["default_clicked_on_username"];
        $time_message_sent = date("h:i a");
        if(isset($_POST["send_message"])){
          if(!empty($_POST["txtmessage"])){
            $messageSender = $_COOKIE["user_first_name"];
			
            $newmessage = mysqli_real_escape_string($connection_String, $_POST["txtmessage"]);
            $perfect_table = $_COOKIE["correctTable"];
            $query = "INSERT INTO $perfect_table ( Usernames, Messages,Time_sent ) VALUES ('$messageSender','$newmessage','$time_message_sent')";
            $query5 = "INSERT INTO `all_users_messages`(`Messages`, `From_user`, `to_user`,`Time_sent`) VALUES ('$newmessage','$messageSender','$clicked_on_username','$time_message_sent')";

            if($run = mysqli_query($connection_String,$query) && $run_message = mysqli_query($connection_String,$query5)){
              echo "<embed loop='false' src='Notification.wav' autoplay='true' hidden='true'/>";
            };
          };
        };
        mysqli_close($connection_String);

        ?>

        <!--Div for active friends-->
		<div id="active_friends" class="tabcontent">
		  
		</div>

		<div id="myfriends" class="tabcontent">
			<!--<div id="messages_container"></div>-->
		  <!-- DIV for all friends  -->
		</div>

		<div id="news" class="tabcontent">
		  <h3>News</h3>
		  <p>Coming soon</p>
		</div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function(){

    $.ajax({
      cache:true,
      success:function(status){
  setInterval(function(){
      $("#active_friends").load("Active_Users.php"); // Add s to the #Get_Online_User to start ajax requests
    },1000);
  }
  });

    setInterval(function(){
      $("#out").load("ChatRoom.php");    // Add x to the #Main_Chat_Bo to start ajax requests
    },1000);

  setInterval(function(){
    $("#get_name").load("user_clicked_on.php");
  },1000);

  setInterval(function(){
    $("#get_users_profile").load("get_users_profile.php");
  },1000);

  /* Refresh active users*/
  setInterval(function(){
  	$("#num_users_online").load("Count_Users_Online.php");
  },1000);

  /*Refresh content for all users to whom you send messages */
  setInterval(function () {
  	$("#content_for_friends").load("Get_my_messages.php");
  },1000);

  /*Refresh friends*/
  setInterval(function () {
  	$("#myfriends").load("my_friends.php");
  });

  $("#send_button").click(function(){
    $("#btn_Send").trigger("click");
  });

  $("#btn_Send").click(function(){
    $(this).submit();
  });

    $(".calendar").yacal({
    tpl: {
    weekday: '<strong class="wday wd#weekday#">#weekdayName#<\/strong>'
    } });

    /*Load DIV for new messages*/
    setInterval(function () {
    	$(".count").load("notify.php");
    },1000);

    /* Update read messages when the selected user is the owner of the message
    setInterval(function () {
    	$(document).load("Update_Read_Messages.php");
    },1000); */
});

</script>

<!--  Script to allow User to send messages on hit Enter Key and shift+Enter key to go to next line
<script type="text/javascript">
	$("#text_area").keypress(function (e) {
    if(e.which == 13 && !e.shiftKey) {        
        $(this).closest("form").submit();
        e.preventDefault();
        return false;
    }
});
</script>-->
</html>