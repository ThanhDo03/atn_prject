<?php
session_start();
unset($_SESSION['Welcome']);
header('Location: index.php');