<?php

namespace Osonic\Controllers;
use Osonic\Models\Character;
use Osonic\Models\Type;

class MainController extends CoreController {

    // page "home"
    public function home() {
        $charactersModel = new Character();
        $charactersList = $charactersModel->findAllCharacters();
        
        $typesModel = new Type();
        $typesList = $typesModel->findAllTypes();

        $this->show(
            'home',
            [
                'charactersList' => $charactersList,
                'typesList' => $typesList
            ]
        );

    }

    // page "creators"
    public function creators() {

        $typesModel = new Type();
        $typesList = $typesModel->findAllTypes();

        $this->show(
            'creators',
            [
                'typesList' => $typesList
            ]
        );
    }

}