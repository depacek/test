<?php
    $title="create news";
     require_once"header.php"; 
      if (isset($_POST['btnsave'])) {
        $err=[];
            if(isset($_POST['title'])&&!empty($_POST['title'])&&trim($_POST['title'])!=''){
                $news->set('title',$_POST['title']);
            }else{
                $err['title']="Enter title";
            }

            $news->set('category_id',$_POST['category_id']); 
            $news->set('short_description',$_POST['short_description']);
            $news->set('description',$_POST['description']);
            $news->set('status',$_POST['status']);
            $news->set('breaking_key',$_POST['breaking_key']);
            $news->set('feature_key',$_POST['feature_key']);
            $news->set('created_date',date('Y-m-d H:i:s'));
            $news->set('created_by',$_SESSION['admin_username']);
           
            if (isset($_FILES['feature_image']['name']) && !empty($_FILES['feature_image']['name'])) {
                move_uploaded_file($_FILES['feature_image']['tmp_name'], 'images/'.$_FILES['feature_image']['name']);
                $news->set('feature_image',$_FILES['feature_image']['name']);           
            }
             $res=   $news->create();
     }
        $data=$category->list();
     ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create news</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> <?php echo 'News created with id='.$res; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error creating news</div>
                                         <?php } ?>
                                    <form role="form" action="" method="post" id="create_form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category ID</label>
                                            <select class="form-control" name="category_id">
                                                <option value="">Select Category</option>
                                                <?php foreach ($data as $d) { ?>
                                                <option value="<?php echo $d->id;?>"><?php echo $d->name;?></option>
                                            <?php }?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" id="title" required="" >
                                            <?php if(isset($err['title'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['title'];?></div>
                                    <?php   } ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea class="form-control" name="short_description"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Feature Image</label>
                                            <input type="file" name="feature_image" id=feature_image">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id=status" value="1">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="0" checked>De Active
                                                </label>
                                            </div>
                                            <div class="form-group">
                                            <label>Breaking Key</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="breaking_key" id="breaking_key" value="1">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="breaking_key" id="breaking_key" value="0" checked>De Active
                                                </label>
                                            </div>
                                            <div class="form-group">
                                            <label>Feature key</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="feature_key" id=feature_key" value="1">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="feature_key" id="feature_key" value="0" checked>De Active
                                                </label>
                                            </div>
                                        </div>
                                       
                                        <button type="submit" class="btn btn-info" name="btnsave">Save category</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   <?php require_once"footer.php"; ?>
   <script src="js/validation/dist/jquery.validate.min.js"></script>
   <script src="js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#create_form').validate();
        });
    </script>
