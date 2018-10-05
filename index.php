<?php

class Interview
{	
    /* non static properties of a class cannot be called statically. 
	   To solve the problem, precede $title with the keyword static. */
	public static $title = 'Interview test';
	//public $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

/* Good to check if the 'person' array is set first. And set a default value in case it is not set. 
   Secondly, the form method is GET (or get) and not POST hence one cannot retrieve the parameters from the $_POST array. 
   We use the $_GET array instead. */
$person = isset($_GET['person']) ? $_GET['person'] : '';
//$person = $_POST['person'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	
	// Print 10 times
	/* The first condition for the 'for loop' should be the smaller value, namely the 'start value', middle condition is the 'end value'
	   And the last condition is the 'increment' or 'decrement' value.
	   Secondly php uses dot(.) for concatenation and not plus(+). PHP tries to add the strings by first casting them to integers(0) which is not the expected outcome. */
	 
	for ($i=0; $i<10; $i++) {
		echo '<p>'.$lipsum.'</p>';
	}
	
	/*
	for ($i=10; $i<0; $i++) {
		echo '<p>'+$lipsum+'</p>';
	}
	*/
	?>

	<hr>

	<form method="get" action="<?=$_SERVER['REQUEST_URI'];?>">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<!--
				$person variable is of type 'Array' (Associative Array) and not an instance of a class.
				Therefore it is incorrect to access array values using the arrow sign.
				Array values can be accessed using the angle bracket.
			-->
			<?php foreach ($people as $person): ?>
				<tr>
					<td><?=$person["first_name"];?></td>
					<td><?=$person["last_name"];?></td>
					<td><?=$person["email"];?></td>
				</tr>
			<?php endforeach; ?>
			
			<?php //foreach ($people as $person): ?>
				<tr>
					<td><?=""; //$person->first_name;?></td>
					<td><?=""; //$person->last_name;?></td>
					<td><?=""; //$person->email;?></td>
				</tr>
			<?php //endforeach; ?>
		</tbody>
	</table>

</body>
</html>