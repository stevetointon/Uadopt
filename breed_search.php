<!DOCTYPE html>
<html>
<head>
	<title>Search Breeds</title>
	<link rel="stylesheet" type="text/css" href="search_style.css">
	<script src="./search_script.js"></script>
</head>
<body>
	<div id="search bar">
	<input type="text" id="myInput" onkeyup="search()" placeholder="Search for breeds...">
	<span id="selected"></span>
</div>
	<div class="search_table">
	<form id="frm1">
	<table id="myTable">
	  <!--<tr class="header">
	    <th style="width:60%;"></th>
	    <th style="width:40%;"></th>
	  </tr>-->
	  <!-- this is the part of the code that will run php to connect to database-->
	  <?php
	   // connects to the database with password and username from the setup.ini 
	  //file 
	   $cfg = parse_ini_file('setup.ini');
       $conn = oci_connect($cfg['db_user'], $cfg['db_pass'],$cfg['db_path']);
       if(!$conn){
                echo "connection failed:";
                exit;
        }
        echo "not failed";
        return $conn;
        echo "here";
        //this is the sql line that takes all the data from the pet table in the 
        //database 
        // breed and description are the column names for each row in the pet table 
        $sql = "SELECT breed, description from Pet";
        $result = $conn-> query($sql);
        if ($result -> num_rows>0){
        	while ($row = $result -> fetch_assoc()){
        		echo $row["breed"];
            }
        	echo "</table>";
        } 
        else{
        	echo "0 results";
        }

        $conn -> close();
	  ?>
	  <tr>
	    <td><img src="http://www.dogbreedchart.com/img/beagle.jpg"></td>
	    <td>Beagle</td>
	    <td><input type="checkbox" name="breed1" value="Beagle" class="mycheckbox" onclick="updateCheckboxes('Beagle');"></td>
	    <span class="checkmark"></span>
	  </tr>
	  <tr>
	    <td><img src="http://www.dogbreedchart.com/img/chihuahua.jpg"></td>
	    <td>Chihuahua</td>
	    <td><input type="checkbox" name="breed2" value="Chihuahua" class="mycheckbox" onclick="updateCheckboxes('Chihuahua');"></td>
	  </tr>
	  <tr>
	    <td><img src="http://www.dogbreedchart.com/img/golden-retriever.jpg"></td>
	    <td>Golden Retriever</td>
	    <td><input type="checkbox" name="breed3" value="Golden Retriever" class="mycheckbox" onclick="updateCheckboxes('Golden Retriever');"></td>
	  </tr>
	  <tr>
	    <td><img src="http://www.dogbreedchart.com/img/pug.jpg"></td>
	    <td>Pug</td>
	    <td><input type="checkbox" name="breed4" value="Pug" class="mycheckbox" onclick="updateCheckboxes('Pug');"></td>
	  </tr>
	</table>
	</form>
</div>
<div class="continue">
	<button type="button" class="button" onclick="send()">Continue</button>
</div>
</body>
</html>

