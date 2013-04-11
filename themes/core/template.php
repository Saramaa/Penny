<?php
// include them helper functions from functions.php
include("functions.php");

// Get url to current page
$data['currentUrl'] = getCurrentUrl();
$data['navbar'] = array(
  'index'         => array('text'=>'Me',  'url'=>'main.php'),
  'redovisning'   => array('text'=>'Redovisning',  'url'=>'redovisning.php'),
  'viewsource'    => array('text'=>'K&auml;llkod', 'url'=>'source.php'),
);

// Extract the variables from the $data-array if available
if(isset($data)) {
  extract($data);
}

// process the template file
include("default.tpl.php"); 
