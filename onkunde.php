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
            <h2>Onkunde</h2>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && !checkEmpty()){
                    $kunnen = testInput($_POST["kunnen"]);
                    $persoon = testInput($_POST["persoon"]);
                    $getal = testInput($_POST["getal"]);
                    $vakantie = testInput($_POST["vakantie"]);
                    $eigenschap = testInput($_POST["eigenschap"]);
                    $slecht = testInput($_POST["slecht"]);
                    $overkomen = testInput($_POST["overkomen"]);
                    echo '<p>
                        Er zijn veel mensen die niet kunnen '.$kunnen.'. Neem nou '.$persoon.'. Zelfs met de hulp van een '.$vakantie.' of zelfs '.$getal.' kan '.$persoon.' niet '.$kunnen.'. Dat heeft niet te maken met een gebrek aan '.$eigenschap.', maar met een te veel aan '.$slecht.'. Te veel '.$slecht.' leidt tot '.$overkomen.' en dat is niet goed als je wilt '.$kunnen.'. Helaas voor '.$persoon.'.
                    </p>
      
                    <footer>
                        &copy; Peter van Kampen
                    </footer>';
                    die();
                }
                else if($_SERVER["REQUEST_METHOD"] == "POST" && checkEmpty()){
                    $req = "Graag alle velden invullen";
                }
            ?>
            <form action="onkunde.php" method="POST">
                <label for="kunnen">Wat zou je graag willen kunnen?</label>
                <input type="text" name="kunnen">
                <br><br>
                <label for="persoon">Met welke persoon kun je goed opschieten?</label>
                <input type="text" name="persoon">
                <br><br>
                <label for="getal">Wat is je favoriete getal?</label>
                <input type="text" name="getal">
                <br><br>
                <label for="vakantie">Wat heb je altijd bij je als je op vakantie gaat?</label>
                <input type="text" name="vakantie">
                <br><br>
                <label for="eigenschap">Wat is je beste persoonlijke eigenschap?</label>
                <input type="text" name="eigenschap">
                <br><br>
                <label for="slecht">Wat is je slechtste persoonlijke eigenschap?</label>
                <input type="text" name="slecht">
                <br><br>
                <label for="overkomen">Wat is het ergste dat je kan overkomen?</label>
                <input type="text" name="overkomen">
                <br><br>
                <label id="required"><?php echo $req; ?></label>
                <input type="submit" id="submit" value="Versturen">
            </form>
        </section>

        <footer>
            &copy; Peter van Kampen
        </footer>
    </div>
</body>
</html>