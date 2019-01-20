
<?php

    require_once ('dbconnect.php');

    if (isset($_POST['submit'])) {
        
        $error = array();

        if (!isset($_POST['key']) || strlen(trim($_POST['key'])) < 1) {
			$error[] = 'key is Missing';
        }

        if (empty($error)){

             $key = $_POST['key'];

             $hash_value = md5($key);

             $query = "SELECT * FROM hash_value WHERE Md5 = '$hash_value'";

             $result = mysqli_query($conn, $query);

             if ($result) {
                 
                if (mysqli_num_rows($result) == 1){

                    $key_id = mysqli_fetch_assoc($result);

                    $id = $key_id['Md5'];

                    echo 'Your Input key = ' .$key;
                    echo '<br>';
                    echo 'Key Found !  = '. $id;
                }
                else{

                    echo 'Key not found :-( ';
                }

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
        <h1>Find Key</h1>
        <form action="find.php" method="post">
            <input type="text" name="key" placeholder="Enter Your Key">
            <button type="submit" name="submit">find</button>
        </form>

        <a href="index.php">Add key</a>
    </div>
</body>
</html>