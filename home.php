<?php 
session_start();

include("php/config.php");
if(!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">

        <?php 
        $id = $_SESSION['id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE Id = $id");

        while($result = mysqli_fetch_assoc($query)) {
            $res_uname = $result['Username'];
            $res_age = $result['Age'];
            $res_email = $result['Email'];
            $res_id = $result['Id'];

        }

        echo "<a href='edit.php?Id=$res_id'>Change Profile</a>"

        ?>

            
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_uname; ?></b>, welcome</p>
                </div>

                <div class="box">
                    <p>Your email is <b><?php echo $res_email; ?></b>, welcome</p>
                </div>
            </div>

            <div class="bottom">
                <div class="box">
                    <p>And your are <b><?php echo $res_age; ?> years old</b>.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>