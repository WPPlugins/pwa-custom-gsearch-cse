=== Integrate Google Custom Search (CSE) ===
Tags: Google Search, Google custom search, wordpress search, CSE
Requires at least: 3.8
Tested up to: 4.5
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Contributors: rohanmehta19
Stable tag: 1.2

Replace wordpress search with Google Custom Search (CSE)
== Description ==

This plugin replaces the wordpress search engine with Google custom Search engine. 
Below are steps to follow after installing the plugin

For detailed steps with screenshots including how to register your site on Google Custom search please visit http://phpwpinfo.com/replace-wordpress-search-with-google-custom-search-cse/

1. Register you site on [Google Custom Search]https://cse.google.co.in/cse/
2. Add the search ID to the settings screen of the plugin
3. Add the URL of the search results page on the setting screen of the plugin
4. Comment/Remove the code in searchform.php in your themes folder of probably header.php and add below code instead
do_shortcode("[PW_ADD_GSEARCH]");
5. Add below shortcode on your search results page [PW_ADD_GSEARCH_RESULTS]



== Installation ==

1. Upload the plugin files Google Maps Plotting in the same way you'd install any other plugin.
2. Activate the plugin
3. Create a search results page (where the search results will be dislayed). On that page add the shortcode [PW_ADD_GSEARCH_RESULTS]
4. Add the Google Search ID on the settings screen

== Screenshots ==
For detailed steps with screenshots including how to register your site on Google Custom search please visit http://phpwpinfo.com/replace-wordpress-search-with-google-custom-search-cse/

== Documentation ==
For detailed steps with screenshots including how to register your site on Google Custom search please visit http://phpwpinfo.com/replace-wordpress-search-with-google-custom-search-cse/


== Frequently Asked Questions ==

Visit: http://phpwpinfo.com/replace-wordpress-search-with-google-custom-search-cse/

== Changelog ==
1.1: January 31, 2016

1. Fix - Search form ID giving error
2. Fix - form security (sanitise fields)


== Upgrade Notice ==

