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
	<div>
	<?php
	$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
	if(isset($_POST['sub']))
	{
		$room=$_POST['room'];
		$tt=$_POST['sub'];
		$row=explode(",",$tt);
		$food=(int)$row[0];
		$stamp=$row[1];
		$trans=0;
		$q='select * from foodorder';
		$p=$pd->query($q);
		$t=$pd->query($q);
		$access=1;
		while($row=$p->fetch())
		{
			if($trans<$row[0])
			{
				$trans=$row[0];
			}
		}
		$trans=$trans+1;
		while($row=$t->fetch())
		{
			if($stamp==$row[3])
			{
				$access=0;
			}
		}
		$q='select * from rooms where number='.$room;
		$p=$pd->query($q);
		while ($row=$p->fetch()) {
			if($row[1]=="-")
			{
				$access=2;
			}
		}
		if($access==1)
		{
			$p=$pd->prepare('insert into foodorder values(?,?,?,?)');
			$p->bindparam(1,$trans);
			$p->bindparam(2,$food);
			$p->bindparam(3,$room);
			$p->bindparam(4,$stamp);
			$p->execute();
			echo '<button id="id01" class="w3-button w3-center" onclick="close()"><h1 class="w3-center w3-green w3-container w3-margin w3-padding w3-card-4">Order Placed Successfully</h1></button><br>';
		}
		else if($access==0)
		{
			echo '<div id="id01" onclick="close()"><h1 class="w3-center w3-red w3-container w3-margin w3-padding w3-card-4">Order not placed | inconsistency in database | you tried to resubmit the order</h1></div><br>';
		}
		else
		{
			echo '<div id="id01" onclick="close()"><h1 class="w3-center w3-red w3-container w3-margin w3-padding w3-card-4">This room has no customers</h1></div><br>';
		}
	}
	$q='select * from food';
	$p=$pd->query($q);
	echo '<div id="items">';
	while($row=$p->fetch())
	{
	echo '<div id="'.$row[0].'" onclick="order(this.id)" class="w3-border w3-card-3 w3-hover-shadow w3-left w3-margin">
	  <img id="imag" value="'.$row[0].'" src="'.$row[3].'">
	  <div class="w3-container w3-center">
	    <h3>'.$row[1].'</h3>
	    <h3>'.$row[2].' <i class="fa fa-rupee"></i></h3>
	  </div>
	</div>';
	}
echo '</div>';
	?>
	<form id="form" style="display: none" action="dining.php" method="POST">
		<input type="number" class="w3-input w3-half w3-margin w3-black" placeholder="Enter room number" name="room"><br><br><br><br>
		<button class="w3-button w3-margin w3-black w3-xlarge" name="sub" type="submit" id='sub'>Place order</button>
	</form>
</body>
</html>
<script type="text/javascript">
	function order(x)
	{
		var ts=new Date().getTime();
		var l=x+","+ts;
		document.getElementById('sub').value=l;
		for (var i = 1; i<22; i++) {
			document.getElementById(i).style.display='none';	
		}
		document.getElementById(x).style.display='block';
		document.getElementById('form').style.display='block';
	}
	function close(){
		setTimeout(function () {document.getElementById('id01').style.display='none'}, 4000); 
	}
</script>