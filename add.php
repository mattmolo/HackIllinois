<?php
  $id =  $_POST['id'];
  $name = $_POST['fname'];
  $json = file_get_contents('https://quickdelivery.firebaseio.com/Users/'. $id.'.json');
?>

<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=0.6"/>
        <title>Add your Request</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" title="no title"/>
        <link rel="stylesheet" type="text/css" href="nprogress/nprogress.css" media="screen" title="no title"/>
        <script type="text/javascript" src="https://cdn.firebase.com/v0/firebase.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/nprogress/nprogress.js"></script>
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
        Add your request!
        </div>
    </div>
</div>

<div class="form">
    <form style="float: left">
        <table>
            <tr>
                <td width="25%">
                    Restaurant: <br><input id="restaurant" type="text" name="restaurant"><br>
                    Address: <br><input id="address" type="text" name="address"><br>
                </td>
                <td style="padding-left: 20px" width="65%">
                    <div class="bigTextInfo">Add what you want here. Make sure to include everything that the delivery person will need, and anything for them to be careful of(allergies.)</div><br>
                    <textarea class="bigText" id="notes" cols="100" rows="10"></textarea>
                </td>
                <td width="10%"></td>
            </tr>
                <tr>
                <td>
                <input type="button" onclick='addRequest(<?php echo '"'.$id.'"' ?>, <?php echo $json ?>)' value="Submit!">
                </td>
            </tr>
        </table>
    </form>
</div>

<input class="account-button1" type="button" value="Back" onclick="post2('account.php', 'id', '<?php echo $id ?>', 'fname', '<?php echo $name ?>')">

</body>
</html>