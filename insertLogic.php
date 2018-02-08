<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: C
 * Date: 2018-02-08
 * Time: 3:27 PM
 */

if(isset($_POST['submit'])){ // if the submit button was pressed on the form
    $data_missing = array();

    if(empty($_POST['nameInput'])){
        $data_missing[] = "Name";
    }
    else{
        $name = trim($_POST['nameInput']); // trim removes whitespace
    }

    if(empty($data_missing)){
        require_once ('./mySQLI_connect.php');

        $query = " INSERT INTO People (NAME) VALUES (?)";

        $statement= mysqli_prepare($conn,$query); // This is a prepared statement.

        mysqli_stmt_bind_param($statement,"s",$name);/* With this statement, we bind the value stored in
                                                                    $name to the ? in the above SQL query. The "s" argument
                                                                    tells us that we are referring to a string with the
                                                                    ?, which should align with the SQL schema.
                                                                    Possible arguments are:
                                                                    i : Integers
                                                                    d: Doubles
                                                                    b: Blobs
                                                                    s: Strings ( most stuff)
                                                                     */
        mysqli_stmt_execute($statement);

        $affected_rows = mysqli_stmt_affected_rows($statement);

        if($affected_rows == 1){ // Rows are entered on at a time, so we can use this to ensure that the row was inserted
            echo 'Student Entered';
            mysqli_stmt_close($statement);
            mysqli_close($conn);
        }
        else{
            echo "Error Occurred. <br />";
            mysqli_stmt_close($statement);
            mysqli_close($conn);
        }
    }
    else{
        echo "You need to enter the following data. <br/>";
        foreach($data_missing as $missing){
            echo "$missing <br />";
        }
    }
}
else{
    echo "You shouldn't be here if you submitted the form correctly..";
}
?>
<form action="insertLogic.php" method="post">
    <label for="nameInput">Enter a name</label>
    <input type="text" name="nameInput" id="nameInput"/>
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>




