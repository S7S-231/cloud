<?php 
include_once 'header.php';
?>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="include/Signup.inc.php" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<input type="password" name="rpswd" placeholder="Repeat Password" required="">
					<button name="sub" type="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="include/Login.inc.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="emaill" placeholder="Email" required="">
					<input type="password" name="pssswd" placeholder="Password" required="">
					<button name="subb" type="submit">Login</button>
					<?php 

if(isset($_GET["error"])){
	
	if($_GET["error"] == "emptyinput"){
		echo "<p> Fill All Fields!!!</p>";
	}

	
	else if($_GET["error"] == "invalidemail"){
			echo "<p> Email Doesn't Match!!!</p>";
		}

	
	
	else if($_GET["error"] == "passwordnotmatch"){
		echo "<p> Password Not Match!!!</p>";
	}

	else if($_GET["error"] == "wronglogin"){
		echo "<p> There's Something Wrong!!!</p>";
	}




	else if($_GET["error" ]== "usernametaken"){
		echo "<p> Username is already taken!!!</p>";
	}
}


?>
				</form>


<?php 

	include_once 'footer.php';

?>