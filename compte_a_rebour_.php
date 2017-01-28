<?php
    $annee = date('Y');

    $abo = time +2;

    if ($abo < time ())
    {
        $abo = time +2;
    }

    $tps_restant = $abo - time(); //$noel  sera toujours plus grand que le timestamp actuel,vu que c'est 

    //===================== CONVERSIONS

    $i_restantes = $tps_restant /60;
    $H_restantes = $i_restantes /60;
    $d_restants  = $H_restantes /24;


    $s_restantes = floor($tps_restant %60);   //Secondes restantes
    $i_restantes = floor($i_restantes %60);  //Secondes restantes
    $H_restantes = floor($H_restantes %24); //Secondes restantes
    $d_restants  = floor($d_restants);     //Jours restants
    //=======================

    setlocale (LC_TIME,'fr_FR.utf8','fra');

    echo 'Nous sommes le '.strftime('<strong>%d %B %Y</strong>, et il est <strong>%Hh%M</strong>').'.<br />'
        
        .'Il reste exactement <strong>'. $d_restants .' jours</strong>, <strong>'. $H_restantes .' heures</strong>,'
        .'<strong>'. $i_restantes .'minutes</strong>et<strong>'. $s_restantes .'s</strong> avant d\'ouvrir les cadeaux.';

?>