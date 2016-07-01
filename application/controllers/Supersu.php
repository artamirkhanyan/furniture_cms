<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supersu extends CI_Controller {

	public function index()
	{
            
	}
        
        public function pages($page = false)
	{
            $this->load->model('Pages', 'p');
            $data['menu'] = $this->p->getForAdminMenu();
            $data['message'] = [];
            
            if($this->input->post('gogo')){
                $page_id = (int)$this->input->post('page_id');
                $content = $this->input->post('content');
                
                if($page_id == 0){
                    $result = $this->p->updateHomeContent($content);
                }else{
                    if($this->p->checkContent($page_id)){
                        $result = $this->p->updateContent($page_id, $content);
                    }else{
                        $result = $this->p->addContent($page_id, $content);
                    }
                }
                
                if($result){
                    $data['message'] = ['error' => false, 'msg' => 'done'];
                }else{
                    $data['message'] = ['error' => true, 'msg' => 'fail'];
                }
            }
            
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
            
            $this->load->view('supersu/pages', $data);
	}
        
        public function newpage($page = false)
	{
            $this->load->model('Pages', 'p');
            $data['error'] = false;
            if($this->input->post('gogo')){
                if($this->input->post('title')){
                    $res = $this->p->addNewPage($this->input->post('title'), $this->input->post('url'), $this->input->post('parent'));
                
                    if($res){
                        redirect(base_url('supersu/pages/'.$this->input->post('url')));
                    }else{
                        $data['error'] = 'Oops';
                    }
                }else{
                    $data['error'] = 'Missing Title';
                }
            }
            
            
            $data['menu'] = $this->p->getForMenu();
            
            $data['parents'] = $this->p->getParents();
            
            $this->load->view('supersu/newpage', $data);
	}
        
        public function upload(){
            $dir = 'public/images/';
 
            $_FILES['file']['type'] = strtolower($_FILES['file']['type']);

            if ($_FILES['file']['type'] == 'image/png'
            || $_FILES['file']['type'] == 'image/jpg'
            || $_FILES['file']['type'] == 'image/gif'
            || $_FILES['file']['type'] == 'image/jpeg'
            || $_FILES['file']['type'] == 'image/pjpeg')
            {
                // setting file's mysterious name
                $filename = md5(date('YmdHis')).'.jpg';
                $file = $dir.$filename;

                // copying
                move_uploaded_file($_FILES['file']['tmp_name'], $file);

                // displaying file
                $array = array(
                    'url' => '/public/images/'.$filename,
                    'filelink' => '/public/images/'.$filename,
                );

                echo stripslashes(json_encode($array));

            }
 

        }
        
        public function remove($page_id){
            if (!$this->input->is_ajax_request()) {
                exit('No direct script access allowed');
            }
            $this->load->model('Pages', 'p');
            $result = $this->p->removePage($page_id);
            echo json_encode($result);
        }
}
