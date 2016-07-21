<?php
require_once 'functions.php';

function pageController() {
	session_start();
    clearSession();
    redirect("login.php");
}

pageController();