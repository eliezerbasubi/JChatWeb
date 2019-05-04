<?php
 $host = "localhost";
  $user = "root";
  $pass = "";
  $database = "chatdb";

  $connection_String = mysqli_connect($host,$user,$pass,$database);


  if(isset($_POST["submit"])){

    $first_name = $_POST["txtfname"];
    $last_name = $_POST["txtlname"];
    $email = $_POST["txtemail"];
    $user_password = $_POST["txtpassword"];
    $user_position = $_POST["selected_position_option"];
    $user_department = $_POST["selected_department_option"];
    $security_key = $_POST["confirm_password"];

    if($first_name!="" && $last_name!="" && $user_password!="" && $user_position!="-- Select Position --" && $user_department!="-- SELECT COUNTRY --" && $security_key!="" && $user_password == $security_key){
    	$sql=mysqli_query($connection_String,"SELECT FROM users_table (`user_fname`, `email`, `Password`) WHERE user_fname='$first_name'");
		 if(!$sql)
		   {
		    echo"<script>alert('name already exists')</script>";
		   }
				else
				{
		    $newUser="INSERT INTO users_table(`user_fname`,`user_lname`,`email`,`Password`,`Country`,`position`) values('$first_name','$last_name','$email','$user_password','$user_department','$user_position')";
		    if (mysqli_query($connection_String,$newUser))
		    {
		        echo "<script>alert('You are now registered')</script>";
		    }
		    else
		    {
		        echo "<script>alert('Error adding user in database')</script>";
		    }
		}
		}else{
		    echo "<script>alert('Please Fill All Spaces Provided')</script>";
		  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up to JChat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-image: url(../img/background.png);
			background-repeat: no-repeat;
			background-attachment: cover;
			background-color: skyblue;
		}

		h3{
			font-family: golden age;
			font-size: 30px;
			padding-bottom: 5px;

		}
		h3::-webkit-input-placeholder { font-family: golden age; }  /* WebKit, Blink, Edge */
		h3:-moz-placeholder { font-family: golden age; }  /* Mozilla Firefox 4 to 18 */
		h3::-moz-placeholder { font-family: golden age; }  /* Mozilla Firefox 19+ */
		h3:-ms-input-placeholder { font-family: golden age; }  /* Internet Explorer 10-11 */
		h3::-ms-input-placeholder { font-family: golden age; }  /* Microsoft Edge */
		#content{
			width: 540px;
			height: 600px;
			background-color: rgba(0,0,0,0.2);
			position: absolute;
			top: 1%;
			left: 50%;
			padding: 0px 25px 25px 25px;
			text-align: center;
			border-radius: 10px;
		}

		select{
			width: 480px;
			height: 54px;
			color: black;
		}

		input[type="submit"]{
			font-size: 20px;
		}
		#select_bar{
			color: black;
		}

		a{
			text-decoration: underline;
			font-size: 20px;
			color: white;
			}

		.form-control::-webkit-input-placeholder { color: rgba(0,0,0,0.5); }  /* WebKit, Blink, Edge */
		.form-control:-moz-placeholder { color:rgba(0,0,0,0.5); ; }  /* Mozilla Firefox 4 to 18 */
		.form-control::-moz-placeholder { color: rgba(0,0,0,0.5);; }  /* Mozilla Firefox 19+ */
		.form-control:-ms-input-placeholder { color: rgba(0,0,0,0.5);; }  /* Internet Explorer 10-11 */
		.form-control::-ms-input-placeholder { color: rgba(0,0,0,0.5);; }  /* Microsoft Edge */

		.selectpicker::-webkit-input-placeholder { color: rgba(0,0,0,0.5); }  /* WebKit, Blink, Edge */
		.selectpicker:-moz-placeholder { color:rgba(0,0,0,0.5); ; }  /* Mozilla Firefox 4 to 18 */
		.selectpicker::-moz-placeholder { color: rgba(0,0,0,0.5);; }  /* Mozilla Firefox 19+ */
		.selectpicker:-ms-input-placeholder { color: rgba(0,0,0,0.5);; }  /* Internet Explorer 10-11 */
		.selectpicker::-ms-input-placeholder { color: rgba(0,0,0,0.5);; }  /* Microsoft Edge */
	</style>
</head>
<body>
	<div id="content">
		<h3>Sign Up to JChat</h3>
	<form class="form-group" method="post">
		<input type="" name="txtfname" class="form-control" placeholder="Enter First Name"><br/>
		<input type="" name="txtlname" class="form-control" placeholder="Enter Last Name"><br/>
		<input type="email" name="txtemail" class="form-control" placeholder="Enter Email Address"><br/>
		<select id="select_bar" name="selected_department_option" data-live-search="true" data-live-search-style="startsWith" class="selectpicker">
				<option>-- SELECT COUNTRY --</option>
				<option>Algeria</option>
				<option>Angola</option>
				<option>Argentina</option>
				<option>Australia</option>
				<option>Bulgaria</option>
				<option>Burkina Faso</option>
				<option>Burundi</option>
				<option>Cambodia</option>
				<option>Cameroon</option>
				<option>Canada</option>
				<option>Cabo Verde</option>
				<option>Central African Republic</option></option>
				<option>Chad</option></option>
				<option>Chile</option></option>
				<option>China</option></option>
				<option>Colombia</option></option>
				<option>Comoros</option></option>
				<option>Congo, Democratic Republic of the</option></option>
				<option>Congo, Republic of the</option></option>
				<option>Denmark</option></option>
				<option>Djibouti</option></option>
				<option>Dominica</option></option>
				<option>Dominican Republic</option></option>
				<option>Egypt</option></option>
				<option>El Salvador</option></option>
				<option>Equatorial Guinea</option></option>
				<option>Eritrea</option></option>
				<option>Estonia</option></option>
				<option>Ethiopia</option></option>
				<option>Fiji</option></option>
				<option>Finland</option></option>
				<option>France</option></option>
				<option>Gabon</option></option>
				<option>Gambia, The</option></option>
				<option>Georgia</option></option>
				<option>Germany</option></option>
				<option>Ghana</option></option>
				<option>Greece</option></option>
				<option>Grenada</option></option>
				<option>Guatemala</option></option>
				<option>Guinea</option></option>
				<option>Guinea-Bissau</option></option>
				<option>Holy See</option></option>
				<option>Honduras</option></option>
				<option>Hong Kong</option>
				<option>Hungary</option>
				<option>Iceland</option>
				<option>India</option>
				<option>Indonesia</option>
				<option>Iran</option>
				<option>Iraq</option>
				<option>Ireland</option>
				<option>Israel</option>
				<option>Italy</option>
				<option>Jamaica</option>
				<option>Japan</option>
				<option>Jordan</option>
				<option>Kazakhstan</option>
				<option>Kenya</option>
				<option>Kiribati</option>
				<option>Korea, North</option>
				<option>Korea, South</option>
				<option>Kosovo</option>
				<option>Kuwait</option>
				<option>Kyrgyzstan</option>
				<option>Laos</option>
				<option>Latvia</option>
				<option>Lebanon</option>
				<option>Lesotho</option>
				<option>Liberia</option>
				<option>Libya</option>
				<option>Liechtenstein</option>
				<option>Lithuania</option>
				<option>Luxembourg</option>
				<option>Macau</option>
				<option>Macedonia</option>
				<option>Madagascar</option>
				<option>Malawi</option>
				<option>Malaysia</option>
				<option>Maldives</option>
				<option>Mali</option>
				<option>Malta</option>
				<option>Mauritania</option>
				<option>Mauritius</option>
				<option>Mexico</option>
				<option>Micronesia</option>
				<option>Moldova</option>
				<option>Monaco</option>
				<option>Mongolia</option>
				<option>Montenegro</option>
				<option>Morocco</option>
				<option>Mozambique</option>
				<option>Namibia</option>
				<option>Nauru</option>
				<option>Nepal</option>
				<option>Netherlands</option>
				<option>New Zealand</option>
				<option>Nicaragua</option>
				<option>Niger</option>
				<option>Nigeria</option>
				<option>North Korea</option>
				<option>Norway</option>
				<option>Oman</option>
				<option>Pakistan</option>
				<option>Palau</option>
				<option>Palestinian Territories</option>
				<option>Panama</option>
				<option>Papua New Guinea</option>
				<option>Paraguay</option>
				<option>Peru</option>
				<option>Philippines</option>
				<option>Poland</option>
				<option>Portugal</option>
				<option>Qatar</option>
				<option>Romania</option>
				<option>Russia</option>
				<option>Rwanda</option>
				<option>Saint Kitts and Nevis</option>
				<option>Saint Lucia</option>
				<option>Saint Vincent and the Grenadines</option>
				<option>Samoa</option>
				<option>San Marino</option>
				<option>Sao Tome and Principe</option>
				<option>Saudi Arabia</option>
				<option>Senegal</option>
				<option>Serbia</option>
				<option>Seychelles</option>
				<option>Sierra Leone</option>
				<option>Singapore</option>
				<option>Sint Maarten</option>
				<option>Slovakia</option>
				<option>Slovenia</option>
				<option>Solomon Islands</option>
				<option>Somalia</option>
				<option>South Africa</option>
				<option>South Korea</option>
				<option>South Sudan</option>
				<option>Spain</option>
				<option>Sri Lanka</option>
				<option>Sudan</option>
				<option>Suriname</option>
				<option>Swaziland</option>
				<option>Sweden</option>
				<option>Switzerland</option>
				<option>Syria</option>
				<option>Taiwan</option>
				<option>Tajikistan</option>
				<option>Tanzania</option>
				<option>Thailand</option>
				<option>Timor-Leste</option>
				<option>Togo</option>
				<option>Tonga</option>
				<option>Trinidad and Tobago</option>
				<option>Tunisia</option>
				<option>Turkey</option>
				<option>Turkmenistan</option>
				<option>Tuvalu</option>
				<option>Uganda</option>
				<option>Ukraine</option>
				<option>United Arab Emirates</option>
				<option>United Kingdom</option>
				<option>Uruguay</option>
				<option>Uzbekista</option>
				<option>Vanuatu</option>
				<option>Venezuela</option>
				<option>Vietnam</option>
				<option>Yemen</option>
				<option>Zambia</option>
				<option>Zimbabwe</option>
</select><br/><br/>


		<select name="selected_position_option" data-live-search="true" data-live-search-style="startsWith" class="selectpicker">
			<option>-- Select Position --</option>
			<option>Accountant</option>
			<option>Director</option>
			<option>Coordinator</option>
			<option>Managing Director</option>
			<option>Programmer</option>
		</select><br/><br/>
		<input type="password" name="txtpassword" class="form-control" placeholder="Enter Password"><br/>
		<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"><br/>

		<input type="submit" name="submit" class="btn btn-info btn-md" value="Sign Up">&nbsp &nbsp &nbsp
		<a href="../index.php">Sign In</a>
	</form>
	</div>

</body>
</html>