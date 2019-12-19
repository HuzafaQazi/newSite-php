<!DOCTYPE HTML>  
<html>
<head>
	<script src="js/jquery-3.3.1.js"></script>
<style>
.error {color: #FF0000;}
body{
background: skyblue !important;
width: 1000px auto;
height: auto;
border: 2px solid black;
	}
form{
	margin: 10px;
	padding: 10px;
	text-align: center;
}
h1{
	text-align: center;
}
p{
	text-align: center;
}
table{
	border: 3px solid black;
	margin-bottom: 5px;
	margin-left: 5px;
	padding-left: 5px;
	padding-right: 5px;
	padding-top: 5px;
	padding-bottom: 5px;
	position: relative;
	left: 550px;
}
td{
	border: 1px solid black;
}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    if(strlen($_POST["name"]) < 5){

    	$nameErr = "Name Must Contain Atleast 5 characters";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>PHP Form Validation Example</h1>
<p><span class="error">* required field</span></p>
<form id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <div class="btn">
 <input type="submit" name="submit" value="Submit">
<!--  <button type="button">Submit</button> -->
</div>
</form>


<table width="100" id="table">
<tr align="center">
	<td colspan="6"><?php echo "<h2>Your Input:</h2>"; ?></td>
</tr>

<tr>
	<td><?php echo $name; ?></td>
</tr>

<tr>
	<td><?php echo $email; ?></td>
</tr>

<tr>
	<td><?php echo $website; ?></td>
</tr>

<tr>
	<td><?php echo $comment; ?></td>
</tr>

<tr>
	<td><?php echo $gender; ?></td>
</tr>

</table>

</body>
</html>

<!-- <script>
$(document).ready(function(){
$('#table').hide();
		
$('form').on('click','.btn',function(){

$('form').submit();

			$('#table').show();
			
			$('form').stopPropagation();
			

	});
	

});


	



















// 	if('#myForm'){

// 	$('#table').css('display','none');
// }

// 	$('#myForm').on('click','.btn',function(){

// 		$(this).parent().find('#table').show();
// 		//$(this).isPropagationStopped();	
// 	})

	
// });
	
// 	// $('#table').css('display','none');



// 	// $('input[type="submit"]').click(function (){


// 	// 	$('#table').show();
// // 	// })
// // if ('#myForm') {
// // 	$('#table').hide();
// // }
// // else{
// // 	$('#table').show();
// //}
// // 		$('#myForm').on('click',function (){

// // 			$('#table').show();
// // 		})
// // // 	if ('#myForm') {
// // // $('#myForm').submit();

// // // }
// // });
</script> -->