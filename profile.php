<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <title>Blog</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">Blog</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="dashboard.php" class="nav-link active">DashBoard</a>
                    </li>

                    <li class="nav-item px-2">
                        <a href="dashboard.php" class="nav-link">Post</a>
                    </li>

                    <li class="nav-item px-2">
                        <a href="client.php" class="nav-link">Chat</a>
                    </li>

                    <li class="nav-item px-2">
                        <a href="profile.php" class="nav-link">Profile</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user">Welcome <?php echo $_SESSION['username']; ?></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="profile.php" class="dropdown-item">
                                <i class="fas fa-user-circle"></i>Profile</a>

                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i>Settings</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="includes/logout.inc.php" class="nav-link">
                            <i class="fas fa-user-times"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fas fa-user"></i>Edit Porfile</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- actions -->

    <section id="actions" class="py-4 mb -4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="dashboard.php" class="btn btn-dark btn-block">
                        <i class="fas fa-arrow-left"></i> Back to DashBoard
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#" class="btn btn-success btn-block">
                        <i class="fas fa-lock"></i>Change Password
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#" id="deleteAccount" class="btn btn-danger btn-block">
                        <i class="fas fa-trash"></i>Delete Account
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Posts -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="name">Bio</label>
                                    <textarea class="form-control" name="editor1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora distinctio deserunt, impedit obcaecati explicabo architecto repellendus quaerat ad ab, temporibus modi, quae amet optio voluptas voluptates! Ullam perspiciatis asperiores aspernatur quam necessitatibus illo nostrum quaerat voluptas sequi corporis? Excepturi possimus dolore in eos blanditiis reprehenderit quisquam, suscipit sint unde iste.</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3>Your Avatar</h3>
                    <img src="img/avatar.png" alt="" class="d-block img-fluid mb-3">
                    <button class="btn btn-primary btn-block">Edit Image</button>
                    <button class="btn btn-danger btn-block">Delete Image</button>
                </div>
            </div>
        </div>
    </section>

    <script>
    //   let del = document.querySelector("#deleteAccount");
    //     del.addEventListener('submit', ale());

    //     function ale() {
    //         confirm("Deleting Profile: Are you sure?");
    //     }

        
      
    </script>

 <?php require('footer.php');?>