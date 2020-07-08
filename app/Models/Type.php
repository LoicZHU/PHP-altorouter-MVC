<?php

namespace Osonic\Models;
use \Osonic\Utils\Database;
use \PDO;

class Type extends CoreModel {

    // méthode récupérant le nom de certains types (de personnage) de la BdD
    public function findAllTypes() {
        $pdo = Database::getPDO();

        $sql = 
        'SELECT 
                `type`.`id`,
                `type`.`name`
        FROM `type`
        WHERE `type`.`name` NOT LIKE "Dév%"
        ORDER BY `type`.`id` ASC';

        $pdoStatement = $pdo->query($sql);
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
    }

    // méthode récupérant le nom d'un type demandé (de personnage) de la BdD
    public function findTheType($typeId) {
        $pdo = Database::getPDO();

        $sql = 
        'SELECT 
                `type`.`id`,
                `type`.`name`
        FROM `type`
        WHERE `type`.`id` = ' . $typeId;

        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $type = $pdoStatement->fetch();

        return $type;
    }

}