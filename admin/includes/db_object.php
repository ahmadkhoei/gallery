<?php 

class Db_object {
    public static function find_all() {
	    // این یک درخواست است که همۀ ردیف های بانک دادۀ  یوزرز را میگیرد.
		return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
	}

	public static function find_by_id($user_id)
    {
        // این یک درخواست است که اگر شناسۀ عددی بگیرد، یک ردیف را خروجی می دهد.
        global $database;
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $user_id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

//        if (!empty($the_result_array)) {
//            $first_item = array_shift("$the_result_array");
//            return $first_item;
//        } else {
//            return false;
//        }


    }
    

    
	public static function find_by_query($sql) {
	    // این یک متد عمومی است که با دیتابیست ارتباط برقرار می کند و اطلاعات را می گیرد و در یک آرایه می ریزد.
		global $database;
		$result_set = $database->query($sql);
		$the_object_array = array();
		while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiation($row);
        }
		return $the_object_array;
    }
    

    public static function instantiation($the_record) {
        $calling_class = get_called_class();
        $the_object = new $calling_class;

        // $the_object = new self; 

//        $the_object->id         = $found_user['id'];
//        $the_object->username   = $found_user['username'];
//        $the_object->password   = $found_user['password'];
//        $the_object->first_name = $found_user['first_name'];
//        $the_object->last_name  = $found_user['last_name'];
        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
	}

	function has_the_attribute($the_attribute) {
	    $object_properties = get_object_vars($this);
	    return array_key_exists($the_attribute, $object_properties);

    }
    

    	
	protected function properties() {
		// return get_object_vars($this);

		$properties = array();
		foreach (static::$db_table_fields as $db_field) {
			if(property_exists($this, $db_field)) {
				$properties[$db_field] = $this->$db_field;
			}
		}

		return $properties;

	}


	protected function clean_properties() {
		global $database;
		$clean_properties = array();
		foreach ($this->properties() as $key => $value) {
			$clean_properties[$key] = $database->escape_string($value);

		}
		return $clean_properties;
	}

     
    

  
    public function save() { 
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;
		$properties = $this->clean_properties();

		$sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")"; 
		// $sql .= " VALUES ('";
		// $sql .= $database->escape_string($this->username) . "', '";
		// $sql .= $database->escape_string($this->password) . "', '";
		// $sql .= $database->escape_string($this->first_name) . "', '";
		// $sql .= $database->escape_string($this->last_name) . "')";


		 $sql .= " VALUES ('". implode("','", array_values($properties)) ."')";
	

		if ($database->query($sql)) {
			$this->id = $database->the_insert_id();
			return true;
		} else {
			return false;
		}

	} // Create Method

	public function update() {
		global $database;
		$properties = $this->clean_properties();
		$properties_pairs = array();

		foreach ($properties as $key => $value) {
			$properties_pairs[] = "{$key}='{$value}'";

		}

		$sql = "UPDATE " . static::$db_table . " SET ";
		$sql .= implode(",", $properties_pairs);
		$sql .= " WHERE id= " . $database->escape_string($this->id);


		// $sql = "UPDATE " . static::$db_table . " SET ";
		// $sql .= "username='"  . $database->escape_string($this->username)	. "', ";
		// $sql .= "password='"  . $database->escape_string($this->password)	. "', ";
		// $sql .= "first_name='"  . $database->escape_string($this->first_name)	. "', ";
		// $sql .= "last_name='"  . $database->escape_string($this->last_name)	. "' ";
		// $sql .= " WHERE id= " . $database->escape_string($this->id);




		echo $sql;
		$database->query($sql);
		return (mysqli_affected_rows($database->connection) == 1) ? true : false;
	} // End of Update method

	public function delete() {
		global $database;
		$sql = "DELETE FROM " . static::$db_table . " ";
		$sql .= " WHERE id=" . $database->escape_string($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return (mysqli_affected_rows($database->connection) == 1) ? true : false;
	}
    

}


?>