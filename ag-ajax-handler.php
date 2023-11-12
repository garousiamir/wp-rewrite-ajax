<?php
class agAjaxHandler {

  public function __construct() {
      add_action('wp_enqueue_scripts', array($this, 'enqueueAjaxAssets'));
      add_action('init', array($this, 'initRewriteRules'));
  }

  public function enqueueAjaxAssets() {
      $datashop = array(
          home_url(),
      );
      wp_enqueue_script('js-ajax-request-example', get_template_directory_uri() . '/js-ajax-request-example.js', array('jquery'), null, true);
      wp_localize_script('js-ajax-request-example', 'siteurl', $datashop);

  }

  public function initRewriteRules() {
      $this->addRewriteRule('search_ajax', 'search_ajax');
  
  }

  private function addRewriteRule($tag, $rule) {
      add_rewrite_tag('%rewrite_' . $tag . '%', '([^&/]+)');
      add_rewrite_rule($rule . '/?([^/]*)', 'index.php?rewrite_' . $tag . '=$matches[1]', 'top');
  }

}