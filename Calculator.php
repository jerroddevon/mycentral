<?php 

class Calculator{
	
	var $val1;
	var $val2;
	var $opp;
	
	function __construct($arg) {
		
		$out = preg_split("/\s+/",$arg);
		
		foreach($out as $index => $val){
			if(!$val){
				unset($out[$index]);
			}
		}
		
		if(count($out)==1){
			echo("please seperate your equation with spaces and try again. ex: '1 + 1' \n");
			exit;
		#}elseif(count($out)>3){
		#	self::complex($out);
		}elseif(count($out)==3){
			$this->val1=$out[0];
			self::getoperand($out[1]);
			$this->val2=$out[2];
		}
		
	} 
	
	private function complex($out){
		#handle complex equations
		//multiplication
		$val = array_search('*',$out);
		$this->val1 = $out[$val-1];
		$this->val2 = $out[$val+1];
		unset($out[$val]);
		unset($out[$val+1]);
		$out[$val-1] = self::multiply();
		
		##ran out of time;
		
	}
	private function getoperand($thisopp){

		$opps = array('+' => 'add',
				'-' => 'subtract',
				'*' => 'multiply',
				'/' => 'divide',
				'%' => 'mod'
				);
		
		$this->opp = $opps[$thisopp];
		return;
	}
	
	private function add(){
		return($this->val1 + $this->val2);
	}
	
	private function subtract(){
		return($this->val1 - $this->val2);
	}
	
	private function multiply(){
		return($this->val1 * $this->val2);
	}
	
	private function divide(){
		return $this->val1 / $this->val2 ;
	}
	
	private function mod(){
		return($this->val1 % $this->val2);
	}
	
	public function calc(){
		$opp = $this->opp;
		return(self::$opp());
	}
}

	$jd = new Calculator($argv[1]);
	$res = $jd->calc();
	echo($res."\n");


?>