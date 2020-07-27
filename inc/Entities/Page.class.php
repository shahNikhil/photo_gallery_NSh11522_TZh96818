<?php

class Page
{

    //Set the title of your page!
    static $title = "PhotoGallery";
    static $subTitle = "";
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
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="inc/css/login.css">
        </head>

        <body>
            <div class="jumbotron text-center">
                <h1><?php echo self::$title; ?></h1>
                <h4><?php echo self::$subTitle; ?></h4>
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
    static function displayLoginForm()
    {
    ?>
        <div class="login-form">
            <form action="/examples/actions/confirmation.php" method="post">
                <h2 class="text-center">Log in</h2>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>
                <div class="clearfix">
                    <a href="#" class="float-right">Forgot Password?</a>
                </div>
            </form>
            <p class="text-center"><a href="registration.php">Create an Account</a></p>
        </div>

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

    //this method handles the photo uploaded by the user to gallery!!
    static function Uploadphoto()
    {
    ?>
        <div class="login-form">
            <form id="login" action="photoinfoadd.php" enctype="multipart/form-data" method="POST">

                <section id="info_menu">

                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea input id="description" name="description" type="text" rows="5" placeholder="Write Something about Your Photo"></textarea>
                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary btn-block" name="Registerphoto">GO!!!</button>
                    </div>
                </section>
            </form>
        </div>
<?php
    }
}
