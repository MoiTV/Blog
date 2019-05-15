<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Blog</title>
</head>
<body>

   <section>
        <header class="py-2 bg-primary text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1><i class="fas fa-blog"></i>Blog<h1>
                    </div>
                </div>
            </div>
        </header>

        <div class="py-4 mb-4 bg-light">
            <div class="container">
                <div class="row">
        
                </div>
            </div>
        </div>

        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                header('Location: dashboard.php');
                            } 
                            else {
                                echo '<form action="includes/login.inc.php" method="post">
                                <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="mailuid" class="form-control mr-2">
                                </div>

                                <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pwd" class="form-control mr-2">
                                </div>

                                <button type="submit" name="login-submit" class="btn btn-primary btn-block">Login</button>
                                </form>

                                <a href="signup.php" class="nav-link"> SignUp</a>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    
   </section>