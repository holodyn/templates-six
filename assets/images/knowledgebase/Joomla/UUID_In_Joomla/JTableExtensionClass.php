class myComponentJTable extends JTable {

  public function store($updateNulls = false) {
    $k = $this->_tbl_keys;

    // Implement JObservableInterface: Pre-processing by observers
    $this->_observers->update('onBeforeStore', array($updateNulls, $k));

    // If a primary key exists update the object, otherwise insert it.
    if ($this->hasPrimaryKey())
    {
      $result = $this->_db->updateObject($this->_tbl, $this, $this->_tbl_keys, $updateNulls);
    }
    else
    {
      if( $this->_tbl_key == 'uuid' )
        $this->uuid = $this->gen_uuid();
      $result = $this->_db->insertObject($this->_tbl, $this, $this->_tbl_keys[0]);
    }

    // Implement JObservableInterface: Post-processing by observers
    $this->_observers->update('onAfterStore', array(&$result));

    return $result;
  }

  // Thank you William
  // http://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid
  function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      // 32 bits for "time_low"
      mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
      // 16 bits for "time_mid"
      mt_rand( 0, 0xffff ),
      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand( 0, 0x0fff ) | 0x4000,
      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand( 0, 0x3fff ) | 0x8000,
      // 48 bits for "node"
      mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
  }

}