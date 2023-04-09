<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css?v=5">     
    </head>

    <?php
		$polaczenie = mysqli_connect('localhost', 'KUJINI', '1132', '4tp_tylkowski');

		$Imie = $Nazwisko = $Klasa = "";
		$nowe_Imie = $nowe_Nazwisko = $nowe_Klasa = "";
		 
		
		if(isset($_POST["id"]) && !empty($_POST["id"])){
			$id =  trim($_GET["id"]);
		
			$input_Imie = trim($_POST["Imie"]);
			$Imie = $input_Imie;

			$input_Nazwisko = trim($_POST["Nazwisko"]);
			$Nazwisko = $input_Nazwisko;

			$input_Klasa = trim($_POST["Klasa"]);
			$Klasa = $input_Klasa;

			
			$zapytanie = "UPDATE Uczniowie SET Imie=?, Nazwisko=?, Klasa=? WHERE id=?";
				 
			$stmt = mysqli_prepare($polaczenie, $zapytanie);
			mysqli_stmt_bind_param($stmt, "sssi", $param_Imie, $param_Nazwisko, $param_Klasa, $param_id);
					
			$param_Imie = $Imie;
			$param_Nazwisko = $Nazwisko;
			$param_Klasa = $Klasa;
			$param_id = $id;
			
			mysqli_stmt_execute($stmt);
			header("location: index.php");
			exit();

		} else{
			if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
				$id =  trim($_GET["id"]);

				$zapytanie = "SELECT * FROM Uczniowie WHERE id = ?";

				$stmt = mysqli_prepare($polaczenie, $zapytanie);
				mysqli_stmt_bind_param($stmt, "i", $param_id);

				$param_id = $id;

				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
				$Imie = $row["Imie"];
				$Nazwisko = $row["Nazwisko"];
				$Klasa = $row["Klasa"];
			} else {
				echo ":)";
			}
		}

	?>

	<body>
		<main>
        <h2>Aktualizuj</h2>
        <form method="post">
			<div>
				Imie: <br>
                <input type="text" name="Imie" value="<?php echo $Imie; ?>">
            </div>
            <div>
                Nazwisko: <br>
				<input type="text" name="Nazwisko" value="<?php echo $Nazwisko; ?>">
            </div>
            <div>
                Klasa: <br>
                <input type="text" name="Klasa" value="<?php echo $Klasa; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/> <br>
            <input type="submit" value="Wprowadź">
            <a href="index.php"> Powrót </a>
        </form>
	</main>
	</body>
</html>

