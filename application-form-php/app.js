
let formInscrip = document.getElementById('form_inscription');
// console.log(btn);
// écoute de l'envoie du formulaire
formInscrip.addEventListener('submit', inscriptionForm);

// fonction pour traiter le formulaire
function inscriptionForm(event) {
  // permet de ne pas envoyer le formulaire, pour ne pas rafraîchir la page
  event.preventDefault();//on trouve parfois e pour appeler event
  // console.log(event.target);

  // https://regex101.com/
  // expression reguliere pour valider les emails
  let regex = /([a-z0-9](\.?|\_|\-))*@([a-z0-9]{2,})(\.[a-z]{2,}){1,}/;
  // let regex = new RegExp("([a-z0-9](\.?|\_|\-))*@([a-z0-9]{2,})(\.[a-z]{2,}){1,}");

  // récupération du contenu des champs
  let prenom = event.target.prenom.value,
      nom = event.target.nom.value,
      mdp_2 = event.target.mdp_2.value,
      confmdp = event.target.confmdp.value,
      email = event.target.email.value;

  // console.log(prenom,nom,email,mdp_2,confmdp);
  // prenom et nom ne sont pas vide
  if (prenom !== '' || nom !== '') {
      if (prenom.length < 2) {
          // classList représente toute les classes de l'élément event.target
          // add ajoute une class à l'élément event.target
          // console.log(event.target.prenom.classList);
          event.target.prenom.classList.add("error");
          event.target.prenom.classList.remove("valide");
      } else {
          event.target.prenom.classList.add("valide");
          event.target.prenom.classList.remove("error");
      }
      if (nom.length < 4) {
          event.target.nom.classList.add("error");
          event.target.nom.classList.remove("valide");
      } else {
          event.target.nom.classList.add("valide");
          event.target.nom.classList.remove("error");
          // sinon on "valide"
      }
  }// fin condition prenom / nom

  //nouvelle condition les mots de passe sont-ils identiques 
  if (confmdp !== mdp_2) {//si ils sont différents
      event.target.mdp_2.classList.add("error");
      event.target.mdp_2.classList.remove("valide");
      event.target.confmdp.classList.add("error");
      event.target.confmdp.classList.remove("valide");
  } else if (mdp_2.length < 5 || mdp_2.length > 12) {// longueur du mdp entre 5 et 12
      event.target.mdp_2.classList.add("error");
      event.target.mdp_2.classList.remove("valide");
      event.target.confmdp.classList.add("error");
      event.target.confmdp.classList.remove("valide");
  } else { // tout est bon 
      event.target.mdp_2.classList.add("valide");
      event.target.mdp_2.classList.remove("error");
      event.target.confmdp.classList.add("valide");
      event.target.confmdp.classList.remove("error");
  }

  // console.log(regex.test(email));
  if(regex.test(email) === false){
  // if(!regex.test(email)){
      event.target.email.classList.add("error");
      event.target.email.classList.remove("valide");
  } else {
      event.target.email.classList.remove("error");
      event.target.email.classList.add("valide");
  }
}// fin fonction
// document.getElementById("reset_form").addEventListener("click", (e) => {})

document.getElementById("reset_form").addEventListener("click", function(event) {
  // console.log(event.target.form);
  event.target.form.prenom.value = "";
  event.target.form.nom.value = "";
  event.target.form.email.value = "";
  event.target.form.mdp_2.value = "";
  event.target.form.confmdp.value = "";
});