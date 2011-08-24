#About
CodeIgniter helper for building HTML links to assets (scripts, stylesheets and images)

#Installation
Put the <code>application/helpers/assets_helper.php</code> to your <code>application/helpers</code> folder.

#Benefits
Helper automatically cares about browser caching so it appends last modified time for local files to the end of the filename, e.g. <code>my_file.js?1314151490</code>

#Usage
Helper currently offers <code>script_tag</code> and <code>style_tag</code> functions.

##script_tag

  	script_tag('assets/js/myfile.js');
or

  	script_tag('https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');

##style_tag

		style_tag('assets/css/style.css');
or

		style_tag('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/smoothness/jquery-ui.css');