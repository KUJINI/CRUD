<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css?v=5">     
    </head>

    <?php
	    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        
           $polaczenie = mysqli_connect('localhost', 'KUJINI', '1132', '4tp_tylkowski');
	    	$zapytanie = "SELECT * FROM Uczniowie WHERE id=? ";
        
	    	if($stmt = mysqli_prepare($polaczenie, $zapytanie)){
               mysqli_stmt_bind_param($stmt, "i", $param_id);
	    		$param_id = trim($_GET["id"]);
            
	    		if(mysqli_stmt_execute($stmt)){
	    			$result = mysqli_stmt_get_result($stmt);
                
	    			if(mysqli_num_rows($result) == 1){
	    				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	    				$Imie = $row["Imie"];
	    				$Nazwisko = $row["Nazwisko"];
	    				$Klasa = $row["Klasa"];
	    				}
	    			}
	    	}
        }
    ?>

    <body>
        <main>
		    <div>
		    	<h2> Imie </h2>
		    	<?php echo $Imie; ?>
		    </div>
		    <div>
		    	<h2> Nazwisko </h2>
		    	<?php echo $Nazwisko; ?>
		    </div>
		    <div>
                <h2> Klasa </h2>
		    	<?php echo $Klasa; ?>
		    </div>
		    <p><a href="index.php"> Powrót </a></p>
        </main>
	</body>
</html>
