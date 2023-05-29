<?php



include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the form data
    $name = $_GET['name'];
    $roll = $_GET['roll'];
    $class = $_GET['class'];

    $conn = new mysqli($servername, $username, $password, $database);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert the new data
    $sql = "INSERT INTO crud (id, name, roll, class) VALUES ('', '$name', '$roll', '$class')";

    if ($conn->query($sql) === true) {
        echo "New data added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("Location: index.php");
    die();
}

//UPDATE `crud` SET `id`='[value-1]',`name`='[value-2]',`roll`='[value-3]',`class`='[value-4]' WHERE 1


?>