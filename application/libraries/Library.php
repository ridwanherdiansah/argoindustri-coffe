<?php

class Library{
	public function printr($text){
		echo '<pre>'.print_r($text,true).'</pre>';
		exit(1);
	}
}