<?php
namespace App\Controller;
use PDO;
use App\Controller\classes;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
function formulaireComptable($mois, $idVisiteur){
    try {

        /*$bd = ConnexionBdd::getConnexion();*/
        $bd = new PDO(

            'mysql:host=localhost;dbname=gsbFrais' ,
            'adminGsb' ,
            'azerty'
        );

        $sql = 'select * '
            . 'from FicheFrais '
            . 'where idVisiteur = :idVisiteur '
            . 'and mois = :mois';
        
            
    $st = $bd -> prepare( $sql ) ;

    $st -> execute( array( 
                            ':idVisiteur' => $idVisiteur ,
                            ':mois' => $mois 
                    ) 
                ) ;
    $resultat = $st -> fetch(PDO::FETCH_ASSOC);

    return $resultat;
    }

    catch( PDOException $e ){

        die("Erreur : " . $e->getMessage());
        header( 'Location: ../index.php?echec=0' ) ;
    }
} 

function suivreFicheFrais($mois, $idVisiteur){
    try {

        /*$bd = ConnexionBdd::getConnexion();*/

        $bd = new PDO(

            'mysql:host=localhost;dbname=gsbFrais' ,
            'adminGsb' ,
            'azerty'
        );

            $sql = 'select * '
            . 'from FicheFrais '
            . 'where idVisiteur = :idVisiteur '
            . 'and mois = :mois';
            
                
            $st = $bd -> prepare( $sql ) ;

            $st -> execute( array( 
                                ':mois' => $mois ,
                                ':idVisiteur' => $idVisiteur 

                            ) 
                        ) ;
            $resultat = $st -> fetch(PDO::FETCH_ASSOC);

            
            return $resultat;

        }

    catch( PDOException $e ){

        die("Erreur : " . $e->getMessage());
        header( 'Location: ../index.php?echec=0' ) ;
    }
} 

function modifierFicheFrais($nbJustificatifs, $montantValide, $mois, $idVisiteur){
        
    try {
        $bd = new PDO(
            'mysql:host=localhost;dbname=gsbFrais' ,
            'adminGsb' ,
            'azerty'
        );
        $sql = 'update FicheFrais ' 
            . 'set nbJustificatifs = :nbJustificatifs ' 
            . ', montantValide = :montantValide '
            . ', dateModif = date( now() ) '
            . ', idEtat = "VA" '
            . 'where idVisiteur = :idVisiteur '
            . 'and mois = :mois';


        $st = $bd -> prepare( $sql ) ;

        return $st -> execute(array(
                          ':mois' => $mois ,
                          ':idVisiteur' => $idVisiteur ,
                          ':nbJustificatifs' => $nbJustificatifs ,
                          ':montantValide' => $montantValide 
                        )
                    ) ;
        
        
    }
    catch( PDOException $e ){
          die("Erreur : " . $e->getMessage());
          header( 'Location: ../index.php?echec=0' ) ;
    }
} 

function rembourserFicheFrais($mois, $idVisiteur){
        
    try {
        $bd = new PDO(
            'mysql:host=localhost;dbname=gsbFrais' ,
            'adminGsb' ,
            'azerty'
        );
        $sql = 'update FicheFrais ' 
            . 'set idEtat = :idEtat '
            . ', dateModif = date( now() ) '
            . 'where idVisiteur = :idVisiteur '
            . 'and mois = :mois';
            


        $st = $bd -> prepare( $sql ) ;

        return $st -> execute(array(
                          ':idEtat' => "RB" ,
                          ':mois' => $mois ,
                          ':idVisiteur' => $idVisiteur 
                        )
                    ) ;
        
        
    }
    catch( PDOException $e ){
          die("Erreur : " . $e->getMessage());
          header( 'Location: ../index.php?echec=0' ) ;
    }
} 

function detailFicheFraisForfait($mois, $idVisiteur){
    try {

        /*$bd = ConnexionBdd::getConnexion();*/
        $bd = new PDO(

            'mysql:host=localhost;dbname=gsbFrais' ,
            'adminGsb' ,
            'azerty'
        );

        $sql = 'select * from LigneFraisForfait'
                . ' where idVisiteur = :idVisiteur '
                . 'and mois = :mois';
        
            
    $st = $bd -> prepare( $sql ) ;

    $st -> execute( array( 
                            ':idVisiteur' => $idVisiteur ,
                            ':mois' => $mois 
                    ) 
                ) ;
    $resultat = $st -> fetch(PDO::FETCH_ASSOC);

    return $resultat;
    }

    catch( PDOException $e ){

        die("Erreur : " . $e->getMessage());
        header( 'Location: ../index.php?echec=0' ) ;
    }
} 

function detailFicheFraisHorsForfait($mois, $idVisiteur){
    try {

        /*$bd = ConnexionBdd::getConnexion();*/
        $bd = new PDO(

            'mysql:host=localhost;dbname=gsbFrais' ,
            'adminGsb' ,
            'azerty'
        );

        $sql = 'select * from LigneFraisHorsForfait'
                . ' where idVisiteur = :idVisiteur '
                . 'and mois = :mois';
        
            
    $st = $bd -> prepare( $sql ) ;

    $st -> execute( array( 
                            ':idVisiteur' => $idVisiteur ,
                            ':mois' => $mois 
                    ) 
                ) ;
    $resultat = $st -> fetch(PDO::FETCH_ASSOC);

    return $resultat;
    }

    catch( PDOException $e ){

        die("Erreur : " . $e->getMessage());
        header( 'Location: ../index.php?echec=0' ) ;
    }
} 
?>