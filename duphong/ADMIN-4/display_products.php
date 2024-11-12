<?php
include 'db_connection.php'; // File chứa thông tin kết nối CSDL

$sql = "SELECT * FROM `product-info`";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td><input type='radio' name='selectedProduct' value='" . $row['ProductCode'] . "' 
            onclick='fillForm(\"" . htmlspecialchars($row['ProductCode']) . "\", \"" . htmlspecialchars($row['NameProduct']) . "\", \"" . htmlspecialchars($row['Price']) . "\", 
            \"" . htmlspecialchars($row['DiscountPrice']) . "\", \"" . htmlspecialchars($row['ImagePath']) . "\", \"" . htmlspecialchars($row['SKU']) . "\", 
            \"" . htmlspecialchars($row['Color']) . "\", \"" . htmlspecialchars($row['Dimensions']) . "\", \"" . htmlspecialchars($row['Material']) . "\", 
            \"" . htmlspecialchars($row['Policies']) . "\", \"" . htmlspecialchars($row['ImagePathSP1']) . "\", \"" . htmlspecialchars($row['ImagePathSP2']) . "\", 
            \"" . htmlspecialchars($row['Quantity']) . "\")'></td>";
    echo "<td>" . htmlspecialchars($row['ProductCode']) . "</td>";
    echo "<td>" . htmlspecialchars($row['NameProduct']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
    echo "<td>" . htmlspecialchars($row['DiscountPrice']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ImagePath']) . "</td>";
    echo "<td>" . htmlspecialchars($row['SKU']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Color']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Dimensions']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Material']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Policies']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ImagePathSP1']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ImagePathSP2']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Quantity']) . "</td>";
    echo "</tr>";
}
?>
