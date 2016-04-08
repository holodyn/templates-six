class myComponentTableTestUUID extends myComponentJTable {

  public function __construct(&$_db) {
    // Define Table with `uuid` as key
    parent::__construct('#__uuidTest', 'uuid', $_db);
  }

}