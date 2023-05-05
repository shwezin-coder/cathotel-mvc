<?php 
    include_once('../views/components/admin/header.php');
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="title"><a href="index.php">Dashboard</a> | <a href="rooms">Room List </a> | Feature Images</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="float:right !important;">Add Image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="feature-image-list">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Image</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $target_dir = ROOT_DIRECTORY ."public/storage/featureimages/";
                                            if(!empty($FeatureImages))
                                            {
                                                $i=1;
                                                foreach ($FeatureImages as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img width="100px" height="50px" src="<?php echo $target_dir.$value->image; ?>" alt="" srcset=""></td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm editbtn mx-2" data-toggle="modal" data-target="#editModal" data-id="<?php echo $value->id;?>" data-image="<?php echo $value->image;?>" >Edit</button>
                                                    <button class="btn btn-danger btn-sm deletebtn mx-2" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $value->id;?>" data-image="<?php echo $value->image;?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                                $i++;
                                                }                                          
                                                
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php 
    include_once('../views/components/admin/footer.php');
?>
<!-- Add Modal -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <form action="featureimages?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                        <input type="hidden" name="room_id" value="<?php echo $_GET['id']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnSubmit">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
      </form>
    </div>
</div>
<!-- Edit Image Modal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
        <form action="featureimages/update?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="uimage">Image</label>
                            <input type="file" class="form-control" name="image" id="uimage" required>
                        </div>
                    </div>
                </div>
                 <input type="hidden" name="ufeatureimage_id" id="ufeatureimage_id">
                 <input type="hidden" name="old_image" id="old_image">
                 <input type="hidden" name="uroom_id" value="<?php echo $_GET['id']; ?>">                         
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnUpdateImg">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
      </form>
    </div>
</div>
  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <form action="featureimages/delete?id=<?php echo $_GET['id']; ?>" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Image</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this image ?</p>
                   <input type="hidden" name="dfeatureimage_id" id="dfeature_image_id">
                   <input type="hidden" name="dimage" id="dimage">
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnDelete">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
      </form>
    </div>
  </div>
<script>
        $(document).ready( function () {

            // datatable
            $('#feature-image-list').DataTable();

            // edit button click
            $(".editbtn").click(function(){
                var feature_image_id = $(this).attr("data-id");
                var image = $(this).attr("data-image");
                $('#ufeatureimage_id').val(feature_image_id);
                $('#old_image').val(image);
            });
            $(".deletebtn").click(function(){
                var feature_image_id = $(this).attr("data-id");
                var dimage = $(this).attr("data-image");
                $("#dfeature_image_id").val(feature_image_id);
                $("#dimage").val(dimage);
            });
    });

</script>
