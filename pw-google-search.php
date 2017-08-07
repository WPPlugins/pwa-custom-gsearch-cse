<?php
class pwGoogleSearch{
    
    private $pw_gsearch_id;
    
     public function __construct() {
        add_shortcode('PW_ADD_GSEARCH', array($this, 'pw_add_gsearch'));
        add_shortcode('PW_ADD_GSEARCH_RESULTS', array($this, 'pw_add_gsearch_results'));

        $options = get_option('pw_gsearch_option_name');
        $this->pw_gsearch_id = esc_attr($options['pw_gsearch_id']);
        $this->pw_gsearch_page_url = esc_url($options['pw_gsearch_page_url']);
    }
    
    function pw_add_gsearch(){
       $blocale=get_bloginfo ( 'language' );
        ?>
             <form id="searchbox" action="<?php echo $this->pw_gsearch_page_url ?>" class="gsearch-form">
                <input type="hidden" name="cx" value="<?php echo $this->pw_gsearch_id; ?>" />
                <input id="top-search-q" name="q" type="search" size="23"  class="search-field" placeholder="<?php echo __("Search"); ?> ..."  />
                <input type="hidden" name="cof" value="FORID:11" />
                <input type="hidden" name="locale-search" value="<?php echo $blocale; ?>" />
              </form>
<?php
    }
    
    function pw_add_gsearch_results(){
        $blocale=get_bloginfo ( 'language' ); 
       ?>

        <form class="gsearch-form" action="<?php echo $this->pw_gsearch_page_url ?>" id="searchbox_<?php echo $this->pw_gsearch_id; ?>">
            <input type="hidden" value="<?php echo $this->pw_gsearch_id; ?>" name="cx">
            <input type="search" placeholder="<?php echo __("Search"); ?> ..." class="search-field" size="23" name="q" id="top-search-q" style="float: left">
            <input type="hidden" value="FORID:11" name="cof">
            <input type="hidden" value="<?php echo $blocale; ?>" name="locale-search">
           <input type="submit" value="Go" id="search-form-submit" /> 
        </form>
          <!--[if IE 8]>
        <script type="text/javascript">
        var googleSearchResizeIframe = false;
        </script>
        <![endif]-->   
          <!-- Google Search Result Snippet Begins -->  
          <div id="results_<? echo $this->pw_gsearch_id; ?>"></div>
          <script type="text/javascript">
          var googleSearchIframeName = "results_<? echo $this->pw_gsearch_id; ?>";
          var googleSearchFormName = "searchbox_<? echo $this->pw_gsearch_id; ?>";
          var googleSearchFrameWidth = 1000;
          var googleSearchFrameborder = 0;
          var googleSearchDomain = "www.google.com";
          var googleSearchPath = "/cse";
        </script> 
          <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>   
          <!-- Google Search Result Snippet Ends --> 
        <?php
    }
    
}
?>
