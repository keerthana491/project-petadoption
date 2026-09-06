<?php

$conn = mysqli_connect("localhost", "root", "", "happy_paws");

if (!$conn) {
    die("Database connection failed");
}

$name = $_POST["name"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$pet = $_POST["pet"];
$reason = $_POST["reason"];

$sql = "INSERT INTO adoption
(name, age, phone, email, address, pet, reason)
VALUES
('$name', '$age', '$phone', '$email', '$address', '$pet', '$reason')";

if (mysqli_query($conn, $sql)) {
   echo "<h1>🎉 Adoption Application Submitted Successfully! 🐾</h1>";
echo "<p>Thank you for adopting <b>$pet</b> ❤️</p>";
echo "<p>We will contact you soon.</p>";

echo "<br>";
echo "<a href='summary.php'>
        <button>🐾 View Adoption Summary</button>
      </a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

?>