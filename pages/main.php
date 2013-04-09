<?php
/**
 * My own me-page to start with.
 */
include("config.php");

// Create the data array which is to be used in the template file.
$data['title'] = "Anna Dahlgren";
$data['meta_description'] = "Min egna me-sida, skapad f&ouml;r kursen phpmvc med HTML5Boilerplate.";
$data['main'] = <<<EOD
<h1>Det h&auml;r &auml;r jag</h1>

<p>Anna Dahlgren heter jag och jag blir 27 &aring;r gammal i &aring;r.<br />
Jag bor med min familj (sambo och tre barn) i mellansverige.<br />
Jag studerar heltid p&aring; distans, samtidigt som jag &auml;r mammaledig med yngsta barnet.<br />
Jag g&aring;r utbildningen Informationsteknologi p&aring; helfart med start h&ouml;sten 2011.<br />
Detta &auml;r min sista termin, s&aring; till sommaren hoppas jag p&aring; arbete.</p>


<img src="img/IMG_8455.JPG" alt = "Hem" width = "250" hight = "250"> </img>



EOD;

// Hand over to the template engine.
include(__DIR__."/themes/core/template.php"); 

