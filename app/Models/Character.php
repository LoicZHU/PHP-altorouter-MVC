<?php

namespace Osonic\Models;
use \Osonic\Utils\Database;
use \PDO;

class Character extends CoreModel {

    private $description;
    private $picture;
    private $type_id;
    private $type_name;

    // méthode récupérant des info de tous les personnages de la BdD
    public function findAllCharacters() {
        $pdo = Database::getPDO();

        $sql = 
        'SELECT
                `character`.`name`,
                `character`.`description`,
                `character`.`picture`,
                `type`.`name` AS `type_name`
        FROM `character`
        INNER JOIN `type` ON `type`.`id` = `character`.`type_id`
        ORDER BY `character`.`name` ASC';

        $pdoStatement = $pdo->query($sql);
        $characters = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $characters;
    }

    // méthode récupérant des info de personnage (selon un type demandé) de la BdD
    public function findAllCharactersByType($typeId) {
        $pdo = Database::getPDO();

        $sql = 
        'SELECT
                `character`.`name`,
                `character`.`description`,
                `character`.`picture`,
                `type`.`name` AS `type_name`
        FROM `character`
        INNER JOIN `type` ON `type`.`id` = `character`.`type_id`
        WHERE `character`.`type_id` = ' . $typeId .'
        ORDER BY `character`.`name` ASC';

        $pdoStatement = $pdo->query($sql);
        $characters = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $characters;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    /**
     * Get the value of type_name
     */ 
    public function getType_name()
    {
        return $this->type_name;
    }
}