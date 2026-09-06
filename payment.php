<?php

session_start();

if (isset($_POST["otp"])) {

    if ($_POST["otp"] == $_SESSION["otp"]) {

        echo "
        <div style='text-align:center;font-family:Arial;
        background:#e0f7f4;padding:80px'>

        <h1 style='color:#00897b'>
        🐾 🎉 Payment Successful! 🎉 🐾
        </h1>

        <h2>❤️ Adoption Complete ❤️</h2>

        <h2>Rio has found a forever home!</h2>

        <div style='background:white;padding:25px;
        border-radius:20px;display:inline-block'>

        🎟️ <b>Payment Receipt</b>

        <p>Pet: Rio 🦜</p>
        <p>Payment: {$_SESSION["method"]}</p>
        <p>Amount: ₹2,600</p>
        <p>Status: ✅ PAID</p>

        </div>

        <p>Thank you for giving a pet a loving home. ❤️</p>

        <a href='index.html'>
        <button style='padding:12px 25px;
        background:#ff7043;color:white;border:0;
        border-radius:20px'>
        🏠 Back to Home
        </button>
        </a>

        </div>";

        exit;
    }

    echo "<h2 style='text-align:center;color:red'>
    ❌ Invalid OTP
    </h2>";

    exit;
}


$method = $_POST["method"];


if ($method == "Cash on Visit") {

    echo "
    <div style='text-align:center;font-family:Arial;
    background:#e0f7f4;padding:100px'>

    <h1 style='color:#00897b'>
    🏠 Adoption Reserved!
    </h1>

    <h2>Pay ₹2,600 when you visit Happy Paws ❤️</h2>

    <p>No OTP is required. 🐾</p>

    <a href='summary.php'>🐾 View Summary</a>

    </div>";

    exit;
}


/* Demo OTP */

$otp = rand(100000,999999);

$_SESSION["otp"] = $otp;
$_SESSION["method"] = $method;

?>

<div style="text-align:center;font-family:Arial;
background:#e0f7f4;padding:100px">

<h1 style="color:#00897b">🔐 Verify Payment</h1>

<p>Payment Method: <b><?php echo $method; ?></b></p>

<h2 style="color:#ff7043">
Demo OTP: <?php echo $otp; ?>
</h2>

<form method="POST">

<input type="text"
name="otp"
maxlength="6"
placeholder="Enter OTP"
required>

<br><br>

<button style="padding:12px 25px;
background:#ff7043;color:white;border:0;
border-radius:20px">

🔐 Verify & Pay ₹2,600

</button>

</form>

</div>