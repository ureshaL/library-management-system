<?php


class User
{
    private $nic;
    private $user_name;
    private $mobile;
    private $address;

    /**
     * User constructor.
     * @param $nic
     * @param $user_name
     * @param $mobile
     * @param $address
     */
    public function __construct($nic, $user_name, $mobile, $address)
    {
        $this->nic = $nic;
        $this->user_name = $user_name;
        $this->mobile = $mobile;
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * @param mixed $nic
     */
    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
}