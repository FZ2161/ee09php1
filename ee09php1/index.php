<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Panel administratora</title>
</head>
<body>
    <div id="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </div>
    <div id="lewy"> 
        <h4>Użytkownicy</h4>
        
        <?php
        $serwer = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'dane4';
        
        // Create connection
        $conn = mysqli_connect($serwer, $user, $password, $db);
        
        // Check connection
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        
        // SQL query
        $sql1 = "SELECT imie, nazwisko, rok_urodzenia, opis FROM osoby LIMIT 30";
        
        // Execute query
        $result = mysqli_query($conn, $sql1);
        
        // Check if the query was successful
        if ($result) {
            // Loop through the results and display data
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row["imie"] . " " . $row["nazwisko"] . " " . (2024- $row["rok_urodzenia"]) . " " . $row["opis"] . "<br>";
            }
        
            // Free result set
            mysqli_free_result($result);
        } else {
            // Display an error message if the query fails
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);


        ?>


    </div>
    <div id="prawy">
        <h4>Podaj id użytkownika</h4>
        <input type="int">
        <button>ZOBACZ</button>
    </div>
    <div id="stopka">
        stronę wykonał: 00000000000
    </div>
</body>
</html>
