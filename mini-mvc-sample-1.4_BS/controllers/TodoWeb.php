<?php
namespace controllers;

use controllers\base\Web;
use models\TodoModel;
use utils\SessionHelpers;

class TodoWeb extends Web
{
    private $todoModel;

    function __construct()
    {
        $this->todoModel = new TodoModel();

    }
    function liste()
    {
        $this->header(); // Affichage de l'entête.
        $todos = $this->todoModel->todononterminer(); // Récupération des TODOS présents en base.
        include("views/todos/liste.php"); // Affichage de votre vue.
        $this->footer(); // Affichage de votre pied de page.
    }



    function ajouter($texte = "")
    {
        $personne_co = SessionHelpers::getConnected();

        if (SessionHelpers::getConnected() == NULL) {
            $this->redirect("../login");
        }
        else{
            $this->todoModel->ajouterTodo($texte);
            $this->redirect("./liste");

        }
        

        
    }




    function terminer($id = ""){
        if($id != ""){
            $this->todoModel->marquerCommeTermine($id);
        }

        $this->redirect("./liste");
    }
    function supprimer($id = ""){
        if($id != ""){
            $this->todoModel->supprimerTodo($id);
        }

        $this->redirect("./liste");
    }
    function registration()
    {
        $error = false;
        if (isset($_POST['login']) && isset($_POST['prenom']) && isset($_POST['nom'])&& isset($_POST['password']) == isset($_POST['password2']) )
        {
            if ($this->todoModel->registration($_POST["prenom"], $_POST["nom"], $_POST["login"],( password_hash($_POST["password"], PASSWORD_DEFAULT))))
            {
                $this->redirect("./");


            }
            else
            {
                $error = true;
            }
        }
        $this->header();
        include("views/config/inscription.php");
        $this->footer();
    }

    function login()
    {
        $error = false;
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if ($this->todoModel->login($_POST["login"], $_POST["password"])) {

                $this->redirect("./");
            } else {
                // Connexion impossible avec les identifiants fourni.
                $error = true;
            }
        }

        $this->header();
        include("views/config/connexion.php");
        $this->footer();
    }
    function logout()
    {
        SessionHelpers::logout();
        $this->redirect("./login");
    }
    // Affiche l'utilisateur actuellement connecté.
    function me()
    {
        $this->header();
        include("views/config/me.php");
        $this->footer();
    }

}