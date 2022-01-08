<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>updite</title>
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
    <div class="row g-2">

      <h1>col update</h1>
      <p><a href="index.php"> Go Back To The HomePage</a></p>
      <?php if (isset($_GET['id'])) : ?>
        <?php $id = $_GET['id']; ?>
        <?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
        // contacte la base de donnée
        ?>
        <?php $sql = "SELECT * FROM condidat WHERE id=:id"; ?>
        <?php $statement = $connection->prepare($sql); ?>
        <?php $statement->bindValue(":id", $id); ?>
        <?php $statement->execute(); ?>
        <?php $condidat =  $statement->fetch(PDO::FETCH_ASSOC); ?>
        <?php //print_r($payment); 
        ?>
        <div style="background-color: orange;color:#fff; padding: 20px;">
          <p>you are updating col id : #<?php echo $id ?> in table condidat </p>
        </div>
        <hr>
        <hr>
        <br>
        <?php if (isset($_POST['submit'])) : ?>
          <?php $condidat_upd = array(

            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'email' => $_POST['email'],
            'mtPasse' =>  $_POST['mtPasse'],
            'RTmtPasse' => $_POST['RTmtPasse']

          ); ?>



          <?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
          // contacte la base de donnée
          ?>
          <?php $sql = " UPDATE condidat SET prenom=:prenom, nom=:nom, email=:email, mtPasse=:mtPasse, RTmtPasse=:RTmtPasse where id=:id "; ?>
          <?php $statement = $connection->prepare($sql); ?>
          <?php $statement->execute($condidat); ?>

          <div style="background-color: green; color:black; padding: 10px; text-align:center;">
            <p>Your have updated your idea succesfully</p>

          </div>
        <?php endif; ?>


        <form method="post">
          <?php foreach ($condidat as $key => $value) : ?>
            <label for="<?php echo $key; ?>"><?php echo $key; ?></label>
            <?php if ($key == 'text' || $key == 'email' || $key == 'mtPasse' || 'RTmtPasse') : ?>
              <textarea name="<?php echo $key; ?>" rows="8" cols="80"><?php echo $value; ?></textarea>
            <?php else : ?>
              <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" id="<?php echo $key; ?>" <?php if ($key == 'id') {
                                                                                                                      echo 'readonly';
                                                                                                                    } ?>>

            <?php endif; ?>
            <br>
            <br>
          <?php endforeach; ?>
          <input type="submit" name="submit" value="Update your idea">
        </form>
      <?php endif; ?>
    </div>


  </div>
  </div>




</body>

</html>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="app.js"></script>
</body>

</html>