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
    <form method="post" action="index.php">
        <input type="text" name="id">
        <input type="submit" value="click" name="submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $result = mysqli_query($con, "SELECT present FROM ids WHERE id='" . $id . "'");
        if ($row = mysqli_fetch_array($result)) {
            if ($row['present'] == 1) {
                echo ("<p class='text'>ID : " . $id . " Is Already Present </p>");
                display($con);
            } else {
                mysqli_query($con, "UPDATE ids SET present=1 WHERE id='" . $id . "'");
                echo ("<p class='text'>ID : " . $id . " Successfully Updated</p>");
                display($con);
            }
        }
    }
    function display($con)
    {
    ?>
        <table>
            <?php
            $query = mysqli_query($con, "SELECT * FROM ids");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <?php
                    echo ("<td class='id'><p>" . $row['id'] . "</p></td>");
                    if ($row['present'] == "1") {
                        echo ("<td class='present'><p> PRESENT </p></td>");
                    } else {
                        echo ("<td class='notPresent'><p> NOT PRESENT </p></td>");
                    }
                    ?>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }
    ?>
    <style>
        .present {
            background-color: #007bff;
            color: #fff;
        }

        .notPresent {
            background-color: #373737;
            color: #fff;
        }

        .id {
            text-align: center;
            background-color: #EF4343;
        }

        .present p,
        .notPresent p,
        .id p {
            width: 100%;
            text-align: center;

        }

        table,
        form,
        .text {
            width: 80vw;
            position: relative;
            left: 10vw;
            text-align: center;
        }

        form,
        .text {
            font-size: 2rem;
        }

        input {
            padding: 10px;
            border: 2px solid #EF4343;
        }
    </style>
</body>

</html>