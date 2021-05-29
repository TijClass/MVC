<?php ob_start(); ?>


<div class="container-login100">
    <div class="p-t-10 display">


    </div>
    <div class="wrap-login100">
        <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="<?= URL ?>admin/connexion">
            <span class="login100-form-title">
                Sign In
            </span>

            <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                <input class="input100" type="email" name="username" placeholder="Username">
                <span class="focus-input100"></span>
            </div>


            <div class="wrap-input100 validate-input" data-validate="Please enter password">
                <input class="input100" type="password" name="pass" placeholder="Password">
                <span class="focus-input100"></span>
            </div>


            <div class="text-center p-t-13 p-b-23">

            </div>

            <div class="container-login100-form-btn">
                <input class="login100-form-btn" type="submit" name="send" value="sign in" />
            </div>

            <div class="p-t-10 display">
                <div class="p-t-10 display">
                    <?php if (!empty($_SESSION['alert'])) : ?>
                        <div class="alert  <?= $_SESSION['alert'][0];  ?>" role="alert" id="alerts">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $_SESSION['alert'][1]; ?>
                        </div>

                    <?php
                        unset($_SESSION['alert']);

                    endif;
                    ?>
                </div>
            </div>



            <div class="flex-col-c p-t-170 p-b-40">
                <span class="txt1 p-b-9">
                    Don’t have an account?
                </span>

                <a href="#" class="txt3">
                    Sign in
                </a>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = "Login";
require 'views/includes/login/template.php';
