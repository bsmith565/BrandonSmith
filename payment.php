<?php
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$password = isset($_SESSION['password']) ? $_SESSION['password'] : "";
if ((strlen($username) == 0) || ($username != $password)) {
    print "<script>location.href='login.php';</script>";
}

$total = $_SESSION['total'];

function validate_card($card_number) {
    $length = strlen($card_number);
    $prefix = substr($card_number, 0, 2);

    if (($length == 16 && in_array($prefix[0], ['4'])) ||
        ($length == 15 && in_array($prefix, ['34', '37'])) ||
        ($length == 16 && in_array($prefix, range(51, 55)))) {
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $card_number = $_POST['card_number'];
    
   
    
    $card_type = 'Unknown';

    if (substr($card_number, 0, 1) == '4') {
        $card_type = 'VISA';
    } elseif (substr($card_number, 0, 2) == '34' || substr($card_number, 0, 2) == '37') {
        $card_type = 'AMEX';
    } elseif (in_array(substr($card_number, 2, 5), range(51, 55))) {
        $card_type = 'MASTERCARD';
    }

    $validate_card = validate_card($card_number);
    if ($validate_card) {
        $last_four = substr($card_number, -4);
        echo "<p>Your $card_type ending with $last_four has been charged $" . number_format($total, 2) . ".</p>";
    } else {
        echo "<p>Invalid card number. Please try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <a href="logout.php"><button type="submit">Log Out</button></a>
    <title>Payment Processed</title>
</head>
<body>
  <?php if ($validate_card) { ?>
    <a href="index.php"><button>Continue Shopping</button></a>
  <?php } else { ?>  
    <a href="checkout.php"><button>Try Again</button></a>
  <?php } ?>
</body>
</html>
