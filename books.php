<?php  

session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: loginform.php");
}

$sid=$_SESSION['ID'];

include'dbconn.php';



if(isset($_POST['submitbook'])){
    $query1="INSERT INTO `books` (`studentID`, `BookID`, `BookName`, `Author`) VALUES ('$sid','".$_POST['book_id']."', '".$_POST['bookname']."', '".$_POST['authorname']."')";
    $run1=mysqli_query($conn, $query1);
    if($run1==1){
      
      ?>
      <script>
          alert('Book has been issued successfully');
      </script>

      <?php

      header("Location: showbooks.php");
      die;
   }
}
else{
    

?>
<!-- HTML SECTION -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Your Books</title>

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
        padding: 3% 10%;
    }

    h1{
        font-weight: 900;
        font-size: 3.5rem;
        margin: 2% auto 5%;
        text-align: center;
        color: #D4ECDD;
    }

    h3{
        font-weight: bold;
        font-size: 2rem;
        line-height: 1.5;
        color: white;
    }

    .issue-btn{
        text-align:left;
    }

    .my-btn{
        margin: 5% 3% 3% 0;
        width:200px;
        height: 50px;
        font-size: 23px;
    }

    .my-content{
        padding: 3% 0;
    }

    /* ISSUE FORM */

    .modal-body{
        padding: 16px 25px;
    }

    .popup-modal{
        width: 450px;
    }

    .book-issue-form{
        margin: 5% 0 0 0;
    }

    input:focus{
    outline: 0 0 0 0  !important;
    box-shadow: 0 0 0 0 !important;
    }

    button:focus{
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

    .dropdown{
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        position: relative;
        border-radius: .25rem;
        border: 1px solid rgba(0,0,0,.2);
        padding-left: 10px;
    }

    .my-book-input{
        margin: 0;
    }

    /* LogOut section */

    #logout{
        height:60px;
    }
    .logout{
        margin-right:3%;
        padding-right: 10px;
        float:right;
    }
    .my-logout-btn{
        width: 100px;
    }

    /* Footer Section */

    #footer{
        padding: 5% 15% 3%;
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
        font-size: 20px;
    }

    @media (max-width: 1000px){
        #title{
            text-align: center;
        }
        .issue-btn{
            text-align: center;
        }
    }

</style>
<body>

    <!-- HEADING SECTION -->

    <section id="title">

        <div class="container-fluid">

            <div class="row">
                <h1>Hello, <?php echo $_SESSION['fname']." ".$_SESSION['lname']."."; ?></h1>
            </div>

            <div class="row my-content">
                <h3>Issue your new book.<br>If you have already issued, click on next to display your book.</h3>
            </div>
                
            <div class="row issue-btn">
                <button class="btn btn-lg btn-outline-light my-btn" data-toggle="modal" data-target="#issue-form"><i class="fas fa-sign-in-alt"></i> Issue Book</button><br>
                <a class="btn btn-lg btn-outline-light my-btn" href="showbooks.php" role="button">Next</a>
            </div>    

        </div>

    </section>
    
    <!-- FORM SECTION -->

    <div class="modal fade" id="issue-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="">Issue Your Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="#" class="book-issue-form" method="POST">
                    <div class="modal-body">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                            </div>
                            <input type="text" class="form-control my-book-input" name="bookname" placeholder="Book Name" required>
                        </div>
                        
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book-reader"></i></span>
                            </div>
                            <input type="text" class="form-control  my-book-input" name="authorname" placeholder="Author Name" required>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Book ID" name="book_id" required>
                            </div>
                            <div class="col">
                                <select class="dropdown">Student Name</button>

                                    <option selected>Student Name</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM student_books");
                                    while($option = mysqli_fetch_array($sql))
                                    {
                                    ?>

                                    <option><?php echo $option['firstname']." ".$option['lastname']; ?></option>

                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>

                    </div>
                        
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" value="Close" class="btn btn-outline-danger btn-lg" data-dismiss="modal">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitbook" class="btn btn-danger btn-lg">Done</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- LOGOUT SECTION -->

    <section id="logout">

        <div class="row logout">
            <a class="btn btn-outline-light my-logout-btn" href="logout.php" role="button">Log Out</a>
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

<?php } ?>
