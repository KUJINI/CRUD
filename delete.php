<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css?v=5">     
    </head>

    <?php
	    if(isset($_POST["id"]) && !empty($_POST["id"])){
            $polaczenie = mysqli_connect('localhost', 'KUJINI', '1132', '4tp_tylkowski');
            $zapytanie = "DELETE FROM Uczniowie WHERE id = ?";
            
            $stmt = mysqli_prepare($polaczenie, $zapytanie);
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                
                $param_id = trim($_POST["id"]);

                mysqli_stmt_execute($stmt);
                header("location: index.php");
                exit();
        }
    ?>

    <body>
        <main>
            <h2> Usuwanie </h2>
                <form method="post">
                    <div>
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                        <p>Czy na pewno chcesz usunąć ten wpis?</p>

                        <input type="submit" value="Tak">
                        <a href="index.php">Nie</a>
                    </div>
                </form>
        </main>
	</body>
</html>
