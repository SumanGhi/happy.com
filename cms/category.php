<?php include 'inc/header.php'; 

require 'inc/checklogin.php'; 
$category = new Category();

?>

<div id="wrapper">

    <?php include 'inc/menu.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                       
                    </h1>

                    <?php flash(); ?>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <th>S.N</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Delete</th>
                            
                        </thead>
                        <tbody>
                            <?php
                                $data = $category->getAllCategories();
                                if($data){
                                    foreach($data as $key=>$cat_data){
                                    ?>
                                    <tr>
                                        <td><?php echo $key+1;?></td>
                                        <td><?php echo $cat_data->username;?></td>
                                        <td><?php echo ucfirst($cat_data->email);?></td>
                                        
                                        <td>
                                         

                                            <a href="process/category.php?id=<?php echo $cat_data->id; ?>" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger" style="border-radius: 50%">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include 'inc/footer.php'; ?>