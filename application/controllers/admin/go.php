<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
* 1.0
* 2011-06-09
* VoleiSP
*
*/

class go extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo('<script>');
		echo('$(function() {');
		echo('var availableTags = [');
		echo('		"ActionScript",
				"AppleScript",
				"Asp",
				"BASIC",
				"C",
				"C++",
				"Clojure",
				"COBOL",
				"ColdFusion",
				"Erlang",
				"Fortran",
				"Groovy",
				"Haskell",
				"Java",
				"JavaScript",
				"Lisp",
				"Perl",
				"PHP",
				"Python",
				"Ruby",
				"Scala",
				"Scheme"');
		echo('	];');

		echo('$( "#tags" ).autocomplete({source: availableTags});');

		echo('		});');
		echo('	</script>');

	}
}
