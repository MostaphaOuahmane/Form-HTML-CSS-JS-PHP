<?php  require_once('config.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- lin icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- custom css file link  -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" />
</head>

<body>

<div class="container">
  <div class="row g-2 mt-5">
  

    <div class="col-8 mx-auto">
      <div class="p-3  bg-light">
        <button type="button" class="btn btn-secondary">
        <a href="index.php" class="indigo-900"> Go Back To The HomePage</a>
      </button>
   
     <?php if (isset($_GET['id'])) : ?>
    <?php $id = $_GET['id']; ?>
    <?php $connection = new PDO($date_base, $bd_user, $bd_motPasse, $chercher_faute);
// contacte la base de donnée
?>
  <?php $sql = "DELETE FROM condidat WHERE id=:id"; ?>
    <?php $statement = $connection->prepare($sql); ?>
    <?php $statement->bindValue(":id", $id); ?>
    <?php $statement->execute(); ?>
    <div style="background-color: red;color:#fff;padding: 20px;">
        <p>COL id : #<?php echo $id ?> in table payment is deleted</p>
    </div>
    <?php endif; ?>

  
  
  
  
</div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="app.js"></script>
</body>

</html>