<?php

//
// PHASE: BOOTSTRAP
//
	define('NINQ_INSTALL_PATH', dirname(__FILE__));
	define('NINQ_SITE_PATH', NINQ_INSTALL_PATH . '/site');

	require(NINQ_INSTALL_PATH.'/src/Cninq/bootstrap.php');

	$ninq = Cninq::Instance();
    
    
    
//
// PHASE: FRONTCONTROLLER ROUTE
//
	$ninq->FrontControllerRoute();
	


//
// PHASE: THEME ENGINE RENDER
//
	$ninq->ThemeEngineRender();
