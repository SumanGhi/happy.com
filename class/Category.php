<?php

    class Category extends Database{
        public function __construct()
        {
            parent::__construct();
            $this->table('users');
        }

       
        public function getAllCategories(){
            return $this->select();
        }

        public function getCategoryById($id){
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );
            return $this->select($args);
        }

        public function deleteCategory($cat_id){
            // DELETE FROM categories WHERE id = $cat_id
            $args = array(
                'where' => array(
                    'id' => $cat_id
                )
            );
            return $this->delete($args);
        }
    }