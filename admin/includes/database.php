<?php 
require_once ("new_config.php");
class Database {
	public $connection;
	function __construct() {
		$this->open_db_connection();
	} 
	public function open_db_connection() {
		//PROCEDURAL
		// $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        //اینجا وصل میشویم به دیتابیس
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//		if (mysqli_connect_errno()) {
		//اینجا اگر قرار بود وصل شدن اروری داشته باشد برنامه قطع خواهد شد.
        if ($this->connection->connect_errno) {
//			die("Database connection failed badly" . mysqli_error());
			die("Database connection failed badly" . $this->connection->connect_error);
		}
	}
	public function query($sql) {
		// $result = mysqli_query($this->connection, $sql);
        // اینجا از دیتابیس اطلاعات طلب می کنیم
        // اطلاعات طلب شده داخل یک آرایه به نام ریزالت ذخیره می شود.
		$result = $this->connection->query($sql);
		// اینجا مطمئن می شویم که درخواست و طلب اطلاعات پاسخ مناسبی دارد
		$this->confirm_query($result);
		// اینجا اطلاعات را باز می گردانیم به طلب کننده.
		return $result;
	}

	private function confirm_query($result) {
	    // مطمئن میشویم که نتیجۀ درخواست از بانک داده پر است.
		if(!$result) {
//			die("Query failed") . mysqli_error($this->connection));
			die("Query Failed" . $this->connection->error);

		}
	}

	public function escape_string($string) {
//		$escaped_string = mysqli_real_escape_string($this->connection,$string);
        // اینجا حروف اضافی را از پارامتر پاس شده بر می داریم
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;
	}

	public function the_insert_id() {
		// return mysql_insert_id($this->connection);
		return $this->connection->insert_id; 
	}
}

// اینجا یک آبجکت از کلاس دیتابیس برمیداریم
$database = new Database();


?>