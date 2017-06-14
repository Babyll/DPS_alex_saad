	<!doctype HTML>
	<html>
		<meta charset="UTF-8">
	<head>
		<link rel="stylesheet" href="style.css" media="screen" type="text/css" >
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,700italic' rel='stylesheet' type='text/css'>
	<script src='js/jquery-1.3.1.min.js'></script>
			<script src='js/jquery.tablesorter.min.js'></script>



			<script type="text/javascript">

   $(document).ready(function() {

     $("#keywords").tablesorter({ headers: {
         2: { sorter: 'digit' } // column number, type
     } });
});
    </script>


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
							<form id="search-form" accept="/search/" role="search" method="post">
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

		<br>

			<?php
			$name_last=$_GET['name_last'];
			$interment_at=$_GET['interment_at'];
			$cause_of_death=$_GET['cause_of_death'];
			$name_first=$_GET['name_first'];
			$year=$_GET['year'];
			$occupation=$_GET['occupation'];
			$p=$_Get['prim'];
			$con = mysql_connect("localhost","ernest","xroads66");

			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }

			mysql_select_db("hayesLedgers", $con);




			$result = mysql_query("SELECT * FROM l1 WHERE name_last LIKE '$name_last%' AND cause_of_death LIKE '%$cause_of_death%' AND name_first LIKE '$name_first%' AND year(date_on_ledger) LIKE '%$year%' AND year(date_on_ledger) BETWEEN ('%$startyear%' AND '%$endyear%') AND interment_at like '%$interment_at%' AND occupation LIKE '%$occupation%' ORDER BY age_years ASC");
			//name_first, name_last, age_years, cause_of_death, interment_at, date_on_ledger, funeral_services_at, 'PRIMARY'
			echo
						"<div id=\"wrapper\">
		  <h1>Sortable Demo </h1>

		  <table id='keywords' class='tablesorter' cellspacing='0' cellpadding='0'>
		    <thead>
		      <tr>
			<th><span>First Name</span></th>
			<th><span>Last Name</span></th>
			<th class={tablersorter:'digit'}><span>Age </span></th>
			<th><span>Date of Death</span></th>
			<th><span>Cause of Death</span></th>
			<th><span>Cemetery</span></th>
			<th><span>Occupation</span></th>
		      </tr>
		    </thead>";
			while($row = mysql_fetch_array($result)) {

						echo
		    "
		      <tr>
			<td >". "<a href=view.php?id=".$row['prim'].">".$row['name_first']."</td>
			<td>".$row['name_last']."</td>
			<td>".$row['age_years']."</td>
			<td>".$row['date_on_ledger']."</td>
			<td>".$row['cause_of_death']."</td>
			<td>".$row['interment_at']."</td>
			<td>".$row['occupation']."</td>
		      </tr>";





			  }








  echo "</table>";
 echo "</div> ";

		echo json_encode($result);
			mysql_close($con);
			?>


	</body>
	</html>
