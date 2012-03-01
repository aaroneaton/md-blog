<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Md_Blog {

  function __construct() {
  
    $CI =& get_instance();

    $CI->load->helper( array( 'file', 'directory' ) );
  
  }

  function parse_file( $directory, $file ) {
  
    $content = read_file( $directory . $file );
    $title = $this->get_title( $content );
    $date = $this->get_date( $content );
    $tags = $this->get_tags( $content );

    $content = preg_replace( '/^%.*\n/m', '', $content );
    $content = parse_markdown_extra( $content );

    $p = array( 'title' => $title, 'date' => $date, 'tags' => $tags, 'content' => $content, 'file' => $file );

    return $p;
  
  }
  
  public function has_tag( $directory, $file, $tag ) {
  
	$content = read_file( $directory . $file );
	$tags = $this->get_tags( $content );
	
	if ( in_array( $tag, $tags ) ) {
	
		$response = 'Found ' . $tag;
	
	} else {
	
		$response = $tag . ' Not Found';
	
	}
	
	return $response;
	
  }

  private function get_title( $content ) {
  
    // Find everything after %title:
    preg_match( '/%title:\s(.*)/', $content, $title );

    return $title[1];
  
  }

  private function get_date( $content ) {
  
    // Find everything after %date
    preg_match( '/%date:\s(.*)/', $content, $date );

    return $date[1];
  
  }

  private function get_tags( $content ) {
  
    // Find everything after %tags:
    preg_match( '/%tags:\s(.*)/', $content, $tags );

    // Convert into an array
    $tags = explode( ',', $tags[1] );

	$tags = array_map( 'trim', $tags );
    return $tags;
  
  }

}
