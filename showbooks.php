<?php  

session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: loginform.php");
}

$sid=$_SESSION['ID'];

include'dbconn.php';



?>
<!-- HTML SECTION -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Books</title>

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
        background-image: url('https://getwallpapers.com/wallpaper/full/8/7/e/575486.jpg');
    }

    .container-fluid{
        padding: 3% 10% 3%;
    }

    h2{
        font-weight: 600;
        font-size: 2.3rem;
        margin: 2% auto 5%;
        text-align: center;
        color: #D4ECDD;
    }

    .sub-heading{
        margin:0 0 2% 0;
    }

    .book-count{
        font-size: 1.5rem;
        color: white;
        text-align: center;
    }

    .my-buttons{
        display:block;
        margin:2% 6% 0;
        text-align:right;
    }

    .my-btn{
        margin: 5% 3% 3% 0;
        width: 100px;
    }

    /* TABLE */

    td,th{
        font-size:1.5rem;
    }

    td{
        color:white;
    }

    /* Footer Section */

    #footer{
        padding: 3% 15% 2%;
        text-align: center;
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
        font-size: 15px;
    }

    @media (max-width: 1000px){
        #main-content{
            text-align: center;
        }
        .my-buttons{
            text-align: center;
        }
    }

</style>
<body>

    <section id="main-content">

        <div class="container-fluid">

            <div class="row heading">
                <h2><?php echo $_SESSION['fname']." ".$_SESSION['lname']."'s data."; ?></h2>
            </div>

            <div class="row sub-heading">
                <p class="book-count">You currently have 
                    <?php 
                        $count_query=mysqli_query($conn,"SELECT COUNT(*) FROM books where studentID='$sid'");
                        while($count=mysqli_fetch_array($count_query)){
                            echo $count['COUNT(*)'];
                        }
                    ?>
                books issued.</p>
            </div>

            <div class="row display-table">
                
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Book ID</th>
                            <th scope="col">Book Name</th>
                            <th scope="col">Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php

                            include'dbconn.php';

                            $sql = mysqli_query($conn, "SELECT * FROM books where studentID='$sid'");
                            while($row2 = mysqli_fetch_array($sql))
                            {
                        
                        ?>
                            <td><?php echo $sid ?></td>
                            <td><?php echo $row2['BookID']; ?></td>
                            <td><?php echo $row2['BookName']; ?></td>
                            <td><?php echo $row2['Author']; ?></td>
                        </tr>
                        <?php } ?>   
                    </tbody>
                </table>   
            </div>

        </div>
    </section>
    
    
    <section id="buttons">

        <div class="row my-buttons">
            <a class="btn btn-outline-light my-btn" href="books.php" role="button">Back</a>
            <a class="btn btn-outline-light my-btn" href="logout.php" role="button">Log Out</a>
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

