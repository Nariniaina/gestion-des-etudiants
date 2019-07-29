<?php 
    include("auth.php");
    require_once("conn.php");
    $query = "SELECT * from t_eleve";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Classe</title>
</head>
<body>
    <span>
        <ul style="background-color: MediumSeaGreen; list-style-type: none; overflow: hidden;">
            <li style="float: left; font-size: 17px"><a href='accueil.php'>←</a></li>
            <li style="float: left; font-size: 17px; "><a href='gestion.php'>⌂</a></li>
            <li style="float: left;"><a href='retardlist.php'> ① Retard</a></li>
            <li style="float: left;"><a href='absencelist.php'> ② Absence</a></li>
            <li style="float: left;"><a href='classelist.php'> ③ Classe</a></li>
            <li style="float: left;"><a href='matierelist.php'> ④ Matiere</a></li>
            <li style="float: left;"><a href='sallelist.php'> ⑤ Salle</a></li>
            <li style="float: left;"><a href='tempslist.php'> ⑥ Emploie du temps</a></li>
            <li style="float: left;"><a href='examenlist.php'> ⑦ Examen</a></li>
        </ul>
    </span>
</body>
<div>
    <h1><span>Choisir la classe de l'etudiant</span></h1>
    <form method="post" action="traitement13.php">
    <p><label style="color: black">PRENOM DE L'ELEVE :</label> 
    <p>
        <select>
            <?php   $opt = "<select name = 'team'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    $opt .= "<option value = '{$row['el_id']}'>{$row{'el_prenom'}}</option>";
                                                                    }
                    $opt .= "</select>" 
            ?>
        </select>
    </p>
    <p><label style="color: black">NOM DE LA CLASSE :</label>   </p>
    <p><input type="submit" value="CONFIRMER"></p>
    </form>
</div>

<div>
    <h1><span>Créer une classe</span></h1>
    <form method="post" action="createclasse.php">
    <p><label style="color: black">NOM DE LA CLASSE :</label>  
    <p><input type="text" name="nomclasse" required></p>
    <p><input type="submit" value="CREER"></p>
    </form>
</div>
</body>
</html>