<?php

class Page
{

    //Set the title of your page!
    static $title = "PhotoGallery";

    // this method will display the top part of the page
    static function header($title)
    {
?>
        <!DOCTYPE html>
        <html lang="en" style="zoom: 80%;">

        <head>
            <title><?php echo $title; ?></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>

        <body>
            <div class="jumbotron text-center">
                <h1>Photo gallery</h1>
                <h4>Please fill the form to register</h4>
            </div>
        <?php
    }

    // this method will display the bottom part of the page
    static function footer()
    {
        ?>

        </body>

        </html>
    <?php
    }
    // this method will display the login form
    static function displayLoginForm(){
    ?>
        <p>login page</p>
    <?php
    }
    // this method will display the registration form
    static function displayRegistrationForm()
    {
    ?>
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">
                    <strong>Registration</strong>
                </div>
                <div class="card-body jumbotron font-weight-bold mb-0">
                    <form id="login" action="registration_handler.php" method="POST">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name :</label>
                                <input id="firstname" name="firstname" type="text" placeholder="Enter your First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name :</label>
                                <input id="lastname" name="lastname" type="text" placeholder="Enter your Last Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email :</label>
                                <input id="email" name="email" type="email" placeholder="example@domain.com">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mobileno">Mobile No :</label>
                                <input id="mobileno" name="mobileno" type="int" maxlength="10" placeholder="Enter your correct number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address">Address :</label>
                                <textarea input id="address" name="address" type="address" placeholder="Full Address"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">User Name :</label>
                                <input id="username" name="username" type="text" placeholder="Enter a unique username">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password :</label>
                                <input id="Password" name="password" type="password" placeholder="">
                            </div>
                            <br />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button class="btn btn-primary" type="submit" name="Register">Register</button>
                            </div>
                        </div>
                        <fieldset>

                            <h3 align="center">Note : click on the login! if already registered.</h3>
                            <p align="center">
                                <button class="btn btn-primary" type="submit"><a class="text-white" href="login.php">Login</a></button>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
