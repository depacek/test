 <?php
    $title="Create Advertisement";
     require_once"header.php";

     if (isset($_POST['btnsave'])) {
        $err=[];
            if(isset($_POST['title'])&&!empty($_POST['title'])&&trim($_POST['title'])!=''){
                $adds->set('title',$_POST['title']);
            }else{
                $err['title']="Enter title";
            }
            if(isset($_POST['rank'])&&!empty($_POST['rank'])&&trim($_POST['rank'])!=''){
                $adds->set('rank',$_POST['rank']);
            }else{
                $err['rank']="Enter rank";
            }
            
            $adds->set('link',$_POST['link']);
            $adds->set('status',$_POST['status']);
            $adds->set('created_date',date('Y-m-d H:i:s'));
            $adds->set('created_by',$_SESSION['admin_username']);
             if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
                $adds->set('image',$_FILES['image']['name']);           
            }
            $res=   $adds->create();
     }
      ?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create Advetisement</h1>
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
                                 <div class="alert alert-success"> <?php echo 'Advetisement created with id='.$res; ?></div>
                                         <?php   }else if (isset($res) && $res==false) {
                                             ?>
                                                 <div class="alert alert-danger"> Error creating Advertisement</div>
                                         <?php } ?>
                                    <form role="form" action="" method="post" id="create_adds" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" id="title" required="" >
                                            <?php if(isset($err['title'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['title'];?></div>
                                    <?php   } ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Link</label>
                                            <input class="form-control" name="link" id="link" >
                                        </div>
                                         <div class="form-group">
                                            <label>Rank</label>
                                            <input class="form-control" type="number" min="1" name="rank" id="rank" required="" >
                                            <?php if(isset($err['rank'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['rank'];?></div>
                                    <?php   } ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" id=image">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#create_adds').validate();
        });
    </script>