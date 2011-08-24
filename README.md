#About
CodeIgniter helper for building HTML links to assets (scripts, stylesheets and images)

#Installation
Put the <code>application/helpers/assets_helper.php</code> to your <code>APPPATH/helpers</code> folder.

#Benefits
Helper automatically cares about browser caching so it appends last modified time for local files to the end of the filename, e.g. <code>my_file.js?1314151490</code>

#Usage
Helper currently offers only <code>script_tag</code> function.

##script_tag

  script_tag('assets/js/myfile.js');
or

  script_tag('https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');