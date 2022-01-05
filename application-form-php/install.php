<?php require_once('config.php'); ?>


<?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
// contacte la base de donnée
?>

<?php
//pour crier un table avec php et sql
// $sql = " CREATE TABLE IF NOT EXISTS condidat( id INT UNSIGNED AUTO_INCREMENT,
// prenom VARCHAR(30) NOT NULL , 
// nom VARCHAR(30) NOT NULL , 
// email VARCHAR(30) NOT NULL , 
// mtPasse TEXT NOT NULL, 
// RTmtPasse TEXT NOT NULL, 
// PRIMARY KEY(id) );";
// 
?>
<?php
    //     $connection->exec($sql);

    echo "congratulations you are connected to the database mode payment";
    ?>