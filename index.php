
<?php

    require_once ('dbconnect.php');

    if (isset($_POST['submit'])) {

       $error = array(); 

       if (!isset($_POST['key']) || strlen(trim($_POST['key'])) < 1) {
			$error[] = 'key is Missing';
        }
        
        if (empty($error)) {

            $key = $_POST['key'];

            $hash_value = md5($key);

            $query = "INSERT INTO hash_value (Md5) VALUES ('$hash_value')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '';
            }
            else{
                echo "<script>alert('Failed added !');</script>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{ width: 960px; margin: 0 auto; }
        .container form{ padding-bottom: 25px; }
        .container a{ color: #DD5044; }
    </style>
</head>
<body>

    <div class="container">
        <h1>MD5 Hasher</h1>
        <form action="index.php" method="post">
            <input type="text" name="key" placeholder="Enter Your Key">
            <button type="submit" name="submit">Add to Database</button>
        </form>

        <a href="find.php">Find key</a>
    </div>

</body>
</html>