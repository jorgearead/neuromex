<?php
class DBManager {
	public $conn;

	public function __construct() {
		$this->conn = null;
		$host = "mysql:host=localhost";
		$DB   = "dbname=neuromex";
		$user = "root";
		$pass = "";
		try {
			$this->conn = new PDO ( "$host;$DB", $user, $pass );
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) { echo "Connection failed: " . $e->getMessage(); }
	}

	public function Ejecutar($sql) {
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return true;
		} catch ( PDOException $e ) { echo $e->getMessage(); return false; }
	}

	public function Consultar($sql) {
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		} catch ( PDOException $e ) { echo $e->getMessage(); return false; }
	}

	public function GetLastInsertID() {
		try {
			$id = $this->conn->lastInsertId();
			return $id;
		} catch ( PDOException $e ) { return false; }
	}

	public function BeginTransaction() {
		try {
			$this->conn->beginTransaction();
			return true;
		} catch ( PDOException $e ) { return false; }
	}

	public function Rollback() {
		try {
			$this->conn->rollBack();
			return true;
		} catch ( PDOException $e ) { return false; }
	}

	public function Commit() {
		try {
			$this->conn->commit();
			return true;
		} catch ( PDOException $e ) { return false; }
	}

	public function Close() {
		try {
			$this->conn = null;
			return true;
		} catch ( PDOException $e ) { return false; }
	}

}
?>
