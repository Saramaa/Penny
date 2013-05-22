<?php

/**
 * All requests routed through here. This is an overview of what actaully happens during
 * a request.
 *
 * @package PennyCore
 */

// ---------------------------------------------------------------------------------------
//
// PHASE: BOOTSTRAP
//
define('PENNY_INSTALL_PATH', dirname(__FILE__));
define('PENNY_SITE_PATH', PENNY_INSTALL_PATH . '/site');

require(PENNY_INSTALL_PATH.'/src/bootstrap.php');

$pen = CPenny::Instance();


// ---------------------------------------------------------------------------------------
//
// PHASE: FRONTCONTROLLER ROUTE
//
$pen->FrontControllerRoute();


// ---------------------------------------------------------------------------------------
//
// PHASE: THEME ENGINE RENDER
//
$pen->ThemeEngineRender();
