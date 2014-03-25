<?php

/**
  * A model for content stored in database.
  *
  * @package ninqCore
  */
    class CTextFilter {

/**
  * Properties
  */

      public static $instance = null;
      public static $filters = null;

/**
  * Constructor
  */
      public function __construct() {
        
        }

/**
  * Filter content according to a filter.
  *
  * @param $data string of text to filter and format according its filter settings.   * @returns string with the filtered data.
  */
  public static function Filter($data, $filter) {

  	  /*$filters = explode(',', $filter);

  	  foreach($filters as $filt){
  	  	  echo($filt);
  	  	  $data = nl2br(self::makeClickable(htmlEnt($data)));
  	  	  $data = nl2br(self::$filt($data));
  switch($filt) {
      case 'php': $data = nl2br(makeClickable(eval('?>'.$data))); break;
      case 'html': $data = nl2br(makeClickable($data)); break;
      case 'htmlpurify': $data = nl2br(self::Purify($data)); break;
      case 'bbcode': $data = nl2br(self::bbcode2html(htmlEnt($data))); break;
      case 'markdown': $data = nl2br(self::markdown(htmlEnt($data))); break;
      case 'typography': $data = nl2br(self::smartyPantsTypographer(htmlEnt($data))); break;
      case 'plain':
      default: $data = nl2br(self::makeClickable(htmlEnt($data))); break;
    }*/
    $valid = array(
    'bbcode'     => 'bbcode2html',
    'markdown'   => 'markdown',
    'htmlpurify' => 'Purify',
    'typography' => 'smartyPantsTypographer',
    'plain'      => 'nichts',
    ''		 => 'nichts',
 
  );

  // Make an array of the comma separated string $filter
  $filters = preg_replace('/\s/', '', explode(',', $filter));
  $data = nl2br(self::makeClickable($data));
  // For each filter, call its function with the $text as parameter.
  foreach($filters as $func) {
    if(isset($valid[$func])) {
            
    	    $data = self::$valid[$func]($data);
    	    
    } 
    else {
      throw new Exception("The filter '$filter' is not a valid filter string.");
    }
  }
    
    return $data;
  } 
    
/**
  * Purify it. Create an instance of HTMLPurifier if it does not exists.
  *
  * @param $text string the dirty HTML.
  * @returns string as the clean HTML.
  */
       public static function Purify($text) {   
        if(!self::$instance) {
          require_once(__DIR__.'/htmlpurifier-4.6.0-standalone/HTMLPurifier.standalone.php');
          $config = HTMLPurifier_Config::createDefault();
          $config->set('Cache.DefinitionImpl', null);
          self::$instance = new HTMLPurifier($config);
        }
        return self::$instance->purify($text);
      }  
      
/**
  * Default nl2br
  */
      public static function nichts($data){
      	//$data = nl2br($data);
      	return $data;
      	     
      }
  
  
  
  
/**
  * Helper, make clickable links from URLs in text.
  */
  public static function makeClickable($text) {
    return preg_replace_callback(
    '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
    create_function(
      '$matches',
      'return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";'
    ),
    $text
  );
}	 



/**
  * Helper, BBCode formatting converting to HTML.
  *
  * @param string text The text to be converted.
  * @returns string the formatted text.
  */
    public static function bbcode2html($text) {
      $search = array(
        '/\[b\](.*?)\[\/b\]/is',
        '/\[i\](.*?)\[\/i\]/is',
        '/\[u\](.*?)\[\/u\]/is',
        '/\[img\](https?.*?)\[\/img\]/is',
        '/\[url\](https?.*?)\[\/url\]/is',
        '/\[url=(https?.*?)\](.*?)\[\/url\]/is'
        );   
      $replace = array(
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<u>$1</u>',
        '<img src="$1" />',
        '<a href="$1">$1</a>',
        '<a href="$1">$2</a>'
        );     
      return preg_replace($search, $replace, $text);
    }	 
  
  
#use \Michelf\MarkdownExtra;

/**
  * Format text according to Markdown syntax.
  *
  * @param string $text the text that should be formatted.
  * @return string as the formatted html-text.
  */
  public static function markdown($text) {
   require_once(__DIR__ . '/php-markdown/Michelf/Markdown.php');
   require_once(__DIR__ . '/php-markdown/Michelf/MarkdownExtra.php');
  return \Michelf\MarkdownExtra::defaultTransform($text);
  } 
  
  
/**
  * Format text according to PHP SmartyPants Typographer.
  *
  * @param string $text the text that should be formatted.
  * @return string as the formatted html-text.
  */
  public static function smartyPantsTypographer($text) {
   require_once(__DIR__ . '/php-smartypants-typographer/smartypants.php');
   return SmartyPants($text);
  }
  
  
  
  
}
