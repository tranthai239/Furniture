<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT SUM(Quantity) AS total_quantity FROM cart";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_quantity = isset($row['total_quantity']) ? $row['total_quantity'] : 0;
?>

<div class="card">
    <div class="row">
        <div class="col-md-8 col-lg-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <div class="col align-self-center text-right text-muted">
                        <?php echo $total_quantity . " items"; ?>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);
            $total_price = 0;

            while($row = $result->fetch_assoc()) {
                $item_total_price = $row['Price'] * $row['Quantity'];
                $total_price += $item_total_price;
            ?>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2">
                        <img class="img-fluid" src="<?php echo $row['ImagePath']; ?>" alt="Product Image">
                    </div>
                    <div class="col">
                        <div class="row text-muted"><?php echo $row['SKU']; ?></div>
                        <div class="row"><?php echo $row['NameProduct']; ?></div>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <button class="btn-quantity btn-sm btn-light quantity-btn" data-action="decrease" data-id="<?php echo $row['SKU']; ?>">-</button>
                        <input type="text" class="text-center quantity-input mx-2" value="<?php echo $row['Quantity']; ?>" data-price="<?php echo $row['Price']; ?>" readonly>
                        <button class="btn-quantity btn-sm btn-light quantity-btn" data-action="increase" data-id="<?php echo $row['SKU']; ?>">+</button>
                    </div>
                    <div class="col">
                        &euro; <span class="item-total-price"><?php echo number_format($item_total_price, 2); ?></span>
                        <span class="close" data-id="<?php echo $row['SKU']; ?>">&times;</span>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="back-to-shop">
                <a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS <?php echo $total_quantity; ?></div>
                <div class="col text-right">&euro; <span class="total-price"><?php echo number_format($total_price, 2); ?></span></div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                </select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; <span class="final-total-price"><?php echo number_format($total_price + 5, 2); ?></span></div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
