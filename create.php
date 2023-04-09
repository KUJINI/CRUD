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
 

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $input_Imie = trim($_POST["Imie"]);
	        $Imie = $input_Imie;

	        $input_Nazwisko = trim($_POST["Nazwisko"]);
	        $Nazwisko = $input_Nazwisko;

	        $input_Klasa = trim($_POST["Klasa"]);
	        $Klasa = $input_Klasa;

            $zapytanie = "INSERT INTO Uczniowie (Imie, Nazwisko, Klasa) VALUES (?, ?, ?)";
         
            if($stmt = mysqli_prepare($polaczenie, $zapytanie)){
                mysqli_stmt_bind_param($stmt, "sss", $param_Imie, $param_Nazwisko, $param_Klasa);

                $param_Imie = $Imie;
                $param_Nazwisko = $Nazwisko;
                $param_Klasa = $Klasa;
            
                if(mysqli_stmt_execute($stmt)){
                    header("location: index.php");
                    exit();
                } else{
                    echo ":::)";
                }
            }
        }
    ?>

<body>
		<main>
        <h2>Utwórz wpis: </h2>
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
            <br>
            <input type="submit" value="Wprowadź">
            <a href="index.php"> Powrót </a>
        </form>
	</main>
	</body>
</html>
