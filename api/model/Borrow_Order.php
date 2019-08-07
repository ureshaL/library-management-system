<?php


class Borrow_Order
{
    private $bro_id;
    private $date;
    private $User_nic;

    /**
     * Borrow_Order constructor.
     * @param $bro_id
     * @param $date
     * @param $User_nic
     */
    public function __construct($bro_id, $date, $User_nic)
    {
        $this->bro_id = $bro_id;
        $this->date = $date;
        $this->User_nic = $User_nic;
    }

    /**
     * @return mixed
     */
    public function getBroId()
    {
        return $this->bro_id;
    }

    /**
     * @param mixed $bro_id
     */
    public function setBroId($bro_id)
    {
        $this->bro_id = $bro_id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getUserNic()
    {
        return $this->User_nic;
    }

    /**
     * @param mixed $User_nic
     */
    public function setUserNic($User_nic)
    {
        $this->User_nic = $User_nic;
    }
}