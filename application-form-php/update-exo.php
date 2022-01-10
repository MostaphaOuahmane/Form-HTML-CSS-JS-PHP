<?php require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- lin icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- custom css file link  -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <h1> update</h1>
    <p> <a href="index.php">Go back to the homepage</a> </p>

    <?php if (isset($_GET['id'])) : ?>
        <?php $id = $_GET['id']; ?>
        <div style="background:#eee;padding:10px;">
            <p>You are updating the idea #<?php echo $id; ?></p>
        </div>

        <br>
        <hr>
        <hr>
        <br>
        <?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
        // contacte la base de donnée 
        ?>
        <?php $sql = "SELECT * FROM condidat where id=:id"; ?>
        <?php $statement = $connection->prepare($sql); ?>
        <?php $statement->bindValue(":id", $id); ?>
        <?php $statement->execute(); ?>
        <?php $condidat = $statement->fetch(PDO::FETCH_ASSOC); ?>



        <?php if (isset($_POST['submit'])) : ?>
            <?php $condidat = array(
                'id' => $_POST['id'],
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'mtPasse' => $_POST['mtPasse'],
                'RTmtPasse' => $_POST['RTmtPasse'],
            );
            ?>

            <?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
            // contacte la base de donnée 
            ?>
            <?php $sql = "UPDATE condidat SET prenom=:prenom, nom=:nom, email=:email, mtPasse=:mtPasse, RTmtPasse=:RTmtPasse WHERE id=:id"; ?>
            <?php $statement = $connection->prepare($sql); ?>
            <?php $statement->execute($condidat); ?>

            <div style="background:green;color:white;padding:10px;">
                <p>Your have updated your idea succesfully</p>
            </div>
            <br>
        <?php endif; ?>
            <form method="post">
                <?php foreach ($condidat as $key => $value) : ?>
                    <?php
                    if ($key == 'prenom') : ?>
                        <div class="input-field">
                            <label for="prenom"><i class="fas fa-user-tie"></i> </label>
                            <input type="<?php echo $key; ?>" name="prenom" value="<?php echo $value; ?>" id="prenom" class="form-control" placeholder="prénom">
                        </div>
                    <?php elseif ($key == 'nom') : ?>
                        <div class="input-field">
                            <label for="nom"><i class="fas fa-users"></i> </label>
                            <input type="<?php echo $key; ?>" name="nom" 
                            value="<?php echo $value; ?>" id="nom" class="form-control" placeholder="nom">
                        </div>

                    <?php elseif ($key == 'email') : ?>

                        <div class="input-field">
                            <label for="email"><i class="fas fa-at"></i></label>
                            <input type="<?php echo $key; ?>" name="email" value="<?php echo $value; ?>" id="email" class="form-control" placeholder="email">
                        </div>
                    <?php elseif ($key == 'mtPasse') : ?>
                        <div class="input-field">
                            <label for="mdp_2"><i class="fas fa-lock"></i> </label>
                            <input type="<?php echo $key; ?>" name="mtPasse" value="<?php echo $value; ?>" id="mtPasse" class="form-control" placeholder="mtPasse">
                        </div>

                    <?php elseif ($key == 'RTmtPasse') : ?>
                        <div class="input-field">
                            <label for="confmdp"><i class="fas fa-lock-open"></i></label>
                            <input type="<?php echo $key; ?>" name="RTmtPasse" value="<?php echo $value; ?>" id="RTmtPasse" class="form-control" placeholder="RTmtPasse">
                        </div>

                    <?php else : ?>

                        <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>
                        " id="<?php echo $key; ?>" <?php if ($key == 'id') { echo 'readonly';} ?>>

                    <?php endif; ?>
                    <br>
                    <br>
                <?php endforeach; ?>
                <button onclick="f1()" class="btn btn-outline-secondary bg-success" id="update" type="submit" name="submit" value="Update your idea"> Update your idea</button>
            </form>
      

    <?php endif; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="app.js"></script>
</body>

</html>