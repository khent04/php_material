<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "khent04";
$dbname = "Esupermarketph";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$receiver = $_SESSION['user'];
$sql = "SELECT * from Messages where receiver = '$receiver' ";
$result = $conn->query($sql);
// $data =  json_encode($result->fetch_assoc());
// $data =  $result->fetch_assoc();
// echo "---> ".$data['sender'];


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

    <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Messages</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <!-- <li><a href="#">Messages</a></li> -->
        <li><a href="messages.php"><i class="large material-icons tooltipped" data-position="bottom" data-delay="10" data-tooltip="Messages">message</i></a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav" style="left: -250px;">
        <li><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


    <!-- Page Layout here -->
    <div class="row">

      <div class="col s12 m4 l3 z-depth-1"> <!-- Note that "m4 l3" was added -->
      <br/>
      <i class="material-icons prefix">mode_edit</i>
      <a class="modal-trigger" href="#modal1" style="color:orange;">Create new message</a>
      <br/><br/>
      <?php
        while($row = $result->fetch_assoc()) {
            echo '<i>' . $row['sender'] . '</span> &nbsp;';
            echo '<label>' .$row['subject']. '</label><br/><br/>';
        }
      ?>

<!--
              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens -->

      </div>

      <div class="col s12 m8 l9 z-depth-1"> <!-- Note that "m8 l9" was added -->
        Teal page content<br/>

<!--               This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens -->

      </div>

    </div>
<!--   <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Contact: <a class="orange-text text-lighten-3" href="#">ken.aque@live.com</a>
      </div>
    </div>
  </footer> -->
<!-- Modal Structure -->
  <div id="modal1" class="modal card-panel blue-grey">
    <div class="modal-content">
      <center><h4 class="white-text">Create new message</h4></center>
      <form class="col s12" action="send_message.php" method="POST">
        <div class="card-content white-text">
          <div class="row">
          <div class="input-field col s6">
              <input name="receiver" id="email" type="email" class="validate">
              <label for="email">To:</label>
            </div>
            <div class="input-field col s6">
              <input name="subject" id="first_name" type="text" class="validate">
              <label for="name">Subject:</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea" name="content"></textarea>
          <label for="icon_prefix2">Content:</label>
        </div>
          </div>
        </div>
        <div class="card-action col s6" style="margin-left:75%;">
          <button class="btn waves-effect waves-light" type="submit" name="action">Send
          <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $('.modal-trigger').leanModal();
    });
  </script>
</body>
</html>
