<?php


namespace App\Util;


class Response
{
    private $code;
    private $message;
    private $data;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Response
     */
    public function setCode($code): Response
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Response
     */
    public function setMessage($message): Response
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return Response
     */
    public function setData($data): Response
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray() : array {
        return [
            'code'  => $this->getCode(),
            'message' => $this->getMessage(),
            'data' => $this->getData()
        ];
    }
}
