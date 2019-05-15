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

                            <a href="setting.html" class="dropdown-item">
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
                    <h1><i class="fas fa-cog"></i> Dashboard</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- actions -->

    <section id="actions" class="py-4 mb -4 bg-light">
        <div class="container">
            <div class="row">
            <div class="col-md-4">
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
                        <i class="fas fa-plus"></i>Add Post
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="client.php" class="btn btn-success btn-block">
                        <i class="fas fa-plus"></i>Chat
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="profile.php" class="btn btn-warning btn-block">
                        <i class="fas fa-plus"></i>Profile
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card pt-2">
            <div class="card-header text-center"><h1>Recent Post</h1></div>
                <div class="card-body">
                    <?php 
                        require_once('connect.php');
                        $sql = "SELECT * FROM posts";

                        

                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                             echo '<table class="table table-striped">';
                             echo '<thead class="thead-dark">';
                               echo '<tr>';
                                 echo '<th>#</th>';
                                 echo '<th>Title</th>';
                                 echo '<th>Body</th>';
                                   echo '<th>Date</th>';
                                   echo '<th>Publish by</th>';
                                echo '</tr>';
                             echo '</thead>';

                            echo '<tbody>';
                            echo     '<tr>';
                            echo       "<td>{$row['id']}</td>";
                            echo      "<td>{$row['title']}</td>";
                            echo      "<td>{$row['body']}</td>";
                            echo        "<td>{$row['publish_date']}</td>";
                            echo        "<td>{$row['name']}</td>";
                            echo    '</tr>';
                            echo '</tbody>';
                            echo '</table>';
                            
                            }
                        } else {
                            echo "0 results";
                            mysqli_close($db);
                        }
                        
                    ?>
                </div>
        </div>
    </section>

    <div class="modal fade" id="addPostModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Add Post</h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="dashboard.php" method="post">
                        <div class="form-group">
                            <label name="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" placeholder="submit">
                        </div>
                </form>
            </div>
        </div>
    </div>

<?php require("footer.php"); 

  $title = $_POST['title'];
  $body = $_POST['body'];
  $name = $_SESSION['username'];

if (!empty($title) && !empty($body) && !empty($name)){
  $sql = "INSERT INTO posts (title, body, name) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($db);
            mysqli_stmt_execute($stmt);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: dashboard.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $title, $body, $name);
                mysqli_stmt_execute($stmt);
                header("Location: dashboard.php?post=success");
                exit();
            }
        } else {
            mysqli_close($db);
        }
?>

