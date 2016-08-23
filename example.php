<?php
/**
 * User: Duran CHEN
 * Email: duran.chen@gmail.com
 * Date: 8/22/16
 * Time: 9:53 PM
 */

require 'vernder/autoload.php';

$url = [
    'http:///www.apple.com',
    'http://php.net',
    'http://sdafsafadfa.org'
];

$scanner = new \Duranchen\Url\Scanner($urls);

print_r($scanner->getInvalidUrls());