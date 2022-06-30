<?php
include('includes/config.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

<body>
    <?php
    for ($i = 0; $i < 151; $i++) {
        mysqli_query($con, "INSERT INTO ids VALUES ($i,0)");
    }
    ?>
    <style>
        .present {
            background-color: #000;
            color: #fff;
        }

        .notPresent {
            background-color: #373737;
            color: #fff;
        }

        .id {
            text-align: center;
        }

        .present p,
        .notPresent p,
        .id p {
            width: 100%;
            text-align: center;
        }
    </style>
</body>

</html>