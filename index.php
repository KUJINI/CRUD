<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">   
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="style.css?v=6"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body>
        <main>
            <div id="firstline"> 
                <h2> CRUD bazy danych Uczniowie </h2>
                <a name="create" id="aButton" class="btn btn-primary" href="create.php" role="button">Utwórz wpis</a>
            </div>
            <?php
                $polaczenie = mysqli_connect('localhost', 'KUJINI', '1132', '4tp_tylkowski');
                $zapytanie = "SELECT * FROM Uczniowie;";
            
                $wynik = mysqli_query($polaczenie, $zapytanie);
                echo "<table class='table'>"; 
                    echo "<thead>";
                        echo "<tr>";
                            echo "<td>ID</td>"; 
                            echo "<td>Imie</td>"; 
                            echo "<td>Nazwisko</td>"; 
                            echo "<td>Klasa</td>";
                            echo "<td>Działania</td>";
                        echo "</tr>"; 
                    echo "</thead>";
            
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($wynik)) {
                    echo "<tr>";
                        echo "<td scope='row'>".$row['id']."</td>"; 
                        echo "<td>".$row['Imie']."</td>"; 
                        echo "<td>".$row['Nazwisko']."</td>"; 
                        echo "<td>".$row['Klasa']."</td>"; 
                        echo "<td>";
                            echo '<a href="read.php?id='. $row['id'] .'"> &#128065 </a>';
                            echo '<a href="update.php?id='. $row['id'] .'"> &#9998 </a>';
                            echo '<a href="delete.php?id='. $row['id'] .'"> &#128465 </a>';
                        echo "</td>";
                    echo "</tr>"; 
                    } 
                    echo "</tbody>";
                echo "</table>";

                mysqli_free_result($wynik);
            ?>
        </main>
    </body>
</html>
