<?php
/**
* Standard controller layout.
*
* @package ninqCore
*/
class CCIndex implements IController {

/**
  * Implementing interface IController. All controllers must have an index action.
  */
   public function Index() {   
      global $ninq;
      $ninq->data['title'] = "The Index Controller";
      $ninq->data['main'] = "<h1>The Index Controller</h1>";
   }

} 
