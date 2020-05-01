<?php
class mathCalculation
{
    private $width;
    private $height;
    private $average;
    private $area;
    private $area_squared;

    public function __construct($parameters)
    {
        $this->width = (isset($parameters["w"])) ? (int)$parameters["w"] : false;
        $this->height = (isset($parameters["h"])) ? (int)$parameters["h"] : false;

        if (!$this->width) {
            echo "You must Enter Width";
            die;
        }
        if (!$this->height) {
            echo "You must Enter Height";
            die;
        }
    }

    public function getWidth()
    {
        return $this->width;
    }


    public function getHeight()
    {
        return $this->height;
    }

    public function getAverage()
    {
        $this->average = ($this->width + $this->height) / 2;
        return $this->average;
    }


    public function getArea()
    {
        $this->area = $this->width * $this->height;
        return $this->area;
    }

    public function getAreaSquared()
    {
        $this->area_squared = pow($this->area, 2);
        return $this->area_squared;
    }
}
