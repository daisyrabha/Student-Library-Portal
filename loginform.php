<?php  

session_start();
if(isset($_POST['login'])){

    $_SESSION['Logged']="No";
    $email = $_POST['email'];
    $password = $_POST['password'];
        
    include'dbconn.php';
    
    $query = "SELECT * FROM student_books WHERE email='$email' AND password='$password'";
    $data = mysqli_query($conn, $query);

    if($info = mysqli_fetch_array($data))
    {
        $QueryPwd=$info['password'];
        if( $password ==$QueryPwd ) {

            $_SESSION['Logged_expert']="Yes";
            $_SESSION['ID']=$info['studentID'];
            $_SESSION['fname']=$info['firstname'];
            $_SESSION['lname']=$info['lastname'];

            ?>
            <script>
                alert('Successfully Logged in!');
            </script>
            <?php                                
            header("Location: books.php");
            die;
        }
    }
    else
    {
        ?>
        <script>alert('Wrong Email or Password')</script>
        <?php
    }

}

?>

<!-- HTML SECTION -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In here</title>

    <!-- Font styling link (Google fonts)-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;900&family=Ubuntu&display=swap" rel="stylesheet">

    <!-- Bootstrap links-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Icons link (Font Awesome)-->

  <script src="https://kit.fontawesome.com/3199ca1fdd.js" crossorigin="anonymous"></script>

  
</head>
<style>
    body{
        font-family: 'Montserrat', sans-serif;
    }

    /* Heading Section */

    .heading h2{
        margin: 2% auto ;
    }
    #title{
        background-image: url('https://getwallpapers.com/wallpaper/full/4/f/e/575457.jpg');
        background-size: 100% 100%;
        color: white;
    }

    h1{
        font-weight: 900;
        font-size: 3.5rem;
        
    }
    h2{
        font-weight: 600;
        font-size: 2.3rem;
        line-height: 1.5;
        color: #D4ECDD;
    }
    h3{
        text-align: center;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        font-size: 1.5rem;
    }

    .images{
        padding-right: 0;
    }

    .carousal-image{
        height: 250px;
        width: 100%;
    }

    .carousel-item{
        padding: 7% 14%;
    }

    .container-fluid{
        padding: 3% 10% 5%;
    }

    /* LogIn Buttons */

    .main-buttons{
        margin: 15% 3% 5% 0;
        width:180px;
        height: 50px;
        font-size: 23px;
    }

    a{
        color:white;
        font-size:1.2rem;
    }

    a:hover{
        color:white;
    }

    .back-icon{
        margin: 0 10px 0 0;
        cursor: pointer;
        color: white;
    }

    /* Login form */

    .modal-body{
        padding: 16px 25px;
    }

    input{
        margin: 3% 0;
    }

    .check{
        text-align: left!important;
    }

    .check input{
        width: 18px;
        height: 18px;
    }

    .form-check-label{
        padding-left: 8px;
        padding-top: 2px;
    }

    .popup-modal{
        width: 450px;
    }

    .login-form{
        margin: 5% 0 0 0;
    }

    input:focus{
    outline: 0 0 0 0  !important;
    box-shadow: 0 0 0 0 !important;
    }

    .input-group{
        margin:0 0 7% 0;
    }

    .input-group-text{
        background-color: #dc3545;
        color: white;
        width: 50px;
        border: 1px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .my-login-input{
        margin: 0;
    }

    /* Features Section */

    #features{
    padding: 7% 14%;
    background-color: white;
    position: relative;
    background-image:url('https://getwallpapers.com/wallpaper/full/8/7/e/575486.jpg');
 
    }

    .feature-box{
        text-align: center;
        padding: 4.5%;
    }

    .feature-text{
        color: white;
    }

    .icon{
        color: #adced4;
        margin-bottom: 1rem;
    }

    .icon:hover{
        color:#7da8b1;
    }

    /* Footer Section */

    #footer{
        padding: 7% 15% 5%;
        text-align: center;
        background-color: black;
    }

    .social-icon{
        margin: 20px 10px;
        cursor: pointer;
        color: #adced4;
    }

    .social-icon:hover{
        color: #7da8b1;
    }

    p{
        color: white;
        font-size: 20px;
    }

    @media (max-width: 1000px){
        #title{
            text-align: center;
        }
    }

</style>
<body>


    <!-- Heading- Main Content -->

    <section id="title">
    
        <div class="container-fluid">

            <div class="row heading">
                <h2>Welcome Student!</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 title">
                    <h1>Login now to issue your new book.</h1>
                    <!-- <a class="btn btn-lg btn-outline-light main-buttons" href="signup.php" role="button">Sign Up</a> -->
                    <button type="button" class="btn btn-lg btn-outline-light main-buttons" data-toggle="modal" data-target="#login-form">Log In</button>
                    <br>
                    <a href="signup.php"><i class="back-icon fas fa-arrow-left"></i>Back to SignUp</a>
                    
                </div>

                <div class="col-lg-6 images">
                    <div id="my-carousel" class="carousel slide" data-ride="carousal">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="carousal-image" src="https://www.bellevuerarecoins.com/wp-content/uploads/WE-Buy-Comic-Books.png" alt="comics">
                                <h3>Read Comics.</h3>
                            </div>
                            <div class="carousel-item">
                                <img class="carousal-image" src="https://png2.cleanpng.com/sh/4f0cebf5555fe9f25a9aa5d338f34344/L0KzQYm3VMA4N5V0j5H0aYP2gLBuTfJwd5wyfNd8a4TygH7AgfxteJJ1feQ2aX7pf8P0ggRqd58yiNp4dHAwRbLqWMdkbWY9UKMBNkixRIa8UcU4PWU2TaQ8MEi7RoK6VcU4PF91htk=/kisspng-book-desktop-wallpaper-information-photo-5ac87ce5881668.4551575415230886135574.png" alt="classics">
                                <h3>Read the Classics.</h3>
                            </div>
                            <div class="carousel-item">
                                <img class="carousal-image" src="https://png2.cleanpng.com/sh/53811cce059edcc0ceb07eb6295a7bb3/L0KzQYm3WcA2N5JwiZH0aYP2gLBuTgRpbV5nh9H0LYTrebbtTgZwdKZyfZ9Cb4LvdH7pjB9sNZVmkZ9rb3Bug365TfRwd6MyjNH0eXAwd7n2lfwuapD0gAU2MT26PbT2jPxma6Vuh9C2NXK7doq8VfJmOJUAeaI3MEa4R4W5UcIyPWQ7SaUBNUO8SYO4TwBvbz==/kisspng-the-book-thief-volume-world-book-day-books-2-door-tokyo-ghoul-books-1-7-collection-5b8f955be0d9a0.065742121536136539921.png" alt="manga">
                                <h3>Read Manga.</h3>
                            </div>
                          
                            <div class="carousel-item">
                                <img class="carousal-image" src="https://png2.cleanpng.com/sh/a46b8213a7bfbe64e8fa46d6e346890c/L0KzQYm3VMIyN6F8fZH0aYP2gLBuTfhmaaN4jJ92YXfkirr1hgMufZ9ujNdtLYP3ccXsk71pbZJ3iAY2Y3Bwfcb1ifNifJp0RadqZHK1c4W3gsVkaWE8RqYDM0a7Q4S9UcUzPGQ2S6MAMke3RIe1kP5o/kisspng-hearst-magazines-united-states-hearst-communicatio-5adb2c40b5ca07.4836833615243131527446.png" alt="mangazine">
                                <h3>Read Mangazines.</h3>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#my-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#my-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

            <div class="buttons">
                
            </div>
        </div>
    </section>

    <!-- Popup- Login -->

    <section id="popups">

        <div class="modal fade" id="login-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered popup-modal">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="">Log In</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="#" class="login-form" method="POST">
                        <div class="modal-body">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user my-icons"></i></span>
                                </div>
                                <input type="text" class="form-control my-login-input" name="email" placeholder="Your Email" required>
                            </div>
                            
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control  my-login-input" name="password" placeholder="Password" required>
                            </div>

                            <div class="form-group form-check check">
                                <input type="checkbox" class="form-check-input" id="login-checkbox">
                                    <label class="form-check-label" for="login-checkbox">Remember me</label>
                            </div>
                        </div>
                            
                        <div class="modal-footer">
                            <div class="form-group">
                                <input type="submit" value="Close" class="btn btn-outline-danger btn-lg" data-dismiss="modal">
                            </div>
                            <div class="form-group">
                                    <button type="submit" name="login" class="btn btn-danger btn-lg">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- Features -->

    <section id="features">

        <div class="row">
            <div class="col-lg-4 feature-box">
                <i class="icon fas fa-check-circle fa-4x"></i>
                <h3 class="feature-text">Easy to use.</h3>
            </div>
            <div class="col-lg-4 feature-box">
                <i class="icon fas fa-money-check-alt fa-4x"></i>
                <h3 class="feature-text">Free of cost.</h3>
            </div>
            <div class="col-lg-4 feature-box">
                <i class="icon fas fa-book fa-4x"></i>
                <h3 class="feature-text">Infinite books.</h3>
            </div>
        </div>
  
  </section>

    <!-- Footer part -->

    <section id="footer">

        <div class="footer">
            <a href="https://www.facebook.com/"><i class="social-icon fab fa-facebook-square fa-2x"></i></a>
            <a href="https://www.twitter.com/"><i class="social-icon fab fa-twitter-square fa-2x"></i></a>
            <a href="https://www.instagram.com/"><i class="social-icon fab fa-instagram fa-2x"></i></a>
            <a href="https://www.gmail.com/"><i class="social-icon fas fa-envelope fa-2x"></i></a>
        </div>
        <p>Contact Us</p>

    </section>

</body>
</html>
