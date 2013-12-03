<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Type: library
 * Location: ~/application/libraries/html_head_tags.php
 * Comments: -
 * (c) Gusev Maxim, 2013
 */

class HTML_Head_Tags {
	// Data
	var $css;
	var $js;
	var $tite;
	
	// Flags
	var $f_debug;
	
	/*
	 * function __construct()
	 */
	function __construct() {
		$this->clear_css_data();
		$this->clear_js_data();
		$this->clear_title();
		
		$this->f_debug = FALSE;
	} 
	
	/*
	 * add_css()
	 */
	function add_css($_value) {
		if(is_array($_value)) {
			foreach($_value as $item) {
				array_push($this->css, $item);
			}
		} else {
			array_push($this->css, $_value);
		}
	}

	/*
	 * add_js()
	 */
	function add_js($_value) {
		if(is_array($_value)) {
			foreach($_value as $item) {
				array_push($this->js, $item);
			}
		} else {
			array_push($this->js, $_value);
		}
	}
	
	/*
	 * function clear_all_data()
	 */
	function clear_all_data() {
		$this->clear_css_data();
		$this->clear_js_data();
	}
	
	/*
	 * function clear_css_data()
	 */
	function clear_css_data() {
		$this->css = array();
	}
	
	/*
	 * function clear_js_data()
	 */
	function clear_js_data() {
		$this->js = array();
	}
	
	/*
	 * function clear_title()
	 */
	function clear_title() {
		$this->title = "";
	}
	
	/*
	 * function debug_off()
	 */
	function debug_off() {
		$this->f_debug = FALSE;
	}
	
	/*
	 * function debug_on()
	 */
	function debug_on() {
		$this->f_debug = TRUE;	
	}
	
	/*
	 * output_comment()
	 */
	function output_comment($_text) {
		echo "<!-- ".$_text." -->\n";
	}
	
	/*
	 * function output_css()
	 */	
	function output_css() {
		if($this->f_debug) { $this->output_comment("css begin"); }
		foreach($this->css as $item) {
			echo "<link rel=\"stylesheet\" href=\"".$item."\"/>\n";
		}
		if($this->f_debug) { $this->output_comment("css end"); }
	}

	/*
	 * function output_cjs()
	 */	
	function output_js() {
		if($this->f_debug) { $this->output_comment("js begin"); }
		foreach($this->js as $item) {
			echo "<script type=\"text/javascript\" src=\"".$item."\"></script>\n";
		}
		if($this->f_debug) { $this->output_comment("js end"); }
	}
	
	/*
	 * function output_title()
	 */
	function output_title() {
		echo "<title>".$this->title."</title>\n";	
	}
	
	/*
	 * function set_title()
	 */
	function set_title($_text) {
		$this->title = $_text;
	}
	
}

?>