<!-- Name: Raymond Arevalo	Date: 06/17/16 -->

<!DOCTYPE html>
<html>
	
    <head>
		<title> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	<!-- Displays mobile on mobile -->
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
        <script src="https://use.fontawesome.com/501a4c64e1.js"></script>
		<link href = "css/style.css" rel = "stylesheet">
		<!-- Why do we need a google API?  -->
		<!-- What is jQuery? It's a feature-rich JavaScript library -->
		<!-- The Google Hosted Libraries is a stable, reliable, high-speed, globally avaiable content distribution
			 network for the most popular, open-source JavaScript libraries -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"> </script>	<!-- google API -->
		<script src="js/bootstrap.js"></script>	<!-- Bootstrap api -->


        
    </head>
	<body>
		<div class = "container-fluid inside"> 
			<h1 class = "text-center" >isUp</h1>

			<form action = "" method = "GET" class = "text-center">
				<input type = "text" name = "website" placeholder = "https://url">
				<input type="submit" class = "button">
			<form>
		</div>
	</body>
</html>



<?php

/* Enters only if we have submitted with our 'submit' button */
if($_GET){

	/* Our input aka our website */
	$website = $_GET['website'];
	
	/* Prints out the is up if the domain is up, other elsewise */
	if(isDomainAvailable($website)) {
		print "<h2 class = 'text-center'> $website   is up!<h2>";
	}
	else {
		print "<h2 class = 'text-center'> $website is down! :(<h2>";
	}
}

/* Check if the domain is up */
function isDomainAvailable($domain) {
			
	//initialize curl
    $curlInit = curl_init($domain);
    curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($curlInit,CURLOPT_HEADER,true);
    curl_setopt($curlInit,CURLOPT_NOBODY,true);
    curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

    //get answer
    $response = curl_exec($curlInit);

    curl_close($curlInit);

    if ($response) return true;

    return false;
       
}
?>	