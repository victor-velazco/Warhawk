<?php
class MySQLClass { 

    var $db, $conn; 

    public function __construct($server, $database, $username, $password){ 

        $this->conn = mysql_connect($server, $username, $password); 
        $this->db = mysql_select_db($database,$this->conn); 

    } 

	public function finalize() {
		mysql_close($this->conn);
	}
	
    public function insert_array($table, $insert_values) { 

        foreach($insert_values as $key=>$value) { 
            $keys[] = $key; 
            $insertvalues[] = '\''.$value.'\''; 
        } 

        $keys = implode(',', $keys); 
        $insertvalues = implode(',', $insertvalues); 

        $sql = "INSERT INTO $table ($keys) VALUES ($insertvalues)"; 

        $this->sqlordie($sql); 

    } 

    public function update_array($table, $keyColumnName, $id, $update_values) { 


        foreach($update_values as $key=>$value) { 

            $sets[] = $key.'=\''.$value.'\''; 

        } 
        $sets = implode(',', $sets); 

        $sql = "UPDATE $table SET $sets WHERE $keyColumnName = '$id'"; 

        $this->sqlordie($sql); 
    } 

    public function get_record_by_ID($table, $keyColumnName, $id, $fields = "*"){ 

        $sql = "SELECT $fields FROM $table WHERE $keyColumnName = '$id'"; 

        $result = $this->sqlordie($sql); 
         
        return mysql_fetch_assoc($result); 

    } 

    public function get_records_by_group($table, $groupKeyName, $groupID, $orderKeyName = '', $order = 'ASC', $fields = '*'){ 

        $orderSql = ''; 
        if($orderKeyName != '') $orderSql = " ORDER BY $orderKeyName $order"; 
        $sql = "SELECT $fields FROM $table WHERE $groupKeyName = '$groupID'" . $orderSql; 

        $result = $this->sqlordie($sql); 

        while($row = mysql_fetch_assoc($result)) { 

            $records[] = $row; 

        } 

        return $records; 

    } 

    public function sql_general($query){ 


        $result = $this->sqlordie($query); 

        while($row = mysql_fetch_assoc($result)) { 

            $records[] = $row; 

        } 

        return $records; 

    } 

     public function sql_loadimage($query){ 
        return $this->sqlordie($query);
    } 
    
   public function get_records_on_table($table, $orderKeyName = '', $orderSql = 'ASC', $andQuery='', $fields = '*'){ 

        //$orderSql = ''; 
        if($orderKeyName != '') $orderSql = " ORDER BY $orderKeyName $orderSql"; 
        $sql = "SELECT " . $fields . " FROM $table WHERE 1=1 " . $andQuery . $orderSql; 

        $result = $this->sqlordie($sql); 

        while($row = mysql_fetch_assoc($result)) { 

            $records[] = $row; 

        } 

        return $records; 

    } 

    public function execute_any ($query) {
        mysql_query($query, $this->conn);    
    }
    
    public function get_max_id_on_table($table, $field){ 

        $sql = "SELECT IFNULL( MAX( $field ) , 0 ) FROM  $table WHERE 1=1"; 

        $result = $this->sqlordie($sql); 
         
        $Ids = mysql_fetch_row($result);
		
		return $Ids[0]+1;
    } 

    private function sqlordie($sql) { 
         
        $return_result = mysql_query($sql, $this->conn); 
        if($return_result) { 
            return $return_result; 
        } else { 
            $this->sql_error($sql); 
        } 
    } 

    private function sql_error($sql) { 
        echo mysql_error($this->conn).'<br>'; 
        die('error: '. $sql); 
    } 

} 
define('DB_SERVER', 'localhost'); 
define('DB_NAME', 'quimerat_wgc'); 
define('DB_USERNAME', 'quimerat_usr'); 
define('DB_PASSWORD', 'quimerat_pwd'); 

?>