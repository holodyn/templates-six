<?php

  // Check Valid Access
  defined('WHMCS_ADMIN') or defined('WHMCS_CLIENT') or die('Invalid Access');

  // "Example" Plugin Class
  class wbTeamPro_Plugin_Example extends wbTeamPro_Plugin {

    // Class Constructor
    function __construct( $extension ){
      // Import Plugin Language
      wbTeamPro_Lang::import( dirname(__FILE__).DS.'lang'.DS );
      // Initialize Plugin
      parent::__construct( $extension );
    }

    // System Event Functions
    function admin_onInitialize( &$data, &$params ){
      // .. perform action ..
    }

  }