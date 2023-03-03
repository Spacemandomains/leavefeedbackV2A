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
<div class="card-container">
	<?php
	$filename = 'feedback.json';
	if (file_exists($filename)) {
		$file = fopen($filename, 'r');
		while (!feof($file)) {
			$line = fgets($file);
			if ($line) {
				$data = json_decode($line, true);
				echo '<div class="card">';
				echo '<h2>' . $data['name'] . '</h2>';
				echo '<p>Email: ' . $data['email'] . '</p>';
				echo '<p>Airbnb Link: <a href="' . $data['airbnbLink'] . '">' . $data['airbnbLink'] . '</a></p>';
				echo '</div>';
			}
		}
		fclose($file);
	}
	?>
</div>
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
