<?php
    $req = "";

    function checkEmpty(){
        foreach($_POST as $value){
            if(empty($value)){
                
                return true;
            }
        }
        return false;
    }

    function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Frijole&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>MadLibs</title>
</head>
<body>
    <div id="content">
        <header>
            <h1>Mad Libs</h1>
        </header>
    
        <nav>
            <ul>
                <li>
                    <a href="paniek.php">Er heerst paniek...</a>
                </li>
                <li>
                    <a href="onkunde.php">Onkunde</a>
                </li>
            </ul>
        </nav>
        
        <section>
            <h2>Er heerst paniek...</h2>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && !checkEmpty()){
                    $dier = testInput($_POST["dier"]);
                    $persoon = testInput($_POST["persoon"]);
                    $land = testInput($_POST["land"]);
                    $vervelen = testInput($_POST["vervelen"]);
                    $speelgoed = testInput($_POST["speelgoed"]);
                    $docent = testInput($_POST["docent"]);
                    $kopen = testInput($_POST["kopen"]);
                    $bezigheid = testInput($_POST["bezigheid"]);
                    echo '<p>
                        Er heerst paniek in het koninkrijk '.$land.'. Koning '.$docent.' is ten einde raad en als koning '.$docent.' ten einde raad is, dan roept hij zijn ten-einde-raadsheer '.$persoon.'.
                        <br><br>
                        "'.$persoon.'! Het is een ramp! Het is een schande!"
                        <br><br>
                        "Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?"
                        <br><br>
                        "Mijn '.$dier.' is verdwenen! Zo maar, zonder waarschuwing. En ik had net nog '.$speelgoed.' voor hem gekocht!"
                        <br><br>
                        "Majesteit, uw '.$dier.' komt vast vanzelf weer terug?"
                        <br><br>
                        "Ja, dat is leuk en aardig, maar hoe moet ik in de tussentijd '.$bezigheid.' leren?"
                        <br><br>
                        "Maar Sire, daar kunt u toch uw '.$kopen.' voor gebruiken?"
                        <br><br>
                        "'.$persoon.', je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had."
                        <br><br>
                        "'.$vervelen.', Sire."
                    </p>
      
                    <footer>
                        &copy; 2021 Peter van Kampen
                    </footer>';
                    die();
                }
                else if($_SERVER["REQUEST_METHOD"] == "POST" && checkEmpty()){
                    $req = "Graag alle velden invullen";
                }
            ?>
            <form action="paniek.php" method="POST">
                <label for="dier">Welk dier zou je nooit als huisdier willen hebben?</label>
                <input type="text" name="dier">
                <br><br>
                <label for="persoon">Wie is de belangrijkste persoon in je leven?</label>
                <input type="text" name="persoon">
                <br><br>
                <label for="land">In welk land zou je graag willen wonen?</label>
                <input type="text" name="land">
                <br><br>
                <label for="vervelen">Wat doe je als je je verveelt?</label>
                <input type="text" name="vervelen">
                <br><br>
                <label for="speelgoed">Met welk speelgoed speelde je als kind het meest?</label>
                <input type="text" name="speelgoed">
                <br><br>
                <label for="docent">Bij welke docent spijbel je het liefst?</label>
                <input type="text" name="docent">
                <br><br>
                <label for="kopen">Als je € 100.000,- had, wat zou je dan kopen?</label>
                <input type="text" name="kopen">
                <br><br>
                <label for="bezigheid">Wat is je favoriete bezigheid?</label>
                <input type="text" name="bezigheid">
                <br><br>
                <label id="required"><?php echo $req; ?></label>
                <input type="submit" id="submit" value="Versturen">
            </form>
        </section>

        <footer>
            &copy; 2021 Peter van Kampen
        </footer>
    </div>
</body>
</html>