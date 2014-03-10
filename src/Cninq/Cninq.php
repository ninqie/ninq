<?php
/**
 * Main class for ninq, holds everything.
 *
 * @package ninqCore
 */
class Cninq implements ISingleton {

   private static $instance = null;
   public $config = array();
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;
<<<<<<< HEAD
   public $user;
=======
<<<<<<< HEAD
   public $user;
=======
<<<<<<< HEAD
   public $user;
=======
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
   public $timer = array();
   
/**
  * Constructor
  */
   protected function __construct() {
      
      //time page gen
      $this->timer['first'] = microtime(true);
<<<<<<< HEAD
     
      // include the site specific config.php and create a ref to $ly to be used by config.php
      $ninq = &$this;
      require(NINQ_SITE_PATH.'/config.php');
     
      // Start a named session
      session_name($this->config['session_name']);
      session_start();
      $this->session = new CSession($this->config['session_key']);
      $this->session->PopulateFromSession();
     
      // Set default date/time-zone
      date_default_timezone_set('UTC');
     
=======
<<<<<<< HEAD
     
      // include the site specific config.php and create a ref to $ly to be used by config.php
      $ninq = &$this;
      require(NINQ_SITE_PATH.'/config.php');
     
      // Start a named session
      session_name($this->config['session_name']);
      session_start();
      $this->session = new CSession($this->config['session_key']);
      $this->session->PopulateFromSession();
     
      // Set default date/time-zone
      date_default_timezone_set('UTC');
     
=======
<<<<<<< HEAD
     
      // include the site specific config.php and create a ref to $ly to be used by config.php
      $ninq = &$this;
      require(NINQ_SITE_PATH.'/config.php');
     
      // Start a named session
      session_name($this->config['session_name']);
      session_start();
      $this->session = new CSession($this->config['session_key']);
      $this->session->PopulateFromSession();
     
      // Set default date/time-zone
      date_default_timezone_set($this->config['timezone']);
     
=======
      // include the site specific config.php and create a ref to $ly to be used by config.php
      $ninq = &$this;
      require(NINQ_SITE_PATH.'/config.php');
      
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
      // Create a database object.
      if(isset($this->config['database'][0]['dsn'])) {
        $this->db = new CMDatabase($this->config['database'][0]['dsn']);
      }
      
      // Create a container for all views and theme data
      $this->views = new CViewContainer();
      
<<<<<<< HEAD
      // Create a object for the user
      $this->user = new CMUser($this);
=======
<<<<<<< HEAD
      // Create a object for the user
      $this->user = new CMUser($this);
=======
<<<<<<< HEAD
      // Create a object for the user
      $this->user = new CMUser($this);
=======
      // Start a named session
      session_name($this->config['session_name']);
      session_start();
      $this->session = new CSession($this->config['session_key']);
      $this->session->PopulateFromSession();
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
   }
   
   
/**
  * Singleton pattern. Get the instance of the latest created object or create a new one.
  * @return Cninq The instance of this class.
  */
  public static function Instance() {
          if(self::$instance == null) {
             self::$instance = new Cninq();
          }
          return self::$instance;
  }
  
  
/**
  * Frontcontroller, check url and route to controllers.
  */
  public function FrontControllerRoute() {
    

    // Take current url and divide it in controller, method and parameters
    $this->request = new CRequest($this->config['url_type']);
    $this->request->Init($this->config['base_url']);
    $controller = $this->request->controller;
    $method     = $this->request->method;
    $arguments  = $this->request->arguments;

    // Is the controller enabled in config.php?
    $controllerExists    = isset($this->config['controllers'][$controller]);
    $controllerEnabled   = false;
    $className           = false;
    $classExists         = false;

    if($controllerExists) {
      $controllerEnabled = ($this->config['controllers'][$controller]['enabled'] == true);
      $className         = $this->config['controllers'][$controller]['class'];
      $classExists       = class_exists($className);
    }

    // Check if there is a callable method in the controller class, if then call it



    if($controllerExists && $controllerEnabled && $classExists) {
       $rc = new ReflectionClass($className);
       if($rc->implementsInterface('IController')) {
             $formattedMethod = str_replace(array('_', '-'), '', $method); 
       	       if($rc->hasMethod($formattedMethod)) {
              $controllerObj = $rc->newInstance();
              $methodObj = $rc->getMethod($formattedMethod);
              $methodObj->invokeArgs($controllerObj, $arguments);
            } else {
              die("404. " . get_class() . ' error: Controller does not contain method.');
            }
       } else {
         die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
         }
   } else {
     die('404. Page is not found.');
     }
  }
  
  
/**
  * Theme Engine Render, renders the views using the selected theme.
  */
  public function ThemeEngineRender() {
     // Save to session before output anything
     $this->session->StoreInSession();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
     
     // Is theme enabled?
    if(!isset($this->config['theme'])) {
      return;
    }
    
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
     // Get the paths and settings for the theme
    $themeName    = $this->config['theme']['name'];
    $themePath    = NINQ_INSTALL_PATH . "/themes/{$themeName}";
    $themeUrl     = $this->request->base_url . "themes/{$themeName}";
   
    // Add stylesheet path to the $ly->data array
    $this->data['stylesheet'] = "{$themeUrl}/" . $this->config['theme']['stylesheet'];

    // Include the global functions.php and the functions.php that are part of the theme
    $ninq = &$this;
    include(NINQ_INSTALL_PATH . '/themes/functions.php');
    $functionsPath = "{$themePath}/functions.php";
    if(is_file($functionsPath)) {
      include $functionsPath;
    }

    // Extract $ly->data to own variables and handover to the template file
<<<<<<< HEAD
    
    extract($this->data); 
    extract($this->views->GetData());
    if(isset($this->config['theme']['data'])) {
      extract($this->config['theme']['data']);
    }
    $templateFile = (isset($this->config['theme']['template_file'])) ? $this->config['theme']['template_file'] : 'default.tpl.php';
    include("{$themePath}/{$templateFile}");
=======
    extract($this->data); 
    extract($this->views->GetData());     
    include("{$themePath}/default.tpl.php");
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
  	  
  	  
    /*echo "<h1>I'm Cninq::ThemeEngineRender</h1><p>You are most welcome. Nothing to render at the moment</p>";
    echo "<h2>The content of the config array:</h2><pre>", print_r($this->config, true) . "</pre>";
    echo "<h2>The content of the data array:</h2><pre>", print_r($this->data, true) . "</pre>";
    echo "<h2>The content of the request array:</h2><pre>", print_r($this->request, true) . "</pre>";*/
  }
  
  
}
