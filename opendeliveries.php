<?php $id = $_POST['id'];
      $name = $_POST['name'];
?>

<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=0.6"/>
        <title>Dorm Source</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
        <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

</head>
<body>
<div class="nav-top">
    <div onClick="login()">
        Login
    </div>
    <a href="index.html">
        <div>
            Home
        </div>
    </a>
</div>
<div class="main-background">
    <div class ="title_holder">
        <div class="title_info">
        Available Deliveries:
        </div>
    </div>
</div>

<?php

$id = $_POST['id'];

echo '<table id="table" class="requests"><tr style="font-size: 25px;"><td width="15%">Name</td><td width="15%">Restaurant</td><td width="25%">Note</td><td width="15%">Phone</td><td width="15%">Address</td><td width="15%">Time</td></tr>';
$requests = 'https://quickdelivery.firebaseio.com/Requests.json';
$json = file_get_contents($requests);
$json = json_decode($json);
foreach ($json as $key => $value) {
    $req = file_get_contents('https://quickdelivery.firebaseio.com/Requests/'.$key.'.json');
    $req = json_decode($req, true);
    if ($req["confirmation"] == 0) echo '<tr onclick="post2(\'acknowledge.php\', \'id\',\''.$id.'\', \'key\', \''.$key.'\')"><td>'.$req["name"].'</td><td>'.$req["restaurant"].'</td><td>'.$req["note"].'</td><td>('.substr($req["phone"],1,3).') '.substr($req["phone"],4,3)."-".substr($req["phone"],7,4).'</td><td>'.$req["address"].'</td><td>'.$req["time"].'</td><tr>';
    }
echo '</table>';
?>

<input class="account-button1" type="button" value="Back" onclick="post2('account.php', 'id', '<?php echo $id ?>', 'fname', '<?php echo $name ?>')">

</body>
</html>