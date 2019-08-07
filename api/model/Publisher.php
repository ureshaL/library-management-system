<?php


class Publisher
{
    private $p_id;
    private $pub_name;

    /**
     * Publisher constructor.
     * @param $p_id
     * @param $pub_name
     */
    public function __construct($p_id, $pub_name)
    {
        $this->p_id = $p_id;
        $this->pub_name = $pub_name;
    }

    /**
     * @return mixed
     */
    public function getPId()
    {
        return $this->p_id;
    }

    /**
     * @param mixed $p_id
     */
    public function setPId($p_id)
    {
        $this->p_id = $p_id;
    }

    /**
     * @return mixed
     */
    public function getPubName()
    {
        return $this->pub_name;
    }

    /**
     * @param mixed $pub_name
     */
    public function setPubName($pub_name)
    {
        $this->pub_name = $pub_name;
    }




}