<?php


namespace integral;


class Trapeze extends Rectangle {

    private $start;
    private $end;
private $y3; private $y4;private $result_trapeze;

    public function trapeze(){
            trim($this->y);
        $this->y2 = str_replace('$i', $this->a, $this->y);
        $this->start = ((eval(" return $this->y2;"))/2)*$this->h;
        $this->y3 = str_replace('$i', $this->b, $this->y);
        $this->end = ((eval(" return $this->y3;"))/2)*$this->h;
//var_dump($this->end);
           for ($this->i = $this->a+$this->h; $this->i <= $this->b - $this->h; $this->i += $this->h) {
                $this->y4 = str_replace('$i', $this->i, $this->y);
                $this->result += $this->h * (eval(" return $this->y4;"));
               //var_dump($this->result_trapeze);

            }
            $this->result_trapeze = $this->result+$this->start+$this->end;
            return "Integral $this->y = $this->result_trapeze on period ($this->a,$this->b)";

    }
} 