<?php
require_once 'config.php';
//OTURUMU SONLANDIR
session_destroy();
header('Location: index.php');
exit;
