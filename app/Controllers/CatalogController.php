<?php

namespace Osonic\Controllers;
use Osonic\Models\Character;
use Osonic\Models\Type;

class CatalogController extends CoreController {

        // page "types de produit"
        public function type($params) {
            $typeId = $params['id'];
            
            $charactersModel = new Character();
            $charactersList = $charactersModel->findAllCharactersByType($typeId);

            $typesModel = new Type();
            $typesList = $typesModel->findAllTypes();
            $theType = $typesModel->findTheType($typeId);
                        
            $this->show(
                'type',
                [
                    'charactersList' => $charactersList,
                    'typesList' => $typesList,
                    'theType' => $theType
                ]
            );
        }

}