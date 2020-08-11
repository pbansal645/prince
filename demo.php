<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	p{
		font-size: 50px;
		text-align: center;
		
	}
	.top{
		width: 100%;
		background-color: 	#00cc00;
		overflow: hidden;
	}
	.top button{
		
		background-color: inherit;
		border: hidden;
		color: white;
		width: 250px;
		cursor: pointer;
		height: 50px;
		float: left;
		margin-left: 20px;
		padding: 5px 5px 5px 5px;
		font-size: 30px;
	}
	.top button:hover{
		background-color: white;
		color: black;
		border: 2px solid black;
	}
	.display {
		display: none;
		background-color: #ffffe6;
		border:1px solid #00ffcc;
		width: 50%;
		height: 700px;
		padding-top: 5%;
		padding-left: 5%;
		margin-left: 25%;
		margin-top: 5%;
	}
	.display label{
		  font-size: 25px;

	}
	.display input{
		width: 50%;
		height: 28px;

	}
	.display input[type="submit"]{
		font-size: 30px;
		background-color: #00cc00;
		color: white;
		height: 40px;
		border: hidden;
	}
</style>
<body bgcolor="#ccd9ff">
	            <p> School Database System</p>
	            <div class="top">
	            	<button class="tablink" onclick="display(event, 'c')">New Details</button>
	            	<button class="tablink" onclick="display(event, 'u')">Update Details</button>
	            	<button class="tablink" onclick="display(event, 'r')">Display Details</button>
	            	<button class="tablink" onclick="display(event, 'd')">Delete Details</button>
	            </div>

<div class="display" id="c">
	
			<form method="POST" action="demo.php" target="_self">
				<label for="name">Enter Your Name:</label><br><br>
				<input type="text" name="name" placeholder="Enter name ....."><br><br><br>
				<label for="email"> Enter your Email Id:</label><br><br>

				<input type="email" name="email" placeholder="Enter email ......"><br><br><br>
				<label for="mobile"> Enter your Mobile No.:</label><br><br>

				<input type="number" name="mobile" placeholder="Enter mobile number ......."><br><br><br>
				<label for="dob"> Enter your Date of Birth:</label><br><br>

				<input type="date" name="dob" ><br><br><br>
				<label for="pin"> Enter your Pincode:</label><br><br>

				<input type="number" name="pin" placeholder="Enter pin code ........."><br><br><br>
                <input type="submit" name="Submit">
			</form>
			

</div>	            
<?php 
if(isset($_POST['Submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	$pincode=$_POST['pin'];

	$connection= mysqli_connect("localhost","root","");
 	$db=mysqli_select_db($connection,'school');
 	$sql="INSERT INTO  `details`(`Name`,`Email Id`,`Mob`,`DOB`,`Pincode`) VALUES ('$name','$email','$mobile','$dob','$pincode')";
 	$query_run=mysqli_query($connection,$sql);
 	if($query_run)
 	{
 		
              echo "Your data is submitted Successfully";
              echo "<table border=2 cellspadding=10 width=1200px>";
              echo "<tr><th>Name</th><th>Email Id</th><th>Mobile No.</th><th>Date Of Birth</th><th>Pincode</th></tr>";
              
              	echo "<tr><td>";
              	echo $name;
              	echo "</td><td>";
              	echo $email;
              	echo "</td><td>";
              	echo $mobile;
              	echo "</td><td>";
              	echo $dob;
              	echo "</td><td>";
              	echo $pincode;
              	echo "</td></tr>";
              
              echo "</table>";
 	}
 	else
 	{
 		echo "Mobile No. Already Registered";

 	}
 	
}


 ?>	            	
<div class="display" id="u">
	
			
			<form method="POST" action="demo.php" target="_self">
				<label for="name">Enter Your Name:</label><br><br>
				<input type="text" name="name" placeholder="Enter name ....."><br><br><br>
				<label for="email"> Enter your Email Id:</label><br><br>

				<input type="email" name="email" placeholder="Enter email ......"><br><br><br>
				<label for="mobile"> Enter your Mobile No.:</label><br><br>

				<input type="number" name="mobile" placeholder="Enter mobile number ......."><br><br><br>
				<label for="dob"> Enter your Date of Birth:</label><br><br>

				<input type="date" name="dob" ><br><br><br[>
				<label for="pin"> Enter your Pincode:</label><br><br>

				<input type="number" name="pin" placeholder="Enter pin code ........."><br><br><br>
                <input type="submit" name="Update" value="Update">
			</form>
			


</div>	    
<?php
if (isset($_POST['Update'])) {
$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	$pincode=$_POST['pin'];

	$connection= mysqli_connect("localhost","root","");
 	$db=mysqli_select_db($connection,'school');
 	$sql="UPDATE `details` SET `Name`='$name',`Mob`='$mobile',`DOB`='$dob',`Pincode`='$pincode' WHERE `Email Id`='$email'";
	$query_run=mysqli_query($connection,$sql);
	if($query_run)
	{
		echo " Data Updated Successfully";
	}
	else
	{
	echo "not ";
	}
}
  ?>      
<div class="display" id="r">
	
			<form method="POST" action="demo.php">
				<label for="name">Enter Your Email Id:</label><br><br>
				<input type="text" name="email" placeholder="Enter email ....."><br><br><br>
				
                <input type="submit" name="Find" value="Find">
			</form>
		</div>
			<?php 
			if (isset($_POST['Find']))
			 {
			 	$email=$_POST['email'];
			 	$connection= mysqli_connect("localhost","root","");
 	$db=mysqli_select_db($connection,'school');
 	$sql="SELECT * FROM `details` WHERE `Email Id`='$email' ";
 	$query_run=mysqli_query($connection,$sql);
 	echo "<table border=2 cellspadding=10 width=1200px>";
              echo "<tr><th>Id</th><th>Name</th><th>Email Id</th><th>Mobile No.</th><th>Date Of Birth</th><th>Pincode</th></tr>";
 	while($row=mysqli_fetch_array($query_run))
 	{
 		
 		
 			     echo "<tr><td width=200px>";
              	echo $row['Id'];
              	echo "<td width=200px>";
              	echo $row['Name'];
              	echo "</td><td width=200px>";
              	echo $row['Email Id'];
              	echo "</td><td width=200px>";
              	echo $row['Mob'];
              	echo "</td><td width=200px>";
              	echo $row['DOB'];
              	echo "</td><td width=200px>";
              	echo $row['Pincode'];
              	echo "</td></tr>";
              
              
 		
 	
			 }
			 echo "</table>";
			} ?>
          
<div class="display" id="d">
	
			<form method="POST" action="demo.php">
				<label for="name">Enter Your Email Id:</label><br><br>
				<input type="text" name="email" placeholder="Enter email ....."><br><br><br>
				
                <input type="submit" name="delete" value="Delete">
			</form>
		</div>
			<?php 
			if (isset($_POST['delete']))
			 {
			 	$email=$_POST['email'];
			 	$connection= mysqli_connect("localhost","root","");
 	$db=mysqli_select_db($connection,'school');
 	$sql="DELETE FROM `details` WHERE `Email Id`='$email' ";
 	$query_run=mysqli_query($connection,$sql);
 	if($query_run)
 	{
 		echo "Data Deleted Successfully";
 	}
 	else
 	{
 		echo "Email Id doesn't found";
 	}
 }
?>
<script type="text/javascript">

	
	function display(event, id) {
  var i, display, tablink;
display = document.getElementsByClassName("display");
  for (i = 0; i < display.length; i++) {
    display[i].style.display = "none";
  }
  tablink = document.getElementsByClassName("tablink");
  for (i = 0; i < tablink.length; i++) {
    tablink[i].className = tablink[i].className.replace(" active", "");
  }
  document.getElementById(id).style.display = "block";
  event.currentTarget.className += " active";
}
</script>          
</body>
</html>