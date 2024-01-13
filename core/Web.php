<?php
use App\Helper\SessionHelper;
require '../core/config.php';
require '../core/Router.php';
SessionHelper::start();
Router::getInstance();


