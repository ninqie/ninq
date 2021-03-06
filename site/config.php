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
 $ninq->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
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
 * Allow or disallow creation of new user accounts.
 */
 $ninq->config['create_new_users'] = true;
 

/**
 * Define a routing table for urls.
 *
 * Route custom urls to a defined controller/method/arguments
 */
 $ninq->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
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
 * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
 */
 $ninq->config['hashing_algorithm'] = 'sha1salt';
 
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
 	 'user'	     => array('enabled' => true,'class' => 'CCUser'),
 	 'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
 	 'content'   => array('enabled' => true,'class' => 'CCContent'),
 	 'blog'	     => array('enabled' => true,'class' => 'CCBlog'),
 	 'page'	     => array('enabled' => true,'class' => 'CCPage'),
 	 'theme'     => array('enabled' => true,'class' => 'CCTheme'),
 	 'module'    => array('enabled' => true,'class' => 'CCModules'),
 	 'my'        => array('enabled' => true,'class' => 'CCMyController'),
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


/**
 * Settings for the theme. The theme may have a parent theme.
 *
 * When a parent theme is used the parent's functions.php will be included before the current
 * theme's functions.php. The parent stylesheet can be included in the current stylesheet
 * by an @import clause. See site/themes/mytheme for an example of a child/parent theme.
 * Template files can reside in the parent or current theme, the Cninq::ThemeEngineRender()
 * looks for the template-file in the current theme first, then it looks in the parent theme.
 *
 * There are two useful theme helpers defined in themes/functions.php.
 *  theme_url($url): Prepends the current theme url to $url to make an absolute url.
 *  theme_parent_url($url): Prepends the parent theme url to $url to make an absolute url.
 *
 * path: Path to current theme, relativly NINQ_INSTALL_PATH, for example themes/grid or site/themes/mytheme.
 * parent: Path to parent theme, same structure as 'path'. Can be left out or set to null.
 * stylesheet: The stylesheet to include, always part of the current theme, use @import to include the parent stylesheet.
 * template_file: Set the default template file, defaults to default.tpl.php.
 * regions: Array with all regions that the theme supports.
 * data: Array with data that is made available to the template file as variables.
 *
 * The name of the stylesheet is also appended to the data-array, as 'stylesheet' and made
 * available to the template files.
 */
 $ninq->config['theme'] = array(
  'path'            => 'site/themes/mytheme',
  //'name'            => 'grid',
  //'path'	    => 'themes/grid',
  'parent'          => 'themes/grid',
  'stylesheet'      => 'style.css',
  'template_file'   => 'index.tpl.php',
  'regions' => array('navbar','flash','featured-first','featured-middle','featured-last',
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
  'menu_to_region' => array('my-navbar'=>'navbar'),
  'data' => array(
    'header' => 'ninq',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'logo_80x80.png',
    'logo' => 'logo_80x80.png',
    'logo_width'  => 80,
    'logo_height' => 80,
    'footer' => '<p>&copy; ninq by Anna Randahl based on Lydia by Mikael Roos</p>',
  ),
);
 
 /**
 * Define menus.
 *
 * Create hardcoded menus and map them to a theme region through $ninq->config['theme'].
 */
 $ninq->config['menus'] = array(
  'navbar'      => array(
    'home'      => array('label'=>'Home', 'url'=>'home'),
    'modules'   => array('label'=>'Modules', 'url'=>'module'),
    'content'   => array('label'=>'Content', 'url'=>'content'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
    'blog'      => array('label'=>'Blog', 'url'=>'blog'),
  ),
  'my-navbar'   => array(
    'home'      => array('label'=>'Home', 'url'=>'my'),
    'about'     => array('label'=>'About Me', 'url'=>'my/about'),
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
    'download'  => array('label'=>'Downloads', 'url'=>'my/downloads'),
    'modules'   => array('label'=>'Modules', 'url'=>'module'),
  ),
);
