<?php


include'dbconn.php';

if(isset($_POST['submit'])){
    $fname=$_POST['f_name'];
    $lname=$_POST['l_name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if ($password == $cpassword) 
    {
		$sql = "SELECT * FROM student_books WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) 
        {
			$sql = "INSERT INTO `student_books` (`studentID`, `firstname`, `lastname`, phone, `email`, password) VALUES ('NULL', '$fname', '$lname', '$phone', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result==1) 
            {
				?>
                <script>alert('Successfully Signed in!')</script>
                <?php
			}
		} 
        else {
                ?>
                <script>alert('Email already exists!')</script>";
                <?php
		}
		
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
    <title>Sign Up here</title>

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
        padding: 3% 10% 7%;
    }

    /* SignUp Button */

    .main-buttons{
        margin: 15% 3% 5% 0;
        width:180px;
        height: 50px;
        font-size: 23px;
    }


    /* SignUp form */

    .modal-body{
        padding: 16px 25px;
    }

    input{
        margin: 3% 0;
    }

    .input-group-phone{
        margin: 3% 0 4% 0!important;
    }

    .dropdown{
        width:65px!important;
        position: relative;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
        border: 1px solid rgba(0,0,0,.2);
        padding-left: 10px;
    }

    .phno{
        margin: 0;
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

    input:focus{
    outline: 0 0 0 0  !important;
    box-shadow: 0 0 0 0 !important;
    }

    button:focus{
    outline: 0 0 0 0  !important;
    box-shadow: 0 0 0 0 !important;
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
                <h2>Welcome</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 title">
                    <h1>Issue any book you want.<br>Sign Up for free.</h1>
                    <button type="button" class="btn btn-lg btn-outline-light main-buttons" data-toggle="modal" data-target="#signup-form">Sign Up</button>
                    <a class="btn btn-lg btn-outline-light main-buttons" href="loginform.php" role="button">Log In</a>
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
                
            </div>
        </div>
    </section>

    <!-- Popup- Signup -->

    <section id="popups">

        <div class="modal fade" id="signup-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered popup-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="">Sign Up</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                        <form action="#" class="signup-form" method="POST" name="signupform">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="First name" name="f_name" onkeypress="return onlyAlphabetKey(event)" required data-toggle="tooltip" data-placement="top" title="Should be only alphabets">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Last name" name="l_name" onkeypress="return onlyAlphabetKey(event)" required data-toggle="tooltip" data-placement="top" title="Should be only alphabets">
                                    </div>
                                </div>
                                
                                <div class="input-group form-group input-group-phone">
                                    <div class="input-group-prepend">
                                    <select class="dropdown" id="inputGroupSelect02">
                                        <option>+91</option>
                                        <option>+10</option>
                                        <option>+11</option>
                                        <option>+12</option>
                                        <option>+13</option>
                                        <option>+14</option>
                                        <option>+15</option>
                                        <option>+16</option>
                                        <option>+17</option>
                                        <option>+18</option>
                                        <option>+19</option>
                                        <option>+20</option>
                                    </select>
                                    </div>
                                        <input class="form-control phno" type="tel" pattern="[0-9]{10}" name="phone" maxlength="10" placeholder="Phone Number" required onkeypress="return onlyNumberKey(event)" data-toggle="tooltip" data-placement="top" title="Should be only 10 digits">
                                    
                                </div>
                                
        
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Email ID" name="email" required>
                                </div>
        
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelpBlock" placeholder="Password" required>
                                </div>
        
                                <div class="form-group">
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" aria-describedby="passwordHelpBlock" placeholder="Confirm Password" required>
                                </div>
                        
                                <div class="form-group form-check check">
                                    <input type="checkbox" class="form-check-input" id="signup-checkbox" required>
                                    <label class="form-check-label" for="signup-checkbox"> I accept all the terms and conditions.</label>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-danger btn-block signup-form-btn" onclick="return passwordconfirm()">Create Account</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

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

<!-- JavaSript Section -->
<script>

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    
    function onlyNumberKey(evt) {
        var ASCIICode = evt.which
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    function onlyAlphabetKey(evt1){
        var ASCIICode = evt1.which
        if (ASCIICode > 31 && (ASCIICode < 65 || ASCIICode > 90) && (ASCIICode < 97 || ASCIICode > 122))
            return false;
        return true;
    }

    function passwordconfirm(){
        var pass = document.getElementById("password").value;
        var cpass = document.getElementById("cpassword").value;
        if(pass == cpass){
            return true;
        }
        else{
            alert("Password not matched!");
            return false;
        }
    }
</script>
