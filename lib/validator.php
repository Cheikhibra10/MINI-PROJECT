<?php
function est_vide($valeur) {
    return empty($valeur);
}

function est_entier($valeur) {
    return is_numeric($valeur);
}

function valid_champ(array &$arrayError, $valeur, string $key) {
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    } else if (!est_entier($valeur)) {
        $arrayError[$key] = "Veuillez saisir un nombre";
    }
}

 function valid_champ_user(array &$arrayError, $valeur, string $key) {
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    }
} 

function valid_input(array &$arrayError, $valeur, string $key) {
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    }
} 
    



?>
