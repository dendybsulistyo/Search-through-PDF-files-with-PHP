<form action=index.php method=post>
keyword : <input type=text size=20 name=keyword>
<input type=submit>
</form>

<table border=1>
<tr>
<td>File Info
<td>File Name
<td>Download

<?php

	if(isset($_POST["keyword"])) {
	
	include "pdf2text.php";
	
	mysql_connect("localhost","root","yourpassword");
	mysql_select_db("pdf");
	$q = mysql_query("select * from files") or die(mysql_error());
		while($r=mysql_fetch_array($q)) {
		
		// cek 
		$result = pdf2text($r['filepdf']);
		$pos = stripos($result, $_POST["keyword"]);
			if($pos) {
				echo "
				<tr>
				<td>$r[fileinfo] 
				<td>$r[filepdf]
				<td><a href=$r[filepdf]>link</a>";
				} // end if
			
			} // end while 

	} // if isset

	?>
	
	<table>