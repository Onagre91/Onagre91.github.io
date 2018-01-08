<?php
session_start();

define('ROOT', str_replace('index.php', '' , $_SERVER['SCRIPT_FILENAME']));
define('WEBROOT', str_replace('index.php', '' , $_SERVER['SCRIPT_NAME']));

if (isset($_GET["controller"]) && isset($_GET["action"])) {
  if (is_file("Controller/".$_GET["controller"].".php")) {
    require_once("Model/model.php");
    include_once("Controller/".$_GET["controller"].".php");
    $instance_obj = $_GET["controller"];
    $obj = new $instance_obj;
    if (method_exists($obj, $_GET["action"])) {
      $action = $_GET["action"];
      $obj->$action();
    } else {
      echo "Erreur 404 Methode !";
    }
  } else {
    echo "Erreur 404 Fichier !";
  }
}