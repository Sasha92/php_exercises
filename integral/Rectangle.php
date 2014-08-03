<?php

namespace integral;


class Rectangle
{
    protected $y;
    protected $a;
    protected $b;
    protected $n;
    protected $h;
    protected $result;
    protected $i;
    protected $y2;

    function __construct($y, $a, $b, $n)
    {
        $this->y = $y;
        $this->a = $a;
        $this->b = $b;
        $this->n = $n;
        $this->h = ($b - $a) / $n;

    }

    public function leftRectangle()
    {
        trim($this->y);
        for ($this->i = $this->a; $this->i <= $this->b - $this->h; $this->i += $this->h) {
            $this->y2 = str_replace('$i', $this->i, $this->y);
             $this->result += $this->h * (eval(" return $this->y2;"));
        }
        return "Integral $this->y = $this->result on period ($this->a,$this->b)";
    }
    public function averageRectangle()
    {
        trim($this->y);
        for ($this->i = $this->a; $this->i <= $this->b - $this->h; $this->i += $this->h) {
            $this->y2 = str_replace('$i', $this->i+$this->h/2, $this->y);
           $this->result += $this->h * (eval(" return $this->y2;"));
        }
        return "Integral $this->y = $this->result on period ($this->a,$this->b)";
    }
    public function rightRectangle()
    {
        trim($this->y);
        for ($this->i = $this->a+$this->h; $this->i <= $this->b; $this->i += $this->h) {
            $this->y2 = str_replace('$i', $this->i, $this->y);
            $this->result += $this->h * (eval(" return $this->y2;"));
        }
        return "Integral $this->y = $this->result on period ($this->a,$this->b)";
    }
} 