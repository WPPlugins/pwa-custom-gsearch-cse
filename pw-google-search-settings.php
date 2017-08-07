<?php
class pwGoogleSearchSettings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Google Search Settings', 
            'manage_options', 
            'pw-gsearch-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'pw_gsearch_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>WPI Google Search Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'pw_gsearch_option_group' );   
                do_settings_sections( 'pw-gsearch-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'pw_gsearch_option_group', // Option group
            'pw_gsearch_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Search Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'pw-gsearch-setting-admin' // Page
        );  
    
        add_settings_field(
            'pw_gsearch_id', 
            'Google Search ID', 
            array( $this, 'gsearch_callback' ), 
            'pw-gsearch-setting-admin', 
            'setting_section_id'
        ); 
        
        
        add_settings_field(
            'pw_gsearch_page_url', 
            'Search Results Page URL', 
            array( $this, 'gsearch_page_url_callback' ), 
            'pw-gsearch-setting-admin', 
            'setting_section_id'
        ); 
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['pw_gsearch_id'] ) )
            $new_input['pw_gsearch_id'] = sanitize_text_field( $input['pw_gsearch_id'] );
        
        if( isset( $input['pw_gsearch_page_url'] ) )
            $new_input['pw_gsearch_page_url'] = sanitize_text_field( $input['pw_gsearch_page_url'] );
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }
    


    /** 
     * Get the settings option array and print one of its values
     */
    public function gsearch_callback()
    {
        printf(
            '<input type="text" id="pw_gsearch_id" name="pw_gsearch_option_name[pw_gsearch_id]" value="%s" />',
            isset( $this->options['pw_gsearch_id'] ) ? esc_attr( $this->options['pw_gsearch_id']) : ''
        );
    }
    
     public function gsearch_page_url_callback()
    {
        printf(
            '<input type="text" id="pw_gsearch_page_url" name="pw_gsearch_option_name[pw_gsearch_page_url]" value="%s" />',
            isset( $this->options['pw_gsearch_page_url'] ) ? esc_attr( $this->options['pw_gsearch_page_url']) : get_site_url().'/search'
        );
    }

}

if( is_admin() )
    $pw_google_search_settings = new pwGoogleSearchSettings();
