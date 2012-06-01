<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Script Tag
*
* Generates a script inclusion of a JavaScript file
* Based on the CodeIgniters original Link Tag.
*
* Author: Emir Beganovic
*
* @access    public
* @param    mixed    single javascript file or an array of files
* @param    string    language
* @param    string    type
* @return    string
*/    

if ( ! function_exists('js'))
{
    function js($src = '', $language = 'javascript', $type = 'text/javascript')
    {
        $CI =& get_instance();

        $script = '<script ';
	
        if ( is_array ( $src ) ) // iterate the array 
        {
			
            foreach ($src as $file_location)
            {
			
				if ( strpos($file_location, '://') !== FALSE )
                {
			
					$script .= 'src="' . $file_location . '"'; // external link
                }
                else
                {
					$source = $CI->config->slash_item('base_url') . $file_location;
				
					// here we also check if file exists, filemtime will return false if it doesn't
					// if it exists, let's append last modified time to link
					
					$filemtime = filemtime($file_location); 
					if($filemtime != FALSE) $source .= '?' . $filemtime;
					$script .= 'src="' . $source . '"';
					
                }
				$script .= ' language="' . $language . '" type="' . $type . '"';  
            }
           	
            $script .= "></script>";
			$script .= "\n"; // append new line
        }
        else
        {
		
        	if ( strpos($src, '://') !== FALSE )
            {
				$script .= 'src="' . $src . '"'; // external link            
			}
            
            else
				
            {
                $pathinfo = pathinfo($src);
				$extension = explode("?", $pathinfo['extension']); // get the basename in case that extension already contains something after the question mark

				// we need to build file location to get the modified time
				if(!empty($extension[1])) { // there is something after the question mark
					$file_location = $_SERVER['DOCUMENT_ROOT'].'/' . $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '.' . $extension[0];
				}
				else {
					$file_location = $_SERVER['DOCUMENT_ROOT'].'/' . $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '.' . $pathinfo['extension'];
				}
				
				$source = $CI->config->slash_item('base_url') . $src;
				
				// here we also check if file exists, filemtime will return false if it doesn't
				// if it exists, let's append last modified time to link
				
				$filemtime = filemtime($file_location); 
				if($filemtime != FALSE) $source .= '?' . $filemtime;
				
				$script .= 'src="' . $source . '"';
			}
                
            $script .= ' language="'.$language.'" type="'.$type.'"';
            
            $script .= '></script>';
			$script .= "\n";
        }

    
        return $script;

    }
}


if ( ! function_exists('css'))
{
    function css($src = '', $rel = 'stylesheet', $type = 'text/css')
    {
	$CI =& get_instance();

        $script = '<link ';
	
        if ( is_array ( $src ) ) // iterate the array 
        {
			
            foreach ($src as $file_location)
            {
			
				if ( strpos($file_location, '://') !== FALSE )
                {
			
					$script .= 'href="' . $file_location . '"'; // external link
                }
                else
                {
					$source = $CI->config->slash_item('base_url') . $file_location;
				
					// here we also check if file exists, filemtime will return false if it doesn't
					// if it exists, let's append last modified time to link
					
					$filemtime = filemtime($file_location); 
					if($filemtime != FALSE) $source .= '?' . $filemtime;
					$script .= 'href="' . $source . '"';
					
                }
				$script .= ' rel="' . $rel . '" type="' . $type . '"';  
            }
           	
            $script .= " />";
			$script .= "\n"; // append new line
        }
        else
        {
		
        	if ( strpos($src, '://') !== FALSE )
            {
				$script .= 'src="' . $src . '"'; // external link            
			}
            
            else
				
            {
                $pathinfo = pathinfo($src);
				$extension = explode("?", $pathinfo['extension']); // get the basename in case that extension already contains something after the question mark

				// we need to build file location to get the modified time
				if(!empty($extension[1])) { // there is something after the question mark
					$file_location = $_SERVER['DOCUMENT_ROOT'].'/' . $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '.' . $extension[0];
				}
				else {
					$file_location = $_SERVER['DOCUMENT_ROOT'].'/' . $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '.' . $pathinfo['extension'];
				}
				
				$source = $CI->config->slash_item('base_url') . $src;
				
				// here we also check if file exists, filemtime will return false if it doesn't
				// if it exists, let's append last modified time to link
				
				$filemtime = filemtime($file_location); 
				if($filemtime != FALSE) $source .= '?' . $filemtime;
				
				$script .= 'href="' . $source . '"';
			}
                
            $script .= ' rel="'.$rel.'" type="'.$type.'"';
            
            $script .= ' />';
			$script .= "\n";
        }

    
        return $script;

    }
}