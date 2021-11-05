<div class="cover-gradient full-height pt-5" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card card-dark">
                    <div class="card-body text-center p-5">
                        <main class="form-signin">
                            <?php
                            if (isset($error) && $error == true) {
                                ?>
                                <div class="alert alert-danger">→ Inscription impossible : Recommencer</div>
                                <?php
                            }
                            ?>

                            <form method="POST" action="./registration" name="registration"">
                                <h1 class="h3 mb-3 fw-normal text-light">Inscription</h1>

                                <div class="form-floating mt-2">
                                    <input name="login" type="email" class="form-control" id="floatingInput" placeholder="Email">
                                    <label for="floatingInput">Adresse Email</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="nom" type="text" class="form-control" id="floatingInput" placeholder="Nom">
                                    <label for="floatingInput">Nom</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="prenom" type="text" class="form-control" id="floatingPassword" placeholder="Prenom">
                                    <label for="floatingInput">Prenom</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                                    <label for="floatingPassword">Mot de passe</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input name="password2" type="password" class="form-control" id="floatingPassword" placeholder="Confirmation Mot de passe">
                                    <label for="floatingPassword">Confirmation Mot de passe</label>
                                </div>


                                <!-- http://www.thelin.net/laurent/labo/js/listesderoulantes.html -->

                                
                                <button type="submit" class="btn btn-outline-light m-2">Inscription</button>





                            </form>

                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>