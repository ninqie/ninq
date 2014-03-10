<?php
/**
* Helpers for theming, available for all themes in their template files and functions.php.
* This file is included right before the themes own functions.php
*/

/**
<<<<<<< HEAD
* Get list of tools.
*/
function get_tools() {
  global $ninq;
  return <<<EOD
<p>Tools:
<a href="http://validator.w3.org/check/referer">html5</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">css3</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css21">css21</a>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">unicorn</a>
<a href="http://validator.w3.org/checklink?uri={$ninq->request->current_url}">links</a>
<a href="http://qa-dev.w3.org/i18n-checker/index?async=false&amp;docAddr={$ninq->request->current_url}">i18n</a>
<!-- <a href="link?">http-header</a> -->
<a href="http://csslint.net/">css-lint</a>
<a href="http://jslint.com/">js-lint</a>
<a href="http://jsperf.com/">js-perf</a>
<a href="http://www.workwithcolor.com/hsl-color-schemer-01.htm">colors</a>
<a href="http://dbwebb.se/style">style</a>
</p>

<p>Docs:
<a href="http://www.w3.org/2009/cheatsheet">cheatsheet</a>
<a href="http://dev.w3.org/html5/spec/spec.html">html5</a>
<a href="http://www.w3.org/TR/CSS2">css2</a>
<a href="http://www.w3.org/Style/CSS/current-work#CSS3">css3</a>
<a href="http://php.net/manual/en/index.php">php</a>
<a href="http://www.sqlite.org/lang.html">sqlite</a>
<a href="http://www.blueprintcss.org/">blueprint</a>
</p>
EOD;
}



/**
=======
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
 * Print debuginformation from the framework.
 */
 function get_debug() {
  $ninq = Cninq::Instance();
  if(empty($ninq->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($ninq->config['debug']['db-num-queries']) && $ninq->config['debug']['db-num-queries'] && isset($ninq->db)) {
    $flash = $ninq->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $ninq->db->GetNumQueries() . " queries.</p>";
  }
  if(isset($ninq->config['debug']['db-queries']) && $ninq->config['debug']['db-queries'] && isset($ninq->db)) {
    $flash = $ninq->session->GetFlash('database_queries');
    $queries = $ninq->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }
  if(isset($ninq->config['debug']['timer']) && $ninq->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $ninq->timer['first'], 5)*1000 . " msecs.</p>";
  }
  if(isset($ninq->config['debug']['ninq']) && $ninq->config['debug']['ninq']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of Cninq:</p><pre>" . htmlent(print_r($ninq, true)) . "</pre>";
  }
  if(isset($ninq->config['debug']['session']) && $ninq->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of Cninq->session:</p><pre>" . htmlent(print_r($ninq->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }
  return $html;
}

/**
 * Get messages stored in flash-session.
 */
 function get_messages_from_session() {
 $messages = Cninq::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}

/**
 * Login menu. Creates a menu which reflects if user is logged in or not.
 */
 function login_menu() {
  $ninq = Cninq::Instance();
  if($ninq->user['isAuthenticated']) {
    $items = "<a href='" . create_url('user/profile') . "'><img class='gravatar' src='" . get_gravatar(20) . "' alt=''> " . $ninq->user['acronym'] . "</a> ";
    if($ninq->user['hasRoleAdmin']) {
      $items .= "<a href='" . create_url('acp') . "'>acp</a> ";
    }
    $items .= "<a href='" . create_url('user/logout') . "'>logout</a> ";
  } else {
    $items = "<a href='" . create_url('user/login') . "'>login</a> ";
  }
  return "<nav>$items</nav>";
}

<<<<<<< HEAD
/**
 * Get a gravatar based on the user's email.
 */
 function get_gravatar($size=null) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(Cninq::Instance()->user['email']))) . '.jpg?' . ($size ? "s=$size" : null);
}

/**
 * Escape data to make it safe to write in the browser.
 */
 function esc($str) {
  return htmlEnt($str);
}


/**
* Filter data according to a filter. Uses CMContent::Filter()
*
* @param $data string the data-string to filter.
* @param $filter string the filter to use.
* @returns string the filtered string.
*/
function filter_data($data, $filter) {
  return CTextFilter::Filter($data, $filter);
}


/**
 * Display diff of time between now and a datetime.
 *
 * @param $start datetime|string
 * @returns string
 */
 function time_diff($start) {
  return formatDateTimeDiff($start);
}
=======

>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904

/**
 * Create a url by prepending the base_url.
 */
 function base_url($url=null) {
  return Cninq::Instance()->request->base_url . trim($url, '/');
<<<<<<< HEAD
}

/**
 * Create a url to an internal resource.
 *
 * @param string the whole url or the controller. Leave empty for current controller.
 * @param string the method when specifying controller as first argument, else leave empty.
 * @param string the extra arguments to the method, leave empty if not using method.
 */
 function create_url($urlOrController=null, $method=null, $arguments=null) {
  return Cninq::Instance()->request->CreateUrl($urlOrController, $method, $arguments);
}


/**
=======
}

/**
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
 * Create a url to an internal resource.
 *
 * @param string the whole url or the controller. Leave empty for current controller.
 * @param string the method when specifying controller as first argument, else leave empty.
 * @param string the extra arguments to the method, leave empty if not using method.
<<<<<<< HEAD
 */
 function create_url($urlOrController=null, $method=null, $arguments=null) {
  return Cninq::Instance()->request->CreateUrl($urlOrController, $method, $arguments);
}

/**
=======
=======
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
 * Render all views.
 */
 function render_views() {
  return Cninq::Instance()->views->Render();
}

/**
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
 * Prepend the theme_url, which is the url to the current theme directory.
 */
 function theme_url($url) {
  $ninq = Cninq::Instance();
  return "{$ninq->request->base_url}themes/{$ninq->config['theme']['name']}/{$url}";
}


/**
 * Return the current url.
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
 */
<<<<<<< HEAD
 function current_url() {
  return Cninq::Instance()->request->current_url;
}

/**
 * Get a gravatar based on the user's email.
 */
 function get_gravatar($size=null) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(Cninq::Instance()->user['email']))) . '.jpg?' . ($size ? "s=$size" : null);
}

/**
<<<<<<< HEAD
 * Check if region has views. Accepts variable amount of arguments as regions.
 *
 * @param $region string the region to draw the content in.
 */
 function region_has_content($region='default' /*...*/) {
  return Cninq::Instance()->views->RegionHasView(func_get_args());
}

/**
 * Render all views.
 * @param $region string the region to draw the content in.
 */
 function render_views($region ='default') {
  return Cninq::Instance()->views->Render($region);
}






=======
 * Escape data to make it safe to write in the browser.
 */
 function esc($str) {
  return htmlEnt($str);
=======
 function create_url($urlOrController=null, $method=null, $arguments=null) {
  return Cninq::Instance()->request->CreateUrl($urlOrController, $method, $arguments);
}

/**
 * Render all views.
 */
 function render_views() {
  return Cninq::Instance()->views->Render();
}

/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
<<<<<<< HEAD
 function theme_url($url) {
  $ninq = Cninq::Instance();
  return "{$ninq->request->base_url}themes/{$ninq->config['theme']['name']}/{$url}";
=======
 function get_debug() {
  $ninq = Cninq::Instance();
  if(empty($ninq->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($ninq->config['debug']['db-num-queries']) && $ninq->config['debug']['db-num-queries'] && isset($ninq->db)) {
    $flash = $ninq->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $ninq->db->GetNumQueries() . " queries.</p>";
  }
  if(isset($ninq->config['debug']['db-queries']) && $ninq->config['debug']['db-queries'] && isset($ninq->db)) {
    $flash = $ninq->session->GetFlash('database_queries');
    $queries = $ninq->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }
  if(isset($ninq->config['debug']['timer']) && $ninq->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $ninq->timer['first'], 5)*1000 . " msecs.</p>";
  }
  if(isset($ninq->config['debug']['lydia']) && $ninq->config['debug']['lydia']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLydia:</p><pre>" . htmlent(print_r($ninq, true)) . "</pre>";
  }
  if(isset($ninq->config['debug']['session']) && $ninq->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CLydia->session:</p><pre>" . htmlent(print_r($ninq->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }
  return $html;
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
}


/**
<<<<<<< HEAD
* Filter data according to a filter. Uses CMContent::Filter()
*
* @param $data string the data-string to filter.
* @param $filter string the filter to use.
* @returns string the filtered string.
*/
function filter_data($data, $filter) {
  return CTextFilter::Filter($data, $filter);
}


/**
 * Display diff of time between now and a datetime.
 *
 * @param $start datetime|string
 * @returns string
 */
 function time_diff($start) {
  return formatDateTimeDiff($start);
}


=======
<<<<<<< HEAD
 * Return the current url.
 */
 function current_url() {
  return Cninq::Instance()->request->current_url;
}

/**
 * Get a gravatar based on the user's email.
 */
 function get_gravatar($size=null) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(Cninq::Instance()->user['email']))) . '.jpg?' . ($size ? "s=$size" : null);
=======
 * Get messages stored in flash-session.
 */
 function get_messages_from_session() {
 $messages = Cninq::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
}



>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
>>>>>>> 28669f38949825b8a0b2573d25c0f2387f46c904
