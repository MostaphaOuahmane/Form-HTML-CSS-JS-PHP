<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
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
                        <label for="prenom"><i class="fas fa-users"></i> </label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="nom">
                    </div>
                    <div class="input-field">
                        <label for="email"><i class="fas fa-at"></i></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <label for="mdp_2"><i class="fas fa-lock"></i> </label>
                        <input type="password" name="mdp_2" id="mdp_2" class="form-control"
                            placeholder="Choisissez mt passe">
                    </div>
                    <div class="input-field">
                        <label for="confmdp"><i class="fas fa-lock-open"></i></label>
                        <input type="password" name="confmdp" id="confmdp" class="form-control"
                            placeholder="Retapez mt de pass">
                    </div>
                    <button type="submit" id="submit_2" value="inscription" class="btn btn-primary">S'inscrire</button>
                    <button id="reset_form" class="btn2">Effacer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>