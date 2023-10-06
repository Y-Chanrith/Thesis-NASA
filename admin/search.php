<?php
// Include your database connection code here (e.g., using mysqli or PDO).
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];

    // Perform the search query
    $sql = "SELECT * FROM customer inner join transaction on customer.cus_id=transaction.cust_id WHERE firstname LIKE '%$search%'";
    $result = mysqli_query($con, $sql); // $connection is your database connection

    // Check for errors
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Display the search results
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Product Name: " . $row["firstname"] . "<br>";
        echo "Product Description: " . $row["lastname"] . "<br>";
        // Add more fields as needed
    }

    // Close the database connection
    mysqli_close($con);
}
?>
