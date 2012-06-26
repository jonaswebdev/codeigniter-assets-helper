<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Assets Newer Helper to CodeIgniter
 * 
 * Generates the URL with parameters for the browser version does not consider the cache.
 * Useful for Javascript and CSS.
 * 
 * * Require: PHP 5.3 
 * 
 * @author Jonas Rosado
 * @since June/2012
 * @uses <?php echo assets_newer($localUrl); ?> OR <?php echo assets_newer($filePath); ?>
 */
if (!function_exists('assets_newer'))
{

    function assets_newer($src)
    {
        
        // CI Instace
        $CI = & get_instance();
        
        //Verify If the file is external, because do not get information
        if (preg_match('@http@', $src) == true && preg_match('@'.$CI->config->slash_item('base_url').'@', $src) == false)
        {
            return $src; // external link 
        }
        
        // Store parameters of filepath
        if($pars = strstr($src, '?')){
            // Renove parameters of filepath
            $src = strstr($src, '?', true);
        }
        
        // set full file path                
        $localPath = $_SERVER['DOCUMENT_ROOT'] . str_replace($CI->config->slash_item('base_url'), '/', $src);
        
        // clear cache
        clearstatcache();

        // if file exist, get modify time
        if (file_exists($localPath) == true && $filemtime = filemtime($localPath))
        {
            $pars = '?tm=' . $filemtime . str_replace('?', '&', $pars);
        }
        
        // Return URL
        return $src . $pars;
    }

}