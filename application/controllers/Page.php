<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_page');
    }

	public function index($slug)
	{
    	$tot = $this->Model_page->page_check($slug);
    	if(!$tot) {
    		redirect(base_url().M_REWRITE.'admin/dashboard');
        	exit;
    	}

		$data['setting'] = $this->Model_common->all_setting();
		$data['page_about'] = $this->Model_common->all_page_about();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_blogs'] = $this->Model_common->all_blogs();

		$data['page_dynamic_detail'] = $this->Model_page->dynamic_page_by_slug($slug);		

		$this->load->view('view_header',$data);
		$this->load->view('view_page_dynamic',$data);
		$this->load->view('view_footer',$data);
	}
}