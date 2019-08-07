<?php


class Borrowing
{
    private $bro_id;
    private $isbn;
    private $status;

    /**
     * Borrowing constructor.
     * @param $bro_id
     * @param $isbn
     * @param $status
     */
    public function __construct($bro_id, $isbn, $status)
    {
        $this->bro_id = $bro_id;
        $this->isbn = $isbn;
        $this->status = $status;
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
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}