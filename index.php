<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <a href="/insert.php">Go to insert query</a>
    <p>This is the main page of my website. This is a select query on a mySQL database.</p>


    <?php
    require_once('./mySQLI_connect.php');

    $sql = "SELECT Name FROM People";
    $result = @mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { // return the number of rows in the result
        // output data of each row
        while($row = mysqli_fetch_array($result)) { // returns an array of stings representing the rows, where each key represent a column
            echo "id: " . $row["id"]. " - Name: " . $row["Name"]."<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>
</body>
</html>