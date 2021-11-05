<?php
namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function ajouterTodo($texte = "")
    {
        if ($texte != "")
        {
            $personne_co = SessionHelpers::getConnected();

            $stmt = $this->pdo->prepare("INSERT INTO todos (texte,nomInscrit,emailInscrit) VALUES (:texte, :nom, :email) ");
            $stmt -> bindParam(':texte', $texte);
            $stmt -> bindParam(':nom', $personne_co['username']);
            $stmt -> bindParam(':email', $personne_co['email']);

            $stmt->execute();

        }

    }

    function marquerCommeTermine($id)
    {
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }


    function supprimerTodo($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ? and termine=1 ");
        $stmt->execute([$id]);
    }
    function todononterminer()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE termine!=1 ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function registration($prenom,$nom,$email,$mdp){


        $stmt = $this->pdo->prepare("SELECT EMAILINSCRIT FROM inscrit WHERE EMAILINSCRIT= (:email);");
        $stmt -> bindParam(':email', $email);
        $stmt->execute();
        $Email = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($Email == null)
        {
            $stmt = $this->pdo->prepare ("INSERT INTO inscrit (IDINSCRIT, NOMINSCRIT,PRENOMINSCRIT,EMAILINSCRIT,MOTPASSEINSCRIT) VALUES (null,:nom, :prenom, :email, :mdp);");
            $stmt -> bindParam(':nom', $nom);
            $stmt -> bindParam(':prenom', $prenom);
            $stmt -> bindParam(':email', $email);
            $stmt -> bindParam(':mdp', $mdp);

            $stmt -> execute();


            $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE EMAILINSCRIT=? LIMIT 1");
            $stmt->execute([$email]);
            $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);

            SessionHelpers::login(array("usernameN" => "{$inscrit["NOMINSCRIT"]}","usernameP"=> "{$inscrit["PRENOMINSCRIT"]}", "email" => $inscrit["EMAILINSCRIT"],"username" => "{$inscrit["NOMINSCRIT"]} {$inscrit["PRENOMINSCRIT"]}"));
            return true;    

        }
        else{

            return false ;
        }




    }
    public function login($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM inscrit WHERE EMAILINSCRIT=? LIMIT 1");
        $stmt->execute([$username]);
        $inscrit = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($inscrit !== false && password_verify($password, $inscrit['MOTPASSEINSCRIT'])) {
            SessionHelpers::login(array("usernameN" => "{$inscrit["NOMINSCRIT"]}","usernameP"=> "{$inscrit["PRENOMINSCRIT"]}", "email" => $inscrit["EMAILINSCRIT"],"username" => "{$inscrit["NOMINSCRIT"]} {$inscrit["PRENOMINSCRIT"]}"));
            return true;
        } else {
            //SessionHelpers::logout();
            return false;
        }
    }


}