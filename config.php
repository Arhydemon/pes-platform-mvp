<?php
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' => 
  array (
    0 => 
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 => 
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'overwrite.cli.url' => 'http://localhost:8080',
  'upgrade.disable-web' => true,
  'instanceid' => 'ocs492gko1uf',
  'passwordsalt' => 'jfWwVMgErN8R061Mmt0CTNm9ip8NN9',
  'secret' => 'KeHfPl1NUt/ko+oU6Qk3euK4R/SNDz2n8eO7AEyyCDJAtEXs',
  'trusted_domains' => 
  array (
    0 => 'localhost:8080',
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '31.0.6.2',
  'dbname' => 'nextcloud',
  'dbhost' => 'db',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nc_user',
  'dbpassword' => 'nc_pass',
  'installed' => true,
  'allow_local_remote_servers' => true,
);
