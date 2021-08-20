<?php
function dateDiffInDays($date1, $date2)  
{   
	$diff = strtotime($date2) - strtotime($date1); 
    return abs(round($diff / 86400)); 
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		.w3-lobster {
		  font-family: "Comic Sans MS", cursive, sans-serif;
		}
		#home{
		border-style: solid;
		border-width: 0px 0px 10px 0px;

		color:#cccccc
		}
		body{
			background-image: url("background.jpg");
		}
		</style>
</head>
<body>
	<h1 style="height: 200px" class="w3-margin-top w3-padding-32 w3-flat-orange w3-lobster w3-center w3-container">
		Hotel management system
		<br>
	<div class="w3-margin-top w3-bottom-middle w3-large w3-bar w3-black">
	  <a href="home.php" class="w3-bar-item w3-button w3-mobile">Home</a>
	  <a href="customer.php" class="w3-bar-item w3-button w3-mobile">Customer</a>
	  <a href="booking.php" class="w3-bar-item w3-button w3-mobile">Booking</a>
	  <a href="employee.php" class="w3-bar-item w3-button w3-mobile">Employee</a>
	  <a href="dining.php" class="w3-bar-item w3-button w3-mobile">Dining</a>
	  <a href="finance.php" class="w3-bar-item w3-button w3-mobile">Finance</a>
	</div>
	</h1>
	<div class="w3-container w3-padding w3-margin">
		<form action="checkout.php" class="w3-card-3 w3-center w3-padding w3-grey" method="POST">
			<label class="w3-left" style="margin-top: 23px;margin-left: 30px">Enter room number here : </label><input type="number" name="room" class="w3-input w3-half w3-margin w3-left w3-round-xxlarge">
			<button class="w3-button w3-black w3-margin w3-center w3-round-xlarge w3-hover-red" name="sub1" type="submit">Check</button>
		</form>
	</div>
	<?php
	if(isset($_POST['sub1']))
	{
		$room=$_POST['room'];
		$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
		$q='select * from rooms';
		$p=$pd->query($q);
		while($row=$p->fetch())
		{
			if($row[0]==$room)
			{
				echo '<div name="tab" class="w3-margin">';
				echo '<table class="w3-table-all w3-padding"><thread><tr class="w3-black"><th><h5>Room number</h5></th><th><h5>Customer name</h5></th><th><h5>number of beds</h5></th><th><h5>type</h5></th><th><h5>Employee dealing</h5></th><th><h5>Phone number</h5></th><th><h5>Address</h5></th><th><h5>Number of children</h5></th><th><h5>Check in time</h5></th></tr></thread>';
				echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td></tr>";
				echo '</div>';
				echo '<form action="checkout.php" class="w3-left w3-margin w3-padding" method="POST"><button name="sub2" class="w3-button w3-black w3-margin w3-padding" value="'.$room.'">Proceed to checkout</button></form>';
			}
		}
	}
	if(isset($_POST['sub2']))
	{
		$bill=0;
		$sub=$_POST['sub2'];
		$room=(int)$sub;
		$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
		$q='select * from rooms';
		$p=$pd->query($q);
		while($row=$p->fetch())
		{
			if($row[0]==$room)
			{
				if($room<106){$bill=1000;}
				else if($room<111 and $room>105){$bill=1700;}
				else if($room<116 and $room>110){$bill=2500;}
				else if($room<121 and $room>115){$bill=3000;}
				else{}
				$bill=$bill+($row[7]*400);
				$date1=substr($row[8],0,10);
				$date2=date("Y/m/d");
				$days=dateDiffInDays($date1, $date2);
				$roombill=$bill*$days;
				echo '<h1 class="w3-left w3-jumbo w3-margin-left w3-padding">Room bill</h1><br><br><br><br><br><br>';
				echo '<h1 class="w3-card-4 w3-light-grey w3-left w3-margin w3-padding">'.$roombill.'</h1><br><br><br><br>';
				$foodbill=0;
				$q='select * from foodorder where room='.$room;
				$p=$pd->query($q);
				echo "<div class='w3-margin w3-padding'><h1 class='w3-margin w3-padding w3-jumbo'>Food items Ordered</h1>";
				while($rowx=$p->fetch())
				{
					$t='select * from food where id='.$rowx[1];
					$w=$pd->query($t);
					while($x=$w->fetch())
					{
						echo '<div class="w3-card-4 w3-light-grey w3-left w3-margin w3-padding">
							<h1>Food item : '.$x[1].'</h1>
							<h1>price : '.$x[2].'</h1>
						</div>';
						$foodbill=$foodbill+$x[2];
					}
				}
				echo '</div><div class="w3-container w3-margin w3-padding"><h1 class="w3-margin w3-padding w3-light-grey w3-card-4 w3-jumbo">Food Bill : '.$foodbill.'</h1></div>';
				$stamp=time();
				$a=$pd->prepare('insert into trans values(?,?,?,?,?,?,?)');
				$a->bindparam(1,$roombill);
				$a->bindparam(2,$foodbill);
				$a->bindparam(3,$row[1]);
				$a->bindparam(4,$row[5]);
				$a->bindparam(5,$row[6]);
				$a->bindparam(6,$room);
				$a->bindparam(7,$stamp);
				$a->execute();
				$a=$pd->prepare('delete from foodorder where room=?');
				$a->bindparam(1,$room);
				$a->execute();
				$a=$pd->prepare('update rooms set names=?,phno=?,address=?,child=?,checkin=?');
				$null='-';
				$zero=0;
				$a->bindparam(1,$null);
				$a->bindparam(2,$null);
				$a->bindparam(3,$null);
				$a->bindparam(4,$zero);
				$a->bindparam(5,$null);
				$a->execute();
			}
		}
	}
	?>
</body>
</html>