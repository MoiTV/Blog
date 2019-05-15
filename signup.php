<?php
    require("header.php");
?>

    <main>
        <?php 
             if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                     echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET['error'] == "invalidemail") {
                    echo "<p>Invalid username and e-mail</p>";
                }
                else if ($_GET['error'] == "invaliduid") {
                    echo "<p>Invalid username</p>";
                }
                else if ($_GET['error'] == "invalidpwd") {
                     echo "<p>Invvalid Password</p>";
                }
                else if ($_GET['error'] == "invalidpwdcheck") {
                     echo "<p>Password don't match</p>";
                }
                else if ($_GET['error'] == "userTaken") {
                     echo "<p>user taken</p>";
                }
                else if ($_GET['signup'] == "success") {
                    echo "<p>Signup successful</p>";
               }
            }
            
        ?>


    <section class="p-5">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 d-none d-lg-block">
                        <h1 class="display-4">Build
                            <strong>social profiles</strong> and gain revenue
                            <strong>profits</strong>
                        </h1>
                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fas fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                            afsadl adafsd sdfsis fsdfs sdfsd what dfare o yosd ing iin tieh a f
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fas fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="p-4 align-self-start">
                                <i class="fas fa-check fa-2x"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, tempore iusto in minima facere dolorem!
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card bg-primary text-center card-form">
                            <div class="card-body">
                                <h3 class="text-white">Sign Up Today</h3>
                                <p class="text-white">Please fill out this form to register</p>
                                <form action="includes/signup.inc.php" method="post">

                                    <div class="form-group">
                                    <input type="text" name="uid" placeholder="username" class="form-control form-control-lg">
                                    </div>

                                    <div class="form-group">
                                    <input type="text" name="mail" placeholder="email" class="form-control form-control-lg">
                                    </div>

                                    <div class="form-group">
                                    <input type="password" name="pwd" placeholder="password" class="form-control form-control-lg">
                                    </div>

                                    <div class="form-group">
                                    <input type="password" name="pwd-repeat" placeholder="repeat-password" class="form-control   form-control-lg">
                                    </div>
   
                                    <input type="submit" name="signup-submit" class="btn btn-outline-light btn-block" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section class="p-5">



    </main>


<?php
    require("footer.php");
?>