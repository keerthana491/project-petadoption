<?php

/* Connect to database */
$conn = mysqli_connect("localhost", "root", "", "happy_paws");

if (!$conn) {
    die("Database connection failed");
}

/* Count applications */
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM adoption");
$row = mysqli_fetch_assoc($result);

$total = $row["total"];

/* Get latest adoption */
$result = mysqli_query($conn,
    "SELECT * FROM adoption ORDER BY id DESC LIMIT 1"
);

$latest = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Adoption Summary - Happy Paws</title>

<style>

body {
    margin: 0;
    font-family: Arial, "Segoe UI Emoji", sans-serif;
    background: #f1f8f6;
}

/* Navigation */

nav {
    background: #00897b;
    padding: 18px;
    text-align: center;
}

nav a {
    color: white;
    text-decoration: none;
    margin: 15px;
    font-weight: bold;
}

/* Heading */

h1 {
    text-align: center;
    color: #00695c;
    margin-top: 35px;
}

.subtitle {
    text-align: center;
    color: #666;
}

/* Main box */

.box {
    width: 550px;
    max-width: 80%;
    background: white;
    margin: 30px auto;
    padding: 30px;
    border-radius: 25px;
    box-shadow: 0 7px 20px #ccc;
}

/* Application count */

.count {
    text-align: center;
    background: #e0f2f1;
    padding: 20px;
    border-radius: 18px;
}

.count h2 {
    color: #00897b;
}

.number {
    font-size: 40px;
    font-weight: bold;
    color: #ff7043;
}

/* Details */

.detail {
    background: #f1f8f6;
    padding: 12px;
    margin: 10px 0;
    border-radius: 10px;
}

.detail b {
    color: #00695c;
}

/* Buttons */

.button {
    text-align: center;
    margin-top: 25px;
}

button {
    background: #ff7043;
    color: white;
    border: none;
    padding: 13px 22px;
    margin: 5px;
    border-radius: 25px;
    cursor: pointer;
    font-size: 15px;
}

button:hover {
    background: #00897b;
}

/* Footer */

footer {
    background: #00695c;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 40px;
}

</style>

</head>

<body>

<!-- Navigation -->

<nav>

<a href="index.html">Home</a>
<a href="pets.html">Pets</a>
<a href="details.html">Details</a>
<a href="adoption.html">Adopt</a>
<a href="summary.php">Summary</a>
<a href="payment.html">Payment</a>

</nav>


<h1>🐾 Adoption Summary 🐾</h1>

<p class="subtitle">
Thank you for giving a pet a loving home ❤️
</p>


<div class="box">

    <!-- Total Applications -->

    <div class="count">

        <h2>📋 Total Applications</h2>

        <div class="number">
            <?php echo $total; ?>
        </div>

    </div>


    <?php if ($latest) { ?>

        <h2 style="color:#00897b; text-align:center;">
            ❤️ Latest Adoption
        </h2>

        <div class="detail">
            <b>👤 Name:</b>
            <?php echo htmlspecialchars($latest["name"]); ?>
        </div>

        <div class="detail">
            <b>🎂 Age:</b>
            <?php echo htmlspecialchars($latest["age"]); ?>
        </div>

        <div class="detail">
            <b>📱 Phone:</b>
            <?php echo htmlspecialchars($latest["phone"]); ?>
        </div>

        <div class="detail">
            <b>📧 Email:</b>
            <?php echo htmlspecialchars($latest["email"]); ?>
        </div>

        <div class="detail">
            <b>🐾 Selected Pet:</b>
            <?php echo htmlspecialchars($latest["pet"]); ?>
        </div>

    <?php } else { ?>

        <h2 style="text-align:center; color:#00897b;">
            🐾 No Adoption Yet
        </h2>

        <p style="text-align:center;">
            Please submit an adoption application first.
        </p>

    <?php } ?>


    <div class="button">

        <a href="adoption.html">
            <button>❤️ Adopt Another Pet</button>
        </a>

        <a href="payment.html">
            <button>💳 Go to Payment</button>
        </a>

    </div>

</div>


<footer>

🐾 Happy Paws Pet Adoption ❤️
<br>
Every pet deserves a loving home!

</footer>

</body>

</html>

<?php
mysqli_close($conn);
?>