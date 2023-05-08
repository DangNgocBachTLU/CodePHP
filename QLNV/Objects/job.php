<?php
    class Job{
        private $id;
        private $hour;
        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }
        public function setHour($hour){
            $this->hour = $hour;
        }
        public function getHour(){
            return $this->hour;
        }
    }
?>