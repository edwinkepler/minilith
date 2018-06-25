<?php
/**
 * Main object that loads classes and config files.
 */
class Main
{
    /**
     * Database object.
     */
    private $db;
    /**
     * Application config array.
     */
    private $config_app = array();
    /**
     * CSS files array.
     */
    private $css_files = array();
    /**
     * Scripts files array
     */
    private $script_files = array();

    /**
     * Constructor.
     * 
     * Create objects to and store them in variables for getting them later.
     * 
     * @param array Database config array.
     * @param array Application config array.
     */
    public function __construct($_db, $_app)
    {
        $this->db = new DB($_db, $_app);
    }

    /**
     * Return database object.
     * 
     * @return DB Database object
     */
    public function db()
    {
        return $this->db;
    }

    /**
     * Defines page name.
     */
    public static function setPageName($_name)
    {
        define("PAGE_NAME", $_name);
    }

    /**
     * Defines PAGE constant for pages and scripts.
     * Pages and scripts will check for this constant and this constant need
     * to be present for pages and scripts to work.
     */
    public static function definePage()
    {
        define("PAGE", true);
    }

    /**
     * Push CSS file to array.
     * 
     * @param string Path to CSS file.
     */
    public function setCss($_link)
    {
        array_push($this->css_files, $_link);
    }

    /**
     * Getter of CSS files.
     * 
     * @return array Array of paths to CSS files.
     */
    public function getCss()
    {
        return $this->css_files;
    }

    /**
     * Push script file to array.
     * 
     * @param string Path to script file.
     */
    public function setScript($_link)
    {
        array_push($this->script_files, $_link);
    }

    /**
     * Getter of script files.
     * 
     * @return array Array of paths to script files.
     */
    public function getScript()
    {
        return $this->script_files;
    }
}
?>
