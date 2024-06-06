<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

         <?php 
         
         include("php/config.php");
         
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            // verifying the unique email

            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email = '$email'");

            if(mysqli_num_rows($verify_query) !=0 ){
                echo "<div class='message' style='text-align: center;
                background: #f9eded;
                padding: 15px 0px;
                border: 1px solid #699053;
                border-radius: 5px;
                margin-bottom: 10px;
                color: red;'>
                <p>This email is already registered, Try another One Please</p>
                </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            }
            else{
                mysqli_query($con,"INSERT INTO users(Username, Email, Age, Password) VALUES('$username', '$email', '$age', '$password')") or die("Query Failed");

                echo "<div class='message'>
                <p>Account Created Successfully</p>
                </div> <br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
            }

         } else{

         ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" >
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" >
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" >
                </div>
                
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" >
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
                <div class="links">
                    Already have an account? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>

        <?php } ?>
    </div>
</body>
</html>