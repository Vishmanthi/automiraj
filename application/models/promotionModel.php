<?php
    class promotionModel extends CI_Model{
        public function getPromotions($item,$brand,$promotion){
            $query = "INSERT INTO promotions (Item, Brand, Promotion) VALUES('$item','$brand','$promotion')";
            $query1 = $this->db->query($query);
        
        }

        public function getData(){
            $query="SELECT * FROM promotions";
            $query1=$this->db->query($query);
            $result=$query1->result();
            return $result;

        }
        public function deleteData($id){
            $query="DELETE FROM promotions WHERE Id='$id'";
            $this->db->query($query);
        }

    }
?>