<?php
    class Developer extends Employee{
        private $prolanguage;
        private $level;
        public function setProLanguage($prolanguage){
			$this->prolanguage=$prolanguage;
		}
		public function getProLanguage(){
			return $this->prolanguage;
        }
		public function setLevel($level){
			$this->level=$level;
		}
		public function getLevel(){
			return $this->level;
		}
        public function salary($job, $coefsalary){
            return $this->basicsalary + ($job->hour * 50000) * $soefsalary->coef;
        }
    }
?>