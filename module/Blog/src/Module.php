<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 10/01/2018
 * Time: 21:01
 */

namespace Blog;

class Module
{

    public function getConfig(){
        return include  __DIR__ . '/../config/module.config.php';
    }



}