<?php
session_start();

include('./modules/DB.php');
include('./modules/Visitor.php');
include('./modules/User.php');
include('./modules/Admin.php');
include('./modules/Category.php');
include('./modules/Brand.php');
include('./modules/Product.php');
include('./modules/Order.php');
include('./modules/Comment.php');
include('./modules/Rating.php');
include('./modules/Feedback.php');
include('./modules/Message.php');

$error = (isset($_GET['error'])) ? "<div id='errorAlert' class='alert alert-danger' role='alert'><button type='button' class='btn-close me-3 align-middle' aria-label='Close'></button>{$_GET['error']}</div>": "";
$success = (isset($_GET['success'])) ? "<div id='successAlert' class='alert alert-success' role='alert'><button type='button' class='btn-close me-3 align-middle' aria-label='Close'></button>{$_GET['success']}</div>": "";

?>