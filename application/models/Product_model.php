<?php 
class Product_model extends CI_Model{
	/*
	 * Get All Products
	 */
	 public function get_products(){
		 $this->db->select('*');
		 $this->db->from('products');
		 $query = $this->db->get();
		 return $query->result();
	 }
	 
	 //Get Single Product
	 public function get_product_details($id){
		 $this->db->select('*');
		 $this->db->from('products');
		 $this->db->where('id', $id);
		 $query = $this->db->get();
		 return $query->row();
	 }
	 
	 /*
	 *	Get categories
	 */
	 
	  public function get_categories(){
		 $this->db->select('*');
		 $this->db->from('categories');
		 $query = $this->db->get();
		 return $query->result();
	 }
	 
	 public function get_popular(){
		 $this->db->select('P.*, COUNT(O.product_id) as total');
		 $this->db->from('orders as O');
		 $this->db->join('products as P', 'O.product_id = P.id', 'INNER');
		 $this->db->group_by('O.product_id');
		 $this->db->order_by('total', 'desc');
		 $query = $this->db->get();
		 return $query->result();
		 
	 }
}