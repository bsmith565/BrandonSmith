<?php

session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$password = isset($_SESSION['password']) ? $_SESSION['password'] : "";
if ((strlen($username) == 0) || ($username != $password)) {
    print "<script>location.href='login.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Page</title>
</head>
<body>
    <a href="logout.php"><button type="submit">Log Out</button></a>
    <h1>Shop Items</h1>
    <form action="order_summary.php" method="POST">
        <div>
            <p>Item 1 - $1000</p>
            Quantity: <input type="number" name="item1" value="0" min="0">
        </div>
        <div>
            <p>Item 2 - $600</p>
            Quantity: <input type="number" name="item2" value="0" min="0">
        </div>
        <div>
            <p>Item 3 - $50</p>
            Quantity: <input type="number" name="item3" value="0" min="0">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>