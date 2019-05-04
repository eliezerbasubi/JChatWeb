<!--PHP codes to get number of friends who are online and display them-->
			<?php
			$con=mysqli_connect("localhost","root","","chatdb");
			// Check connection
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			$sql="SELECT * FROM users_online WHERE status = 'online' ";

			if ($result=mysqli_query($con,$sql))
			  {
			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  echo("(".$rowcount.")");
			  // Free result set
			  mysqli_free_result($result);
			  }

			mysqli_close($con);
			?>