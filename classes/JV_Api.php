<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JV_Api {
	private $_rclient;

	public function __construct() {
		$this->_rclient = new JV_Remote_Client();
	}

	public function get_locations( $args = '' ) {
		try {
			$locations = $this->_rclient->get( 'location', $args );
			return $location;
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage() );
		}
	}

	public function get_jobs( $args = '') {
		try {
			$jobs = $this->_rclient->get( 'job', $args );
			return $jobs;
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage() );
		}
	}

	public function get_departments( $args = '') {
		try {
			$departments = $this->_rclient->get( 'department', $args );
			return $departments;
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage() );
		}
	}

	public function get_categories( $args = '') {
		try {
			$categories = $this->_rclient->get( 'category', $args );
			return $categories;
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage() );
		}
	}
}