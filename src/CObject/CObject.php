<?php
/**
* Holding a instance of Cninq to enable use of $this in subclasses.
*
* @package ninqCore
*/
class CObject {

   /**
    * Members
    */
   protected $ninq;
   protected $config;
   protected $request;
   protected $data;
   protected $db;
   protected $views;
   protected $session;
   protected $user;

/**
  * Constructor
  */
   protected function __construct($ninq=null) {
    if(!$ninq){
    	    $ninq = Cninq::Instance();
    }
    $this->ninq	    = &$ninq;
    $this->config   = &$ninq->config;
    $this->request  = &$ninq->request;
    $this->data     = &$ninq->data;
    $this->db       = &$ninq->db;
    $this->views    = &$ninq->views;
    $this->session  = &$ninq->session;
    $this->user     = &$ninq->user;
  }
  
/**
  * Wrapper for same method in Cninq. See there for documentation.
  */
  protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->ninq->RedirectTo($urlOrController, $method, $arguments);
  }


/**
  * Wrapper for same method in Cninq. See there for documentation.
  */
  protected function RedirectToController($method=null, $arguments=null) {
    $this->ninq->RedirectToController($method, $arguments);
  }


/**
  * Wrapper for same method in Cninq. See there for documentation.
  */
  protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->ninq->RedirectToControllerMethod($controller, $method, $arguments);
  }


/**
  * Wrapper for same method in Cninq. See there for documentation.
  */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->ninq->AddMessage($type, $message, $alternative);
  }


/**
  * Wrapper for same method in Cninq. See there for documentation.
  */
  protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->ninq->CreateUrl($urlOrController, $method, $arguments);
  }


}
