<?php
class hq9plusplus{
	var $code;
	var $output;
	var $accumulator;
	protected $dummies;
	
	private function _killComments($code){
		preg_match_all('@[hHqQ9+]+@', $code, $match);
		$ret = '';
		foreach($match[0] as $pt){
			$ret .= $pt;
		}
		return $ret;
	}
	function parse($code=''){
		$code = trim($code);		
		if($code==''){
			$code = trim($this->code);
		}
		$code = $this->_killComments($code);
		$tmp = str_split(strtolower($code));
		for($i=0; $i<count($tmp); $i++){
			switch($tmp[$i]){
				case 'h':
					$this->output .= "Hello World! ";
				break;
				case 'q':
					$this->output .= $code;
				break;
				case '9':
					for($k=99; $k>(-1); --$k){
						if($k == 1){
							$this->output .= $k.' bottle of beer on the wall, '.$k.' bottle of beer. Take it down and pass it around - no more bottles of beer on the wall.'."\r\n";
						} else{			
							$this->output .= $k.' bottles of beer on the wall, '.$k.' bottles of beer. Take one down and pass it around - '.($k-1).' bottles of beer on the wall.'."\r\n";
						}
					}
				break;
				case '+':
					++$this->accumulator;
				break;
			}
		}
		for($n=0; $n<substr_count($code, '++'); $n++){
					$this->dummies[] = new Dummy();
		}
		return $this->output;
	}
}
class Dummy{ function __construct() {} function __destruct() {} }
?>