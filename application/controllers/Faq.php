<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_faq');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_faq'] = $this->Model_common->all_page_faq();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_blogs'] = $this->Model_common->all_blogs();

		$data['faqs'] = $this->Model_faq->all_faq();

		$this->load->view('view_header',$data);
		$this->load->view('view_faq',$data);
		$this->load->view('view_footer',$data);
	}
}