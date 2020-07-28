<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Page.class.php");

require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");

Page::$subTitle = "My Photos"; //TODO: make it a better name?
Page::header("PhotoGallery");

// View a list of photo, and click link to photo_info.php

// TODO: Display a link to add photo - include in the Page class
echo "<a href='photo_upload.php'>Add Photo</a>";

Page::footer();
?>