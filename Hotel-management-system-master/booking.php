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
	<?php
		echo '<form action="booking.php" class="w3-padding w3-margin" onsubmit="return check()" method="POST">
<div class="w3-container w3-left w3-card-4 w3-padding w3-margin w3-light-grey" style="width:700px;height:450px">
<h2>Enter customer details here</h2>
<br><br><input id="inp1" placeholder="enter room number here" name="room" class="w3-input w3-margin-right w3-large w3-left w3-round-xlarge" type="number" required/>
<input id="inp2" placeholder="enter customer name here" name="name" class="w3-input w3-margin-right w3-large w3-left w3-round-xlarge" type="text" required/>
<input id="inp3" placeholder="enter phone number" name="phno" class="w3-input w3-margin-right w3-large w3-left w3-round-xlarge" type="text" required/>
<input id="inp4" placeholder="enter address of the customer" name="address" class="w3-input w3-margin-right w3-large w3-left w3-round-xlarge" type="text" required/>
<input id="inp5" placeholder="enter number of children" name="child" class="w3-input w3-round-xlarge w3-margin-right w3-large w3-left" type="number" required/>
<br><br><br><br><br><br><br><br><br><br><br><br>
<button name="sub" id="sub" value="u" class="w3-button w3-black" type="submit">New entry</button>
</div>
</form>';
$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
$q='select * from rooms';
$p=$pd->query($q);
$num=101;
echo "<h1 class='w3-blue w3-container w3-margin-left w3-padding w3-center w3-third'>Check available rooms</h1><br><br><br><br><br>";
while ($row=$p->fetch()){
if($num==116)
{
	echo "<br><br><br><br><h5 style='width:100px; height:40px' class='w3-left w3-margin-left w3-padding w3-blue'>4 bed</h5>";
}
else if($num==111)
{
	echo "<br><br><br><br><h5 style='width:100px; height:40px' class='w3-left w3-margin-left w3-padding w3-blue'>3 beds</h5>";
}
else if($num==106)
{
	echo "<br><br><br><br><h5 style='width:100px; height:40px' class='w3-left w3-margin-left w3-padding w3-blue'>2 beds</h5>";
}
else if($num==101)
{
	echo "<h5 style='width:100px; height:40px' class='w3-left w3-padding w3-margin-left w3-blue'>Single bed</h5>";
}
	if($row[1]=="-")
	{
		echo '<div class="w3-grey w3-margin-left w3-margin-right w3-left w3-hover-shadow" id="'.$num.'" value="'.$num.'" style="width:50px;height:50px;" onclick="give(this.id)"><p class="w3-center w3-margin-top">'.$num.'<p></div>';
	}
	else
	{
		echo '<div class="w3-red w3-left w3-margin-left w3-margin-right w3-left w3-hover-shadow" style="width:50px;height:50px;"><p class="w3-center w3-margin-top">'.$num.'<p></div>';
	}
	$num=$num+1;
}
echo '<br><br><br><br>
<button class="w3-red w3-button w3-large w3-right" onclick=window.location="booking.php">Check results</button>
';
if((!empty($_POST['name'])))
try
{
$id=$_POST['room'];
$new=$_POST['name'];
$phno=$_POST['phno'];
$address=$_POST['address'];
$child=$_POST['child'];
$dat=date("Y/m/d");
$tim=date("h:i:sa");
$day=date("l");
$today=$dat."#".$tim."#".$day;
$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
$q='select * from rooms';
$p=$pd->query($q);
while($row=$p->fetch())
{
	if($row[0]%6==0)
	{
		$opt=101;
	}
	else if($row[0]%6==1)
	{
		$opt=102;
	}
	else if($row[0]%6==2)
	{
		$opt=103;
	}
	else if($row[0]%6==3)
	{
		$opt=104;
	}
	else if($row[0]%6==4)
	{
		$opt=105;
	}
	else
	{
		$opt=106;
	}
}
$access=1;
$q='select * from rooms where number='.$id;
$p=$pd->query($q);
while($row=$p->fetch())
{
	if($row[1]!="-")
	{
		$access=0;
		echo '<h3 class="w3-red w3-margin w3-center w3-half w3-padding">Room is already booked<h3>';
	}
}
if($access==1)
{
	$s=$pd->prepare("update rooms set names=?,empid=?,phno=?,address=?,child=?,checkin=? where number=?");
	$s->bindparam(1,$new);
	$s->bindparam(2,$opt);
	$s->bindparam(3,$phno);
	$s->bindparam(4,$address);
	$s->bindparam(5,$child);
	$s->bindparam(6,$today);
	$s->bindparam(7,$id);
	$s->execute();
	echo'<div class="w3-green w3-center w3-half w3-margin">
	  <h3 id="suc" onload="clear()">New customer added successfully</h3>
	  </div> ';
}
}
catch(PDOException $e)
{
$output='unable to connect database server';
echo $output;
exit();
}
?>
</body>
</html>
<script type="text/javascript">
var t = 1;
	function give(x)
	{
		if(t==1)
		{
		t=t+1;
		document.getElementById(x).classList.remove("w3-grey");
		document.getElementById(x).classList.add("w3-green");
		document.getElementById('sub').value=val;
		document.getElementById('inp').value=val;
		}
	}
	function check()
	{
		var inp1=document.getElementById('inp1');
		var inp2=document.getElementById('inp2');
		var inp3=document.getElementById('inp3');
		var inp4=document.getElementById('inp4');
		var inp5=document.getElementById('inp5');
		if(inp1.value>130 || inp1.value<101)
		{
			alert('invalid room number');
			inp1.focus();
			return false;
		}
		else if(inp3.value.length>10 || inp3.lengt<8)
		{
			alert('Phone number length must be 8 to 10 digits');
			inp3.focus();
			return false;
		}
		else if(inp5.value>2)
		{
			alert('Maximum of 2 children are allowed to stay');
			inp5.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
</script>