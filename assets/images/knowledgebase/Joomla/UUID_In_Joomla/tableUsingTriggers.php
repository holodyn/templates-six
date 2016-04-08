class myComponentTableTestUUID extends JTable {

  public function __construct(&$_db) {
    // Define Table with `uuid` as key
    parent::__construct('#__uuidTest', 'uuid', $_db);
  }

  public function store($updateNulls = false) {
    // Is New Record?
    $isNew = empty($this->{$this->_tbl_key});

    // Perform Standard Store
    parent::store($updateNulls);

    // If New, Pull Key Value
    if( $isNew == 'uuid' ){
      $this->_db->setQuery('SELECT @last_uuid');
      $this->{$this->_tbl_key} = $this->_db->loadResult();
    }

    // Return TRUE / FALSE
    return count($this->getErrors()) == 0;
  }

}