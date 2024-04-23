<!DOCTYPE html>
<html>
<head>
<title>PHP Form Validation</title>
</head>
<body>

<?php
// Define variables and initialize with empty values
$name = $email = "";
$name_err = $errorr = "";

// Processing form data when form is submitted

	
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
// Validate name
if (empty($_POST["name"])) {
$name_err = "Name is required";
} else {
$name = test_input($_POST["name"]);
}


if (empty($_POST["email"])) {
$errorr = "Email is required";
} else {
$email = test_input($_POST["email"]);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errorr = "Invalid email format";
}
}
}

// Function to sanitize data
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>

<h2>PHP Form Validation </h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name" value="<?php echo $name;?>">
<span class="error">* <?php echo $name_err;?></span>
<br><br>
E-mail: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $errorr;?></span>
<br><br>
comment: <textarea id="coment" name="coments" rows="4" cols="50"></textarea>
<br><br>
<input type="submit" value="Submit">

</form>

</body>
</html>