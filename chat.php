<?php session_start();
header("Content-type: application/json");   
require_once('connect.php'); // $db
date_default_timezone_set('UTC');
////////////////////////////////////
define("OPERATIONAL", true);///////
//define("OPERATIONAL", false);///////
////////////////////////////////////
$user = $_SESSION['username'];


$json['success']=false;
$json['result']="";
$json['messages']=[];

if(!$db){ 
    $json['success']=false;
    $json['result']="Connection Failure";
    echo json_encode($json);
    exit;
}
$currentTime = time();
$session_id = session_id();

$lastPoll = isset($_SESSION['lastPoll']) ?
    $_SESSION['lastPoll'] : $currentTime;

$action = isset($_SERVER['REQUEST_METHOD']) &&
    ($_SERVER['REQUEST_METHOD']=='POST') ?
    'send' : 'poll';

switch($action) {
  //poll//////////////////////////////////////////////////////
case 'poll':
    $sql = "SELECT id, message, sent_by, date_created,user_name FROM chatlog 
        WHERE date_created >= {$lastPoll}";

    $newChats=[];
    if($res = $db->query($sql)) {
        while($row = $res->fetch_assoc()) {
            $chat=[];
            $db_session_id = $row['sent_by'];
            $msg = $row['message'];
            $date_created = $row['date_created'];
            $user_name = $row['user_name'];

            if($session_id == $db_session_id) {
                $chat['sent_by'] = 'self';
            }else {
                $chat['sent_by'] = 'other';
            }
            $chat['date_created'] = $date_created;
            $chat['message'] = $msg;
            $newChats[] = $chat;
        }
    }

    $_SESSION['lastPoll'] = $currentTime;

    $json['success']=true;
    $json['messages'] = $newChats;
    break; 
  ////////////////////////////////////////////////////////////
  //send//////////////////////////////////////////////////////
  case 'send':
      $message = isset($_POST['message']) ? $_POST['message'] : '';
      $message = htmlspecialchars(strip_tags($_POST['message']));

      if(OPERATIONAL){
         //$stmt->execute(); ///////////TOGGLE Operational/NonOp
          $sql = "INSERT INTO chatlog 
                  (message, sent_by, date_created)
                  VALUES('{$message}', '{$session_id}', $currentTime)";
          $db->query($sql);
          $json['success'] = true;
      }
      else {
        $json['success']=false;
        $json['result']="Connection Failure";
      }

      break;
}
echo json_encode($json);
exit;
?>
