<?php
/**
 * Created by PhpStorm.
 * User: cerynna
 * Date: 10/12/17
 * Time: 19:45
 */

require __DIR__ . '/vendor/autoload.php';

require "MyBot.php";

$test = new MyBot();

$mystring = "non, mais attention ! si je deviens. pape, y'a ?rien qui ? m'empêche de revenir de temps en temps pour !faire un petit coucou.";

$mystring = $test->formatCitation($mystring);


echo $mystring;