<?php
class ConexionDB{
    //static public function
    static public function conectar(){

        $bd = new PDO("mysql:host=localhost;dbname=spec", "root", "");

        $bd -> exec("set names utf8");

        return $bd;

    }

}