<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
            $this->load->model('Pages', 'p');
            
            $data['content'] = $this->p->getHome();
            $data['content']->title = 'Home';
            $data['content']->type = 'home';
                        
            $this->load->view('welcome_message', $data);
	}
        
        public function pages($page = false)
	{
            $this->load->model('Pages', 'p');
            
            if($page){
                $data['content'] = $this->p->getPageByUrl($page);
            }else{
                $data['content'] = $this->p->getHome();
                $data['content']->title = 'Home';
                $data['content']->type = 'home';
            }
            
            if($data['content'] == null || !$data['content'] || empty($data['content'])){
                show_404();
            }
            
            $this->load->view('welcome_message', $data);
	}
}
