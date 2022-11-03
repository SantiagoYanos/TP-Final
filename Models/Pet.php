<?php

namespace Models;

class Pet
{
    private $name;
    private $breed;
    private $size;
    private $vaccination_plan;
    private $observation;
    private $id;
    private $owner_id;
    private $type;


    /*public function __constructor($name, $breed, $size, $vaccination_plan, $observation){
            $this->name = $name;
            $this->breed = $breed;
            $this->size = $size;
            $this->vaccination_plan = $vaccination_plan;
            $this->observation = $observation;
        }*/

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getBreed()
    {
        return $this->breed;
    }

    public function setBreed($breed)
    {
        $this->breed = $breed;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function getVaccination_plan()
    {
        return $this->vaccination_plan;
    }

    public function setVaccination_plan($vaccination_plan)
    {
        $this->vaccination_plan = $vaccination_plan;
        return $this;
    }

    public function getObservation()
    {
        return $this->observation;
    }

    public function setObservation($observation)
    {
        $this->observation = $observation;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of owner_id
     */ 
    public function getOwner_id()
    {
        return $this->owner_id;
    }

    /**
     * Set the value of owner_id
     *
     * @return  self
     */ 
    public function setOwner_id($owner_id)
    {
        $this->owner_id = $owner_id;

        return $this;
    }
}
