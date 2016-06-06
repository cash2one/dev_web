<?php

class TestClass {
    
    public $data1;
    public $data2;
    public function __construct(){
        //parent::_construct();
        //echo "这个子类的父类构造函数调用了！";
        echo "构造函数";
        echo "<br>";
    }

    public function sum() {
        //return 3;
        //return $this->data1 + $this->data2;
        return null;
    }
}