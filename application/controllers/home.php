<?php

class Home extends CI_Controller {

	public function __construct() {
	
		parent::__construct();

    $this->load->library( 'md_blog' );
	
	}
	
	public function index() {
	
		$this->load->helper( 'file' );
		$this->load->helper( 'directory' );

    $base = './site/';
		
		$directory = $base . 'blog/';
		
		$files = directory_map( $directory );
		$posts = array();
		foreach ( $files as $file ) {
		
      $p = $this->md_blog->parse_file( $directory, $file );
			array_push( $posts, $p );
      $body_data['posts'] = array_reverse( $posts );
		
		}
		
		$layout_data['navigation'] = $this->load->view( 'partials/nav', '', TRUE );
		$layout_data['body'] = $this->load->view( 'home/index', $body_data, TRUE );
		$layout_data['footer'] = $this->load->view( 'partials/footer', '', TRUE);
	  $this->output->enable_profiler(TRUE);	
		$this->load->view( 'layouts/main', $layout_data );
	
	}

  public function view( $file ) {
  
    $this->load->helper( array( 'file', 'directory' ) );

    $base = './site/';

    $directory = $base . 'blog/';

    // Get the post
    $body_data['post'] = $this->md_blog->parse_file( $directory, $file );
  
		$layout_data['navigation'] = $this->load->view( 'partials/nav', '', TRUE );
		$layout_data['body'] = $this->load->view( 'blog/single', $body_data, TRUE );
		$layout_data['footer'] = $this->load->view( 'partials/footer', '', TRUE);
	  $this->output->enable_profiler(TRUE);	
		$this->load->view( 'layouts/main', $layout_data );

  }
  
  public function tag( $tag ) {
	
		$this->load->helper( 'file' );
		$this->load->helper( 'directory' );

		$base = './site/';		
		$directory = $base . 'blog/';
		
    // Get all of the posts in the blog directory
		$files = directory_map( $directory );

		$matches = array();
		foreach ( $files as $file ) {
		
      // Check if post has the specified tag
      $match = $this->md_blog->has_tag( $directory, $file, $tag );

      // Add to the $matches array if it does
      if ( $match ) {
      
        array_push( $matches, $match );
      
      }

		}

    $posts = array();
    foreach ( $matches as $match ) {
    
      // Gather the post data for the match
      $p = $this->md_blog->parse_file( $directory, $match );
      // Then push it to the $posts array
      array_push( $posts, $p );
    
    }

    // Put posts in DESC chronological order
    $posts = array_reverse( $posts );

    // Send the posts to the view
		$body_data['posts'] = $posts;
		
		
		$layout_data['navigation'] = $this->load->view( 'partials/nav', '', TRUE );
		$layout_data['body'] = $this->load->view( 'tags/index', $body_data, TRUE );
		$layout_data['footer'] = $this->load->view( 'partials/footer', '', TRUE);
	  $this->output->enable_profiler(TRUE);	
		$this->load->view( 'layouts/main', $layout_data );
	
	}

}
