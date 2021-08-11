<?php

date_default_timezone_set('America/Montreal');

// The name of THIS file
define('_SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path to the front controller (this file)
define('_FCPATH', str_replace(_SELF, '', __FILE__));

// Try inittesting for helper
require_once _FCPATH . "vendor/autoload.php";
require_once _FCPATH . "src/HelperAverage.php";
