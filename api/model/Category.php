<?php


class Category
{
    private $c_id;
    private $cat_name;

    /**
     * Category constructor.
     * @param $c_id
     * @param $cat_name
     */
    public function __construct($c_id, $cat_name)
    {
        $this->c_id = $c_id;
        $this->cat_name = $cat_name;
    }

    /**
     * @return mixed
     */
    public function getCId()
    {
        return $this->c_id;
    }

    /**
     * @param mixed $c_id
     */
    public function setCId($c_id)
    {
        $this->c_id = $c_id;
    }

    /**
     * @return mixed
     */
    public function getCatName()
    {
        return $this->cat_name;
    }

    /**
     * @param mixed $cat_name
     */
    public function setCatName($cat_name)
    {
        $this->cat_name = $cat_name;
    }


}