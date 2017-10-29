<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Test
 *
 * @author jan
 */
class Test extends \Example\Message\Mail{
	
	public function name() {
		parent::name();
		echo "<br>";
		echo __CLASS__;
	}
	//put your code here
}
