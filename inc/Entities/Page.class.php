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
            <div class="jumbotron">
                <?php
                if (isset($_SESSION) && isset($_SESSION['loggedin'])){
                    echo '<div class="pull-right">';
                    echo '  <div><a href="login_handler.php?logout">Logout</a></div>';
                    echo '</div>';
                }
                ?>    
                <div class="text-center">
                    <h1><?php echo self::$title; ?></h1>
                    <h4><?php echo self::$subTitle; ?></h4>
                </div>
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
            <form action="login_handler.php" method="POST">
                <h2 class="text-center">Log in</h2>
                <div class="form-group">
                    <input type="text" autofocus name="username" class="form-control" placeholder="username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password" required="required">
                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="role" value="admin">
                    <label class="form-check-label" for="role">
                        Login as administrator
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="login">Log in</button>
                </div>
            </form>
            <p class="text-center"><a href="registration.php">Create an Account</a></p>
        </div>

    <?php
    }
    //This method will display any validation errors which are required to register a user
    static function displayErrors($errors){
        echo '<div class="container card jumbotron"><ol>';
        foreach($errors as $e){
            echo"<li class='text-dark mb-1'> $e </li>";
        }
        echo '</ol><form class="form text-primary">
        <div class="form-row text-primary">
        <label>Please Register again!!</label></div>
        <div class="form-row">
        <input type="button" value="Go back!" onclick="history.back()"></div>
       </form></div>';

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
                    <form id="login" action="registration_handler.php" enctype="multipart/form-data" method="POST">

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
    static function uploadPhoto()
    {
    ?>
        <div class="login-form">
            <form id="login" action="Uploadmanager.php" enctype="multipart/form-data" method="POST">

                <section id="info_menu">

                    <div class="custom-file mb-3">
                        <input type="file" class="btn  " name="photo" id="customFile">

                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea input id="description" name="description" type="text" rows="5" placeholder="Write Something about Your photo"></textarea>
                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary btn-block" name="Registerphoto">GO!!!</button>
                    </div>
                    <div class="form-group">
                        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                    </div>
                </section>
            </form>
        </div>
    <?php
    }
    //this method is used to display the photo list of a particular user
    static function displayPhotolist($photo_list)
    { ?>
        <div class="container bg-light border border-dark mb-3 mt-3 rounded-lg p-3">
            <div class="row align-items-center" style="margin:auto;">
                <div class="col">Please <a href="photo_upload.php">Click here to Upload photos!</a></div>
            </div>
        </div>
        <?php
        foreach ($photo_list as $photo) {
        ?>
            <div class="container bg-light border border-dark mb-3 mt-3 rounded-lg p-3">
                <div class="row align-items-center font-weight-bold" style="margin:auto;">
                    <div class="col mr-3">
                        <a href="<?php echo $photo->getFilepath(); ?>">
                            <img src="<?php echo $photo->getFilepath(); ?>" width="150px" height="150px" class="rounded" alt="Cinque Terre">
                        </a>
                    </div>
                    <div class="col"><?php echo $photo->getDisplay_name(); ?></div>
                    <div class="col col-md-3"><?php echo $photo->getDescription(); ?></div>
                    <div class="col text-primary">
                        <?php
                        echo '<a href="photo_info.php?action=edit&photoID=' . $photo->getId() . '">';
                        ?>
                        <i class="fa fa-pencil-square-o text-primary" aria-hidden="true"></i> Details</div>
                    <div class="col text-primary">
                        <?php
                        echo '<a href="' . $_SERVER["PHP_SELF"] . '?action=delete&photoID=' . $photo->getId() . '"> ';
                        ?>
                        <i class="fa fa-trash text-primary" aria-hidden="true"></i> Delete</div>
                </div>
            </div>
        <?php
        }
    }
    // this methods give a confiramation message to user for registration
    static function backToLogin()
    {
        ?>
        <div class="container bg-light border border-dark mb-3 mt-3 rounded-lg p-3">
            <div class="row align-items-center" style="margin:auto;">
                <div class="col">Please <a href="login.php">Click here to go back to your gallery!</a></div>
            </div>
        </div>
    <?php
    }
    static function backToPhotoList()
    {
    ?>
        <div class="container bg-light border border-dark mb-3 mt-3 rounded-lg p-3">
            <div class="row align-items-center" style="margin:auto;">
                <div class="col">Please <a href="photo_list.php">Click here to go back to your gallery!</a></div>
            </div>
        </div>
    <?php
    }
    //this method is usedto authenticate the admin 
    static function displayAdminPanel()
    {
    ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">

            <form class="form-inline" action="" enctype="multipart/form-data" method="POST">
                    <input class="form-control ml-5 mr-sm-5" name='users' type="search" placeholder="Search" aria-label="Search">
                    <button class="bg-primary text-light ml-5" name="search" type="submit">Search by username</button>
                    <button class="bg-primary text-light ml-5" name="public_gallery" type="submit">View all photos</button>
                    <button class="bg-primary text-light ml-5" name="all_users" type="submit">View all users</button>
                </form>

        </nav>
    <?php
    }
    //this edit the photos of a user who has logged in
    static function editPhotoForm($photo)
    {  ?>
        <!-- Start the page's edit entry form -->
        <div class="d-flex justify-content-center ">
            <div class="img mr-3">
                <img src="<?php echo $photo->getFilepath(); ?>" class="img-thumbnail" alt="<?php echo $photo->getDisplay_name()?>">
            </div>
            <div class="form mr-3">
                <div class="login-form bg-light border">
                    <h3 class="text-center text-primary border">Edit photo - <?php echo $photo->getId(); ?></h3>
                    <form class="text-center" action="" method="post">
                        <div class="form-group row">
                            <label class="form-check-label">photo ID</label>
                            <label class="form-check-label"><?php echo $photo->getId(); ?></label>
                        </div>
                        <?php
                        $display_name = $photo->getDisplay_name();
                        $description = $photo->getDescription();
                        ?>
                        <div class="form-group row">
                            <label class="form-check-label">Name</label>
                            <label class="form-check-label">
                                <input type="text" name="display_name" value="<?php echo $photo->getDisplay_name(); ?>"></label>
                        </div>

                        <div class="form-group row">
                            <label class="form-check-label">Description</label>
                            <label class="form-check-label">
                                <input type="text" name="description" value="<?php echo $photo->getDescription(); ?>"></label>
                        </div>

                        <input type="hidden" name="photoID" value="<?php echo $photo->getId(); ?>">

                        <!-- Use input type hidden to let us know that this action is to edit -->
                        <input type="hidden" name="action" value="edit">
                        <input type="submit" name="submit" class="button " value="Edit Photo">
                    </form>
                </div>            
            </div>
        </div>
<?php }
 //this method display all the photo to admin uploaded by users
 static function displayphotoGrid($users){
?>
<div class="container">
    <h1>Public Gallery :</h1>   
   <table class="table">
    <?php
    for($i=0;$i<count($users);$i++)
    {
  
          echo "<tr>
                <td><img class='img-thumbnail' height='300px' width='300px' src=".$users[$i]->getFilepath()."></img></td>
                <td><h6 class='m-2'>".$users[$i]->username."</h6></td>
                </tr>";
}
 ?>

   </table>
</div>
 <?php
    }

    //this method displays all the list of user for delete
    static function displayUserlist($users)
    {
        ?>
    <div class="container">
    <h1>Public Gallery :</h1>   
   <table class="table table-striped border">
       <tr>
       <th>UserID</th>
       <th>Username</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Email</th>
       <th>Delete</th></tr>
    <?php
    foreach($users as $user)
    {
     echo "<tr><td>".$user->getId()."</td>" ;  
     echo "<td>". $user->getUsername() ."</td>" ;
     echo "<td>".$user->getFirstName()."</td>" ;
     echo "<td>".$user->getEmail()."</td>" ;
     echo "<td>".$user->getId()."</td>" ;
     echo '<td> <a href="' . $_SERVER["PHP_SELF"] . '?action=delete&UserID=' . $user->getId() . '">
                <i class="fa fa-trash text-primary" aria-hidden="true"></i> Delete </td></tr>' ;
    } ?>
   </table>
   <?php }
}

?>