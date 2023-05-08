<?php
    class Manager extends Employee{
        private $level;
		public function setLevel($level){
			$this->level=$level;
		}
		public function getLevel(){
			return $this->level;
		}
        public function salary($job, $coefsalary){
            return $this->basicsalary + $job->hour * (30000 + 50000 * $coefsalary->coef);
        }
    }
?>