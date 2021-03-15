<?php
$options =array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8');
    $pdo = new PDO('mysql:host=localhost;dbname=eleve','root','',$options); 
//Gestion du format json
//json_encode() pour transformer un tableau array php en format json
//json_decode() pour transformer un format json en tableau array (ou object)

//on prépare un tableau array qui contiendra la réponse pour Ajax

//CE QU'IL FAUT RETENIR C'EST QUE LE TABLEAU $tab RECOIT LA REPONSE A LA REQUETE SQL 

$tab = array();
$tab['resultat'] = '';


    if(!empty($_POST['code_region'])) {
        $req = $pdo->prepare("SELECT name, code FROM departments WHERE region_code = :region_code");
        $req->bindParam(':region_code',$_POST['code_region'], PDO::PARAM_STR);
        $req->execute();

        while($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($ligne);
            $tab['resultat'] .='<option value="'.$ligne['code'].'">'.$ligne['name'].'</option>';
            
        }
    }

    if(!empty($_POST['ville'])) {
        $name = $_POST['ville'] . '%';
        $req = $pdo->prepare("SELECT DISTINCT ville FROM cpville WHERE ville LIKE :ville");
        $req->bindParam(':ville', $name, PDO::PARAM_STR);
        $req->execute();
    
        while($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            // var_dump($ligne);
            $tab['resultat'] .= '<option>' . $ligne['ville']  . '</option>';
        }
    }

    //la réponse pour l'ajax (le seul affichage de cette page)
    echo json_encode($tab);