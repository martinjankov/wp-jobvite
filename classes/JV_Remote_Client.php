<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class JV_Remote_Client {
	private $_base_url;

	private $_credentials;

	private $_call_args;

	public function __construct() {
		$this->_on_init();
	}

	private function _on_init() {
		$this->_base_url = get_option( 'jv_api_endpoint' );

		if ( get_option( 'jv_staging' ) ) {
			$this->_base_url = get_option( 'jv_stg_api_endpoint' );
		}

		$this->_credentials = '?api=' . get_option( 'jv_api_key' ) . '&sc=' . get_option( 'jv_api_secret' );

		$this->_call_args = array(
			'timeout' => 5,
			'header' => array(
				'Content-Type' => 'application/json'
			)
		);
	}

	public function get( $type, $args = '' ) {
		$url_query = '';
		
		if ( $args !== '' ) {
			$url_query .= '&' . $args;
		}

		$url = $this->_base_url .  $type . $this->_credentials .  $url_query;

		try {
			$response = wp_remote_get( $url, $this->_call_args );

			if ( ! 200 === wp_remote_retrieve_response_code( $response ) ) {
				throw new Exception('Failed to retrieve data. API might be down');
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );

			if ( isset( $response->error ) ) {
				throw new Exception('An error occured');
			}

			if ( isset( $response->status ) && 200 !== $response->status->code ) {
				throw new Exception( $response->status->messages[0] );
			}			

			return $response;
		} catch ( Exception $e ) {
			throw new Exception( $e->getMessage() );
			
		} 
	}
}