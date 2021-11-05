<div class="cover-gradient full-height pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card card-dark">
                    <div class="card-body text-center p-5">
                        <main class="form-signin">
                            <?php
                            if (isset($error) && $error === true) {
                                ?>
                                <div class="alert alert-danger">Identifiant de connexion invalide</div>
                                <?php
                            }
                            ?>

                            <form method="POST" action="./login">
                                <h1 class="h3 mb-3 fw-normal text-light">Connexion</h1>

                                <div class="form-floating">
                                    <input name="login" type="email" class="form-control" id="floatingInput" placeholder="Email">
                                    <label for="floatingInput">Adresse email</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                                    <label for="floatingPassword">Mot de passe</label>
                                </div>

                                

                                <button type="submit" class="btn btn-outline-light m-2">Connexion</button>
           

                            </form>


                        </main>
                        <p style="margin-top: 20px; margin-bottom: -20px; color: #a7a4a4">Pas encore de compte ?&ensp;<a href="./registration">S'incrire</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>