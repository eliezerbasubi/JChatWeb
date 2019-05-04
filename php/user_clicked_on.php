<?php
 date_default_timezone_set('Africa/Nairobi');  
include 'connect.php';
$clicked_on_username = $_COOKIE["default_clicked_on_username"];
echo "<span id='get_Name'>$clicked_on_username</span>";
$query_1 = "SELECT * FROM users_online WHERE first_name ='$clicked_on_username'";
  $run = mysqli_query($con,$query_1)or die(mysqli_error($con));
  if ($rows = mysqli_fetch_assoc($run)) {
  	if($rows['status'] == "online"){
  		echo "<span id='online_status'>&nbsp;&nbsp;&nbsp;online</span>";
  	}else if($rows['status'] == "offline"){
  		echo "<span id='online_status'> &nbsp;&nbsp;&nbsp;".facebook_time_ago($rows['Time'])."</span>";
  	}
  }//end while loop




function facebook_time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
	     return "Just Now";  
	   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 }  


?>
<i class="fa fa-phone call" style="font-size:36px;color:green; margin-left: 150px;"></i>&nbsp;&nbsp;
<i class="fa fa-video-camera call" style="font-size:36px;color:green; "></i>

<style type="text/css">
	.call:hover{
		cursor: pointer;
	}

	#online_status{
		font-size: 17px;
		color: green;
	}

	#get_Name{
		text-transform: capitalize;
	}
</style>