<?php

session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$password = isset($_SESSION['password']) ? $_SESSION['password'] : "";
if ((strlen($username) == 0) || ($username != $password)) {
    print "<script>location.href='login.php';</script>";
}

// If quantity is not a number set quantity to 0 
$_SESSION['item1'] = is_numeric($_POST['item1']) ? $_POST['item1'] : 0;
$_SESSION['item2'] = is_numeric($_POST['item2']) ? $_POST['item2'] : 0;
$_SESSION['item3'] = is_numeric($_POST['item3']) ? $_POST['item3'] : 0;

$item1_price = 1000;
$item2_price = 600;
$item3_price = 50;

$subtotal = ($_SESSION['item1'] * $item1_price) +
            ($_SESSION['item2'] * $item2_price) +
            ($_SESSION['item3'] * $item3_price);
$_SESSION['subtotal'] = $subtotal;
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <a href="logout.php"><button type="submit">Log Out</button></a>
    <h1>Order Summary</h1>
    
    <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
    <form action="tax_calculation.php" method="POST">
        
        <button type="submit">Confirm Purchase</button>
    </form>
</body>
</html>