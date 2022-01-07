<?php require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- lin icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- custom css file link  -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="style.css" /> -->
</head>

<body>
    <div class="container">
        <h1>inscription</h1>
        <div class="forms-container" id="form_inscriptionn">
            <div class="signin">
                <form action="" method="POST">
                    <div class="input-field">
                        <label for="prenom"><i class="fas fa-user-tie"></i> </label>
                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prénom">
                    </div>
                    <div class="input-field">
                        <label for="nom"><i class="fas fa-users"></i> </label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="nom">
                    </div>
                    <div class="input-field">
                        <label for="email"><i class="fas fa-at"></i></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <label for="mdp_2"><i class="fas fa-lock"></i> </label>
                        <input type="password" name="mtPasse" id="mdp_2" class="form-control" placeholder="Choisissez mt passe">
                    </div>
                    <div class="input-field">
                        <label for="confmdp"><i class="fas fa-lock-open"></i></label>
                        <input type="password" name="RTmtPasse" id="confmdp" class="form-control" placeholder="Retapez mt de pass">
                    </div>
                    <button onclick="f1()" type="submit" name="submit" id="submit_2" value="inscription" class="btn btn-primary">S'inscrire</button>
                    <button id="reset_form" class="btn2">Effacer</button>
                </form>
            </div>
        </div>
        <hr>
        <?php if (isset($_POST['submit'])) : ?>
            <?php if (isset($_POST['prenom'])) : ?>
                <?php $prenom = $_POST['prenom']; ?>
            <?php endif; ?>
            <?php if (isset($_POST['nom'])) : ?>
                <?php $nom = $_POST['nom']; ?>
            <?php endif; ?>
            <?php if (isset($_POST['email'])) : ?>
                <?php $email = $_POST['email']; ?>
            <?php endif; ?>
            <?php if (isset($_POST['mtPasse'])) : ?>
                <?php $mtPasse = $_POST['mtPasse']; ?>
            <?php endif; ?>
            <?php if (isset($_POST['RTmtPasse'])) : ?>
                <?php $RTmtPasse = $_POST['RTmtPasse']; ?>
            <?php endif; ?>
            <?php
            $condidateur = array(
                'prenom' => $prenom,
                'nom' => $nom,
                'email' => $email,
                'mtPasse' => $mtPasse,
                'RTmtPasse' => $RTmtPasse
            );
            // print_r($condidateur);
            ?>
            <?php $condidateur_kays_string = implode(',', array_keys($condidateur)); ?>
            <?php $condidateur_kays_placehorders = ':' . implode(',:', array_keys($condidateur)); ?>
            <?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
            // contacte la base de donnée 
            ?>
            <?php //echo "$condidateur_kays_string "; 
            ?>
            <?php //echo "$condidateur_kays_placehorders"; 
            ?>
            <?php
            $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                'condidat',
                $condidateur_kays_string,
                $condidateur_kays_placehorders
            ); ?>
            <?php $statement1 = $connection->prepare($sql); ?>
            <?php $statement1->execute($condidateur); ?>
            <!--  ($statement1 = $connection->prepare($sql);Et($statement1->execute($condidateur); code pour contacte form avec base de donnée dans php my admin -->
            <div class="alert alert-success" role="alert">
                <p> super bien envoyer!</p>
            </div>
        <?php endif; ?>
        <!-- fin if de submit -->
        <div class="row">
            <div class="col-12">
                <?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
                // contacte la base de donnée 
                ?>

                <?php $sql = "SELECT * FROM condidat "; ?>
                <?php $statement1 = $connection->prepare($sql); ?>
                <?php $statement1->execute(); ?>
                <?php $results = $statement1->fetchAll(); ?>
                <table class="table table striped table-dark">
                    <tr>
                        <th>ID</th>
                        <th>prenom</th>
                        <th>nom</th>
                        <th>email</th>
                        <th>mtPasse</th>
                        <th>RTmtPasse</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td> <a href="update.php?id=<?php echo $row['id']; ?>">#<?php echo $row['id']; ?></a></td>
                            <td><?php echo $row['prenom']; ?></td>
                            <td><?php echo $row['nom']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mtPasse']; ?></td>
                            <td><?php echo $row['RTmtPasse']; ?></td>
                            <td><a href="delete.php? id=<?php echo $row['id'] ?>" style="color:black;"><i class="bi bi-trash-fill"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="app.js"></script>
</body>

</html>