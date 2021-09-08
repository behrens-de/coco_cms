<?
// ADMIN AREA - Jan Behrens // Coco CMS 2021
session_start(); $SID = session_id();

define('PREFIX', 'public/admin/'); // Wird aus dem Request der URL entfernt
include __DIR__.'/../../private/autoload.php'; // Autoloader für geladen
include __DIR__.'/../../private/include.php'; // Includes werden geladen
