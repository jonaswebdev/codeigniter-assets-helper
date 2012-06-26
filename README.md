# Assets Newer Helper to CodeIgniter

#About
Generates the URL with parameters for the browser version does not consider the cache.
Useful for Javascript and CSS.
Applicable to local files.

#Installation
Put the <code>application/helpers/assets_helper.php</code> to your <code>application/helpers</code> folder.
* Require: PHP 5.3 

#Benefits
Helper automatically cares about browser caching so it appends last modified time for local files to the end of the filename, e.g. <code>my_file.js?tm=1314151490</code>

#Usage
Helper currently offers <code>assets_newer</code> function.

##assets_newer

  	<?php echo assets_newer($localUrl); ?>
