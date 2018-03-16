<?php 
// Writing a cookie to the client.
extract( $_POST );
	
// write each form field’s value to a cookie and set the cookie’s expiration date

//setcookie( "Name", $Name, time() + 60 * 60 * 24 * 5 );    
//setcookie( "Height", $Height, time() + 60 * 60 * 24 * 5 );
//setcookie( "Color", $Color, time() + 60 * 60 * 24 * 5 );  

setcookie( "Name", $Name, time() -3600 );    
setcookie( "Height", $Height, time() -3600 );
setcookie( "Color", $Color, time() -3600 ); 
?><!-- end PHP script -->
		
	
<html> 
<head>
	<title>Cookie Saved</title>
	<style type = "text/css">
	       body { font-family: arial, sans-serif }
	       span { color: blue }
	</style>
</head>

<body>
	<p>The cookie has been set with the following data:</p> <br />
		      
	<!-- print each form field’s value -->
	
	<span>Name:</span><?php print( "$Name" ) ?><br /> 
	<span>Height:</span><?php print( $Height ) ?><br /> 
	<span>Favorite Color:</span><?php print( $Color ) ?><br />
	<p>Click <a href = "readCookies.php">here</a> to read the saved cookie.</p>
</body>
</html>

