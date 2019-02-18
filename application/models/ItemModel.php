<?php

class ItemModel extends CI_Model{

    public function get(){
        if(!empty($this->input->get("search"))){
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
        }
        $query = $this->db->get("items");
        return $query->result();
    }

    public function insert()
    {    
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        return $this->db->insert('items', $data);
    }

    public function update($id) 
    {
        $data=array(
            'title' => $this->input->post('title'),
            'description'=> $this->input->post('description')
        );
        if($id==0){
            return $this->db->insert('items',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('items',$data);
        }        
    }

    public function find($id)
    {
        return $this->db->get_where('items', array('id' => $id))->row();
    }

    public function delete($id)
    {
        return $this->db->delete('items', array('id' => $id));
    }
}
?>
