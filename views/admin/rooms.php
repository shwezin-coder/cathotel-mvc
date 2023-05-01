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
                                        <h4 class="title"><a href="index.php">Dashboard</a> | Room List </h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="float:right !important;">Add Room</button>
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="room-list">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Room Type</th>
                                    	<th>Image</th>
                                    	<th>Total Rooms</th>
                                    	<th style="width:40%;">Specification</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $target_dir = ROOT_DIRECTORY ."public/storage/rooms/";
                                            if(!empty($Rooms))
                                            {
                                                $i = 1;
                                                foreach ($Rooms as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->room_type; ?></td>
                                                <td><img width="100px" height="50px" src="<?php echo $target_dir.$value->image; ?>" alt="" srcset=""></td>
                                                <td><?php echo $value->noofrooms; ?></td>
                                                <td style="width:40%;"><p style="white-space:wrap;"><?php echo $value->specification; ?></p></td>
                                                <td>$ <?php echo $value->price; ?></td>
                                                <td style="width:30% !important;">
                                                        <button class="btn btn-primary uploadbtn btn-sm" data-toggle="modal" data-target="#updateimageModal" data-id="<?php echo $value->id; ?>" data-image="<?php echo $value->image; ?>" style="margin-right:3px !important;">Update Image</button>
                                                        <a href="featureimage-list.php?id=<?php echo $value->id; ?>" class="btn btn-primary btn-sm">Feature Images</a>
                                                        <button class="btn btn-primary btn-sm editbtn mx-2" data-toggle="modal" data-target="#editModal" data-room='<?php echo json_encode($value); ?>' >Edit</button>
                                                        <button class="btn btn-danger btn-sm deletebtn mx-2" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $value->id; ?>">Delete</button>
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
        </div>
<?php 
    include_once('../views/components/admin/footer.php');
?>
<!-- Add Modal -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Rooms</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="room_type">Room Type</label>
                            <input type="text" class="form-control" name="room_type" id="room_type" placeholder="Room Type" value="<?php echo $_POST['room_type'] ?? ''; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="noofrooms">Noofrooms</label>
                            <input type="number" name="noofrooms" class="form-control" min=1 id="noofrooms" placeholder="No of Rooms" value="<?php echo $_POST['noofrooms'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="specification">Specification</label>
                            <textarea name="specification" id="specification" class="form-control"><?php echo $_POST['specification'] ?? ''; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price" min=30 placeholder="Price" value="<?php echo $_POST['price'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
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
<!-- Upload Image Modal -->
<div class="modal fade" id="updateimageModal" role="dialog">
    <div class="modal-dialog">
        <form action="rooms/update-image" method="POST" enctype="multipart/form-data">
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
                 <input type="hidden" name="iroom_id" id="iroom_id">
                 <input type="hidden" name="old_image" id="old_image">

                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnUpdateImg">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
      </form>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
        <form action="rooms/update" method="POST" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Rooms</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="uroom_type">Room Type</label>
                            <input type="text" class="form-control" name="room_type" id="uroom_type" placeholder="Room Type" value="<?php echo $_POST['uroom_type'] ?? ''; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="unoofrooms">Noofrooms</label>
                            <input type="number" name="noofrooms" class="form-control" id="unoofrooms" placeholder="No of Rooms" min=1 value="<?php echo $_POST['unoofrooms'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="uspecification">Specification</label>
                            <textarea name="specification" id="uspecification" class="form-control"><?php echo $_POST['uspecification'] ?? ''; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="uprice">Price</label>
                            <input type="number" name="price" class="form-control" id="uprice" placeholder="Price" min=30 value="<?php echo $_POST['uprice'] ?? ''; ?>" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="uroom_id" id="uroom_id">
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnUpdate">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
      </form>
    </div>
</div>
  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <form action="rooms/delete" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Room</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this account ?</p>
                   <input type="hidden" name="droom_id" id="droom_id">
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
            $('#room-list').DataTable();

            // edit button click
            $(".editbtn").click(function(){
                var room_data = $(this).attr("data-room");
                var room_data_obj = $.parseJSON(room_data);
                $('#uroom_type').val(room_data_obj.room_type);
                $('#unoofrooms').val(room_data_obj.noofrooms);
                $('#uspecification').val(room_data_obj.specification);
                $('#uprice').val(room_data_obj.price);
                $('#uroom_id').val(room_data_obj.id);
            });
            $(".deletebtn").click(function(){
                var room_id = $(this).attr("data-id");
                $("#droom_id").val(room_id);
            });
            $(".uploadbtn").click(function(){
                var room_id = $(this).attr("data-id");
                var old_image = $(this).attr("data-image");
                $("#iroom_id").val(room_id);
                $('#old_image').val(old_image);
            });
    });

</script>