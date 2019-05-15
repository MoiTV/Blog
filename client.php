<?php session_start();?>
<html lang="en">

<head>
    <title>Blog chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
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
    <div class='container-fluid'>
        <div class='row' style='margin-bottom:10%;'>
            <div class='col-sm-3'></div>
            <div class='col-sm-6' id='content'> </div>
            <div class='col-sm-3'></div>
        </div>

        <div class='row' style='position:fixed; bottom:10px;width:100%;'>
            <div class='col-sm-12'>
                <form id='sendForm'>
                    <div class='input-group form-group'>
                        <input type='text' id='chatMessage' class='form-control'>
                        <div class='input-group-btn'>
                            <button class='btn btn-outline-primary btn-block' type='submit' id='sendMessage'>Send</button>
                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>


    </div>
    <!-- end container-fluid -->

    <script>
        var lastDate = '';
        $(document).ready(function() {
            pollServer();

        }); // end ready

        var pollServer = function() {
                $.get('chat.php', function(data) {
                    if (!data.success) {
                        var err = "<div class='box3'>" + data.result + "</div>";
                        $("#content").append(err);
                        console.log('error polling' + data.result);
                        return;
                    }
                    if (!data.messages) return;

                    console.log('--polling---');
                    console.log('#ofMsgs ' + data.messages.length);
                    console.log('------------');

                    $.each(data.messages, function(i) {
                        var chat;
                        if (this.sent_by == 'self') { //sent by you
                            chat = "<div class='box3 sb13'>" + this.message + "</div>";
                        } else { // sent by someone else
                            chat = "<div class='box4 sb14'>" + this.message + "</div>";
                        }

                        if (lastDate != this.date_created) {
                            $("#content").append(chat);
                            lastDate = this.date_created;
                            $('html,body').animate({
                                    scrollTop: $(document).height()
                                },
                                'slow');
                        }
                    });
                    setTimeout(pollServer, 3000);
                }); // end get
            } //end pollServer

        $("#sendForm").on('submit', function(e) {
            e.preventDefault();
            var message = $("#chatMessage").val();
            var user = $("#user").val();
            message = $.trim(message);
            if (message.length > 0) {
                $.post('chat.php', {
                    "message": message
                }, function(data) {
                    if (!data.success) {
                        console.log('error sending message: ' + message);
                        var err = "<div class='box3'>" + data.result + "</div>";
                        $("#content").append(err);
                    } else {
                        console.log('message sent: ' + message);
                        $('#chatMessage').val('');
                    }
                }); // end post
            }
            $('#chatMessage').val('');
            return (false);
        }); // end eventListener
    </script>

</body>

</html>