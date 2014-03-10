<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */

 
 
/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);

/**
 * Define session name
 */
 $ninq->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
 $ninq->config['session_key']  = 'ninq';
/**
 * Define server timezone
 */
 $ninq->config['timezone'] = 'Europe/Stockholm';

/**
 * Define internal character encoding
 */
 $ninq->config['character_encoding'] = 'UTF-8';

/**
 * Define language
 */
 $ninq->config['language'] = 'en';
 
/**
 * Settings for the theme.
 */
 $ninq->config['theme'] = array(
 // The name of the theme in the theme directory
  'name'    => 'core',
);

/**
 * What type of urls should be used?
 *
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
 $ninq->config['url_type'] = 1;
 
 
 
/**
 * Set a base_url to use another than the default calculated
 */
 $ninq->config['base_url'] = null;
 
/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example:
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $ninq->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
 $ninq->config['controllers'] = array(
 	 'index'     => array('enabled' => true,'class' => 'CCIndex'),
 	 'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
 	 'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
);
 
 
/**
 * Set Database
 */
$ninq->config['database'][0]['dsn'] = 'sqlite:' . NINQ_SITE_PATH . '/data/.ht.sqlite';


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$ninq->config['debug']['ninq']           = false;
$ninq->config['debug']['session']        = false;
$ninq->config['debug']['timer']          = true;
$ninq->config['debug']['db-num-queries'] = true;
$ninq->config['debug']['db-queries']     = true;
