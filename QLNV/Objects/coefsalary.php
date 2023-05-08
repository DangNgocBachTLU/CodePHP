<?php
    class Coefsalary{
        private $level;
        private $coef;
        public function setLevel($level){
            $this->level = $level;
        }
        public function getLevel(){
            return $this->level;
        }
        public function setCoef($coef){
            $this->coef = $coef;
        }
        public function getCoef(){
            return $this->coef;
        }
    }
?>