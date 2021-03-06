<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Helper files
| 4. Custom config files
| 5. Language files
| 6. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packges
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/

$autoload['packages'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in the system/libraries folder
| or in your application/libraries folder.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'session', 'xmlrpc');
*/

$autoload['libraries'] = array(
    'test_lib',
    'database',
    'facebook/facebook',
    'system/template/template',
    'system/array/method_array',
    'system/session/ses_system',
    'session',
    'template/template_render',
    'template/render_page',
    'slider/slider_lib',
    'system_requirements/system_requirements_lib',
    'users/user_lib',
    'blog/blog_lib',
    'cafe/cafe_lib',
    'contact/contact_lib',
    'system/tbl/tbl_system',
    'system/tbl/tbl_cafe',
    'system/tbl/tbl_cafe_gallery',
    'system/tbl/tbl_cafe_serves',
    'system/tbl/tbl_cafe_comment',
    'system/tbl/tbl_users',
    'system/tbl/tbl_contact_us',
    'system/url/method_url',
    'system/template/template_admin',
    'admin/template/render_admin',
    'admin/template/template_admin_render',
    'admin/users/function_user',

);


/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/

$autoload['helper'] = array('url' ,'language','date');


/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/

$autoload['config'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/

$autoload['language'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('model1', 'model2');
|
*/

$autoload['model'] = array(
    'slider/get_slider',
    'system_requirements/get_system_requirements',
    'blog/get_blog',
    'cafe/get_cafe',
    'user/get_user',
    'cafe/validation_cafe',
    'blog/validation_blog',
    'contact/set_contact',
    'admin/user/user_md',
);


/* End of file autoload.php */
/* Location: ./application/config/autoload.php */