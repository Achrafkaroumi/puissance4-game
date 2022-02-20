<?php
    try{
        $connect=new PDO('mysql:host=localhost;dbname=puissance4_projet;port=3306','root','');
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>