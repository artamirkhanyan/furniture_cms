<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Model {
    
    public function addNewPage($title, $url, $parent=0){
        return $this->db->insert('pages', [
            'title' => $title,
            'url'   => $url,
            'parent'=> $parent 
        ]);
    }
    
    public function removePage($page_id){
        
        $this->db->where('page_id', $page_id);
        $res = $this->db->delete('page_content');
        
        if($res){
            $this->db->where('id', $page_id);
            return $this->db->delete('pages');
        }
        return false;
    }
    
    public function addContent($page_id, $content){
        return $this->db->insert('page_content', [
            'page_id' => $page_id,
            'content'   => $content
        ]);
    }
    
    public function updateContent($page_id, $content){
        $this->db->where('page_id', $page_id);
        return $this->db->update('page_content', [
            'content'   => $content
        ]);
    }
    
    public function updateHomeContent($content){
        $this->db->where('id', 1);
        return $this->db->update('homepage', [
            'content'   => $content
        ]);
    }
    
    public function checkContent($page_id){
        $this->db->where('page_id', $page_id);
        $query = $this->db->get('page_content');
        return $query->num_rows();
    }
    

    public function getPageByUrl($url){
        
        $this->db->select('pages.id, pages.url, pages.title, page_content.content');
        $this->db->from('pages');
        $this->db->where('pages.url', $url);
        $this->db->join('page_content', 'page_content.page_id = pages.id', 'left');
        $query = $this->db->get();
        
        return $query->row();
    }
    
    public function getHome(){
        $this->db->where('id', 1);
        $query = $this->db->get('homepage');
        return $query->row();
    }

    public function getForMenu(){
        $query = $this->db->get('pages');
        $result = $query->result();
        
        $coll = [];
        foreach ($result as $page){
                $coll[$page->id] = $page;
                $coll[$page->id]->child = [];
        }
        foreach ($result as $page){
                if($page->parent > 0){
                    if(isset($coll[$page->parent])){
                        $coll[$page->parent]->child[] = $page;
                        unset($coll[$page->id]);
                    }
                }
        }
        return $coll;
    }
    
    public function getParents(){
        
        $this->db->where('parent', 0);
        $query = $this->db->get('pages');
        
        return $query->result();
    }
    
    public function getForAdminMenu(){
        
        $query = $this->db->get('pages');
        
        return $query->result();
    }
}
