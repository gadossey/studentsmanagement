<?php
   // define site root
   defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
   defined('SITE_ROOT') ? null : define('SITE_ROOT', DS .'xampp'.DS.'htdocs'.DS.'STUDENTMANAGEMENT');

   // xampp/htdocs/STUDENTMANAGEMENT/includes
   defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
   // xampp/htdocs/STUDENTMANAGEMENT/core
   defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

   // load config file first
   require_once(INC_PATH.DS."config.php");
   //require_once("C:/xampp/htdocs/STUDENTMANAGEMENT/includes/config.php");
   
   // core classes
   //require_once('C:/xampp/htdocs/STUDENTMANAGEMENT/core/student.php');
   require_once(CORE_PATH.DS.'student.php');

?>