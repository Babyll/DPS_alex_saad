<!DOCTYPE html>
<html lang="en">
<head>
<!--
    <link rel="stylesheet" href="style.css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="slideshow.css">
-->
   
    
    
</head>
<body>	
	<header>
		<div class="inner">
			
			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="search.html">Search</a></li>
				</ul>
				<ul>
					<li>
						<form id="search-form" accept="/search/" role="search" method="get">
							<div>
								<input type="text" name="q" value="" />
								<input type="submit" id="search-button" value="Search" />
							</div>
						</form>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<main>

<script>
function goBack() {
    window.history.back()
}
</script>


<button onclick="goBack()">Back to Search</button>

<?php



$con = mysql_connect("localhost","ernest","xroads66");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hayesLedgers", $con);

$id = $_GET['id'];
$result = mysql_query("SELECT *,year(date_on_ledger),day(date_on_ledger),month(date_on_ledger) FROM ledgers WHERE prim = '$id'") or die(mysql_error());



$row = mysql_fetch_array($result);
echo "<br><div class=\"content_space\"></div>
<div class=\"reaults\" align = \"center\" style=\"float: left;\"><table class = \"view\">";
echo "<tr>";
echo "<td>Name: </td><td>" . $row['name_first'] . " " . $row['name_middle'] . " " . $row['name_last'];
echo "</td></tr>";
echo "<tr>";
echo "<td>Date of Birth: </td><td>" . $row['date_of_birth'];
echo "</td></tr>";
echo "<tr>";
echo "<td>Cause of Death: </td><td>" . $row['cause_of_death'];
echo "</td></tr>";
echo "<tr>";
echo "<td>Date of Death: </td><td>" . $row['date_of_death'];
echo "</td></tr>";
echo "<tr>";
echo "<td>Age: </td><td>" . $row['age'];
echo "</td></tr>";
echo "<tr>";
echo "<td>page number: </td><td>" . $row['page_no'];
echo "</td></tr>";
echo "<tr>";
echo "<td>marriage status: </td><td>".  $row['marriage_status'];
echo "</td></tr>";
echo "<tr>";
echo "<td>occupation: </td><td>" . $row['occupation'];
echo "</td></tr>";
echo "<tr>";
echo "<td>religion: </td><td>" . $row['religion'];
echo "</td></tr>";
echo "<tr>";
echo "<td>race: </td><td>". $row['race'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>redisence: </td><td>".  $row['residence'];
echo "</td></tr>";
echo "<tr>";
echo "<td>charged to: : </td><td>". $row['charge_to'];  
echo "</td></tr>";

echo "<tr>";
echo "<td>order given by: </td><td>". $row['order_given_by'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>how secured: </td><td>". $row['how_secured'];  
echo "</td></tr>";
echo "</table></div>";

echo "<div class=\"content_space\"></div>";

echo "<div class=\"results\" align = \"center\" style=\"float: left;\"><table class = \"view\">";
echo "<tr>";
echo "<td>date of funeral: </td><td>". $row['date_of_funeral'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>place of death: </td><td>". $row['place_of_death'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>funeral services location: </td><td>". $row['funeral_services_at'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>time of funeral services: </td><td>". $row['time_of_funeral_services'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>clergyman: </td><td>". $row['clergyman'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>certifying physician: </td><td>". $row['certifying_physician'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>burial certificate number: </td><td>". $row['burial_certificate_no'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>Cemetary: </td><td>". $row['interment_at'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>lot or grave number: </td><td>". $row['lot_or_grave_no'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>section number: </td><td>". $row['section_no'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>other location information: </td><td>". $row['other_location_information'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>total footing: </td><td>". $row['total_footing_of_bill'];  
echo "</td></tr>";
echo "<tr>";
echo "<td>birthplace: </td><td>". $row['birthplace'];  
echo "</td></tr>";
echo "</table></div>";


//echo "<br><h1>information about parents<h1>"

$d= (string) $row['day(date_on_ledger)'];
$m=(string) $row['month(date_on_ledger)'];
if (strlen($d)<2){
$day='0' . $d;
}
else{
$day=$d;}
if (strlen($m)<2){
$month='0' . $m;
}
else{$month=$m;}



$image=$row['year(date_on_ledger)'] . $month . $day . '-' . $row['page_no'] . '.jpg';


//echo "<object type=\"image/jpeg\" data=\"images/ledger_images/$image\"></object>";

echo "<a href = \"images/ledger_images/$image\"><img src = \"images/ledger_images/$image\" width = \"27.7%\" style \"float: right;\"></a><br>";


?>
	</main>


</html>
