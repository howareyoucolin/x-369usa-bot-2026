<?php

require_once __DIR__ . '/../config.php';

class DB{
	
	private $connection = null;
	
	public function __construct(){
		$this->connection = @mysqli_connect( DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME );
		
		if( !$this->connection ){
			$error = mysqli_connect_error();
			throw new Exception( 'Database connection failed: ' . $error );
		}
		
		mysqli_set_charset( $this->connection, 'utf8' );
	}
	
	public function query($sql){
		$result = mysqli_query( $this->connection, $sql );
		if( !$result ){
			throw new Exception( 'Query error: ' . mysqli_error( $this->connection ) );
		}
		return $result;
	}
	
	public function get_results($sql){
		$results = array();
		$query_result = $this->query( $sql );
		while( $object = $query_result->fetch_object() ){
			$results[] = $object;
		}
		$query_result->free();
		return $results;
	}
	
	public function get_row($sql){
		$query_result = $this->query( $sql );
		$object = $query_result->fetch_object();
		$query_result->free();
		return $object ?: false;
	}
	
	public function get_var($sql){
		$query_result = $this->query( $sql );
		$row = $query_result->fetch_row();
		$query_result->free();
		return $row ? $row[0] : false;
	}
	
	public function escape($value){
		return mysqli_real_escape_string( $this->connection, $value );
	}
	
}
