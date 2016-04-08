
  // Check Valid Access
  defined('WHMCS_CLIENT') or defined('WHMCS_ADMIN') or die('Invalid Access');

  // The same definitions should be present in every language file
  $_ADMINLANG["wbteampro"]["plugin_example"]["xml_name"] = 'Example Plugin';
  $_ADMINLANG["wbteampro"]["plugin_example"]["xml_description"] = 'The Example Plugin Description';
  $_ADMINLANG["wbteampro"]["plugin_example"]["params"]["example_text-def"] = 'Example Input';
  $_ADMINLANG["wbteampro"]["plugin_example"]["params"]["example_text-desc"] = 'TEXT Input Field';
