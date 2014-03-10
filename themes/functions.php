<?php
/**
* Helpers for theming, available for all themes in their template files and functions.php.
* This file is included right before the themes own functions.php
*/

/**
 * Create a url by prepending the base_url.
 */
 function base_url($url) {
  return $ninq->request->base_url . trim($url, '/');
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
 function theme_url($url) {
  $ninq = Cninq::Instance();
  return "{$ninq->request->base_url}themes/{$ninq->config['theme']['name']}/{$url}";
}


/**
 * Return the current url.
 */
 function current_url() {
  return $ninq->request->current_url;
}


/**
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
  if(isset($ninq->config['debug']['lydia']) && $ninq->config['debug']['lydia']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLydia:</p><pre>" . htmlent(print_r($ninq, true)) . "</pre>";
  }
  if(isset($ninq->config['debug']['session']) && $ninq->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CLydia->session:</p><pre>" . htmlent(print_r($ninq->session, true)) . "</pre>";
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
