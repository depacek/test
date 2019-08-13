
    <?php
    $title="list category";
     require_once"header.php";
     $comments=$comment->list();
     // print_r($comments);
      ?>
<link rel="stylesheet" type="text/css" href="dist/css/jquery.dataTables.min.css
">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">list Category</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" id="category_table">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>News ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Comment</th>
                                                <th>Commented Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($comments as $c) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                
                                                <td><?php echo $c->news_id;?></td>
                                                <td><?php echo $c->name;?></td>
                                                <td><?php echo $c->email;?></td>
                                                <td><?php echo $c->comment;?></td>
                                                <td><?php echo $c->commented_date;?></td>
                                                <td><?php if ($c->status==1) {?>
                                                   <span class="label label-success">Active</span>
                                               <?php } else{?>
                                                    <span class="label label-danger">De Active</span>
                                               <?php } ?></td>

                                                
                                                
                                                <td>
                                                    <a href="delete_comment.php?id=<?php echo $c->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>

                                                    <?php if ($c->status==1) {?>
                                                   <a href="edit_comment.php?id=<?php echo $c->id; ?>&&status=0" class="label label-danger" title="deactivate">Deactivated</a>
                                               <?php } else{?>
                                                   <a href="edit_comment.php?id=<?php echo $c->id; ?>&&status=1" class="label label-success" title="activate">Activated</a>
                                               <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                        
                                    </table>
                                    
                                   
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
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   <?php require_once"footer.php"; ?>
   <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
       $(document).ready(function() {
    $('#category_table').DataTable();
} );
   </script>
