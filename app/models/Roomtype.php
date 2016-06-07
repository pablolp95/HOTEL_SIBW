<?php

class Roomtype
{
    var $id;
    var $name;
    var $description;
    var $max_adults;
    var $max_children;
    var $base_price;

    function __construct($id, $name, $description, $max_adults, $max_children, $base_price){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->base_price = $base_price;
        $this->max_adults = $max_adults;
        $this->max_children = $max_children;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getMaxAdults()
    {
        return $this->max_adults;
    }

    /**
     * @param mixed $max_adults
     */
    public function setMaxAdults($max_adults)
    {
        $this->max_adults = $max_adults;
    }

    /**
     * @return mixed
     */
    public function getMaxChildren()
    {
        return $this->max_children;
    }

    /**
     * @param mixed $max_children
     */
    public function setMaxChildren($max_children)
    {
        $this->max_children = $max_children;
    }

    /**
     * @return mixed
     */
    public function getBasePrice()
    {
        return $this->base_price;
    }

    /**
     * @param mixed $base_price
     */
    public function setBasePrice($base_price)
    {
        $this->base_price = $base_price;
    }

}