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



$test->getList($citation);


print_r($citation) ;

