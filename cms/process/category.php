<?php
    require '../../config/init.php';
    $category = new Category();

    if(isset($_POST) && !empty($_POST)){
        
        
        $data = array(
            'title' => sanitize($_POST['title']),
            'summary' => sanitize($_POST['summary']),
            'status' => sanitize($_POST['status']),
            'added_by' => $_SESSION['user_id']
        );

        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $file_name = uploadSingleImage($_FILES['image'], 'category');
            if($file_name){
                $data['image'] = $file_name;
            }
        }

        // INSERT 
        $cat_id = $category->addData($data);
        if($cat_id){
            redirect('../category.php','success','Category added successfully.');
        } else {
            redirect('../category.php','error','Category could not be added at this moment.');
        }
    } else if(isset($_GET, $_GET['id']) && !empty($_GET['id'])){
        // DELETE
        $id = (int)$_GET['id'];
        if($id <=0){
            redirect('../category.php','error','Inavalid category Id.');
        }

        $category_info = $category->getCategoryById($id);
        if(!$category_info){
            redirect('../category.php','error','Category not found.');
        }
        $del = $category->deleteCategory($id);
        if($del){
            if($category_info[0]->image !=  null && file_exists(UPLOAD_DIR.'category/'.$category_info[0]->image)){
                unlink(UPLOAD_DIR.'category/'.$category_info[0]->image);
            }

            redirect('../category.php','success','Category deleted successfully.');
        } else {
            redirect('../category.php','error','Category could not be deleted at this moment.');
        }

    } 
    else {
        redirect('../category.php','error','Unauthorized access.');
    }