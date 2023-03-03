<!DOCTYPE html>
<html>
<head>
	<title>Live Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Live Feedback</h1>
		<div class="card-container">
			<?php include 'process-form.php'; ?>
		</div>
	</div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$airbnbLink = $_POST['airbnb-link'];

	// Save the form data to a file or database
	$data = array(
		'name' => $name,
		'email' => $email,
		'airbnbLink' => $airbnbLink
	);

	$filename = 'feedback.json';
	$file = fopen($filename, 'a');
	fwrite($file, json_encode($data) . "\n");
	fclose($file);

	// Display a confirmation message
	echo '<div class="card">';
	echo '<h2>' . $name . '</h2>';
	echo '<p>Email: ' . $email . '</p>';
	echo '<p>Airbnb Link: <a href="' . $airbnbLink . '">' . $airbnbLink . '</a></p>';
	echo '</div>';
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$airbnbLink = $_POST['airbnb-link'];

	// Save the form data to a file or database
	$data = array(
		'name' => $name,
		'email' => $email,
		'airbnbLink' => $airbnbLink
	);

	$filename = 'feedback.json';
	$file = fopen($filename, 'a');
	fwrite($file, json_encode($data) . "\n");
	fclose($file);

	// Display a confirmation message and a "Purchase Feedback" button
	echo '<div class="card">';
	echo '<h2>' . $name . '</h2>';
	echo '<p>Email: ' . $email . '</p>';
	echo '<p>Airbnb Link: <a href="' . $airbnbLink . '">' . $airbnbLink . '</a></p>';
	echo '<a href="https://donate.stripe.com/8wM3di2PAeU24TKcMM" class="button">Purchase Feedback</a>';
	echo '</div>';
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $link = $_POST["link"];

  // Create email message
  $to = "wilfred.leeux9@gmail.com";
  $subject = "New feedback from " . $name;
  $message = "Name: " . $name . "\r\n" .
             "Email: " . $email . "\r\n" .
             "Link: " . $link;

  // Send email
  if (mail($to, $subject, $message)) {
    header("Location: confirmation.php");
  } else {
    echo "There was an error sending your feedback. Please try again later.";
  }
}
?>
