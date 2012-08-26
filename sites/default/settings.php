<?php  /**
   * The database credentials are stored in the Apache vhost config
   * of the associated site with SetEnv parameters.
   * They are called here with $_SERVER environment variables to 
   * prevent sensitive data from leaking to site administrators 
   * with PHP access, that potentially might be of other sites in
   * Drupal's multisite set-up.
   * This is a security measure implemented by the Aegir project.
   */
  $databases['default']['default'] = array(
    'driver' => "mysql",
    'database' => "kaveret",
    'username' => "admin",
    'password' => "1234567",
    'host' => "localhost",
    'port' => "3306",
  );
  $db_url['default'] = "mysql://admin:1234567@localhost:3306/kaveret";


  $profile = "minimal";
  $install_profile = "minimal";

  /**
  * PHP settings:
  *
  * To see what PHP settings are possible, including whether they can
  * be set at runtime (ie., when ini_set() occurs), read the PHP
  * documentation at http://www.php.net/manual/en/ini.php#ini.list
  * and take a look at the .htaccess file to see which non-runtime
  * settings are used there. Settings defined here should not be
  * duplicated there so as to avoid conflict issues.
  */
  @ini_set('arg_separator.output',     '&amp;');
  @ini_set('magic_quotes_runtime',     0);
  @ini_set('magic_quotes_sybase',      0);
  @ini_set('session.cache_expire',     200000);
  @ini_set('session.cache_limiter',    'none');
  @ini_set('session.cookie_lifetime',  0);
  @ini_set('session.gc_maxlifetime',   200000);
  @ini_set('session.save_handler',     'user');
  @ini_set('session.use_only_cookies', 1);
  @ini_set('session.use_trans_sid',    0);
  @ini_set('url_rewriter.tags',        '');
	
  /**
  * Set the umask so that new directories created by Drupal have the correct permissions
  */
  umask(0002);


/*
  global $conf;
$conf['cache_inc'] ='sites/default/modules/memcache/memcache.inc';
$conf['memcache_servers'] = array('127.0.0.1:11211' => 'default');
$conf['memcache_bins'] = array(
    'cache' => 'default',
    'cache_filter' => 'default',
    'cache_menu' => 'default',
    'cache_page' => 'default',
    'cache_views' => 'default',
);
$conf['memcache_stampede_protection'] = TRUE;
$conf['lock_inc'] = './sites/default/modules/memcache/memcache-lock.inc';
$conf['memcache_persistent'] = TRUE;

*/
include './sites/all/modules/og_domain/og_domain.url.inc';
