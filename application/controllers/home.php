<?php

class Home extends CI_Controller {

	public function __construct() {
	
		parent::__construct();
	
	}
	
	public function index() {
	
		$this->load->helper( 'file' );
		$this->load->helper( 'directory' );
		
		$directory = './site/blog/';
		
		$files = directory_map( $directory );
		$body_data['posts'] = array();
		foreach ( $files as $file ) {
		
			$content = read_file( $directory . $file );
      preg_match( '/%title:\s(.*)/', $content, $title );

      $content = preg_replace( '/^%.*\n/m', '', $content );
      $content = parse_markdown_extra( $content );
			array_push( $body_data['posts'], array( 'title' => $title[1], 'content' => $content ) );
		
		}
		
		$layout_data['navigation'] = $this->load->view( 'partials/nav', '', TRUE );
		$layout_data['body'] = $this->load->view( 'home/index', $body_data, TRUE );
		$layout_data['footer'] = $this->load->view( 'partials/footer', '', TRUE);
		
		$this->load->view( 'layouts/main', $layout_data );
	
	}

}
