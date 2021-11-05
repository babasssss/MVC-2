<?php

use utils\Gravatar;
use utils\SessionHelpers;

$account = SessionHelpers::getConnected();
?>
<div class="container mt-5">
    <div class="row">
        <div class="card">

            <div class="card-body text-center" >
                <img  class="m-5 position"  src="<?= Gravatar::get_gravatar($account['email']) ?>"/>
                <h3 class="text-center pb-5"><?= $account['username'] ?> </h3>
        
                    <a class="btn btn-danger d-block full" href="./logout" style="float: right; margin-top: -250px;">Déconnexion</a>
                <h1>Mini MVC Sample</h1>
                <p>Grâce à Mini MVC Sample Encore Plus de todo liste disponible avec nos todo liste de tout nos utilisateur. Avec ce système vousus avez accés aux todo liste toute-comprise.</p>

                <div class="mt-5">
                    
                    <a class="btn btn-danger d-block full" href="./todo/liste" >Voir les todos listes </a>
                </div>

            </div>
        </div>
    </div>
</div>


