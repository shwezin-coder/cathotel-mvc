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
                                        <h4 class="title"><a href="index.php">Dashboard</a> | User List</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="float:right !important;">Add User</button>
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="user-list">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Role</th>
                                    	<th>Email</th>
                                    	<th>Phone Number</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(!empty($Users))
                                            {
                                                $i = 1;
                                                foreach ($Users as $key => $value)
                                                { 
                                                    switch ($value->role) {
                                                        case 1:
                                                          $role_name = "Cat Owner";
                                                          break;
                                                        case 2:
                                                          $role_name = "Staff";
                                                          break;
                                                      }
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $role_name; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->phone_number; ?></td>
                                                <td>
                                                    <button class="btn btn-primary editbtn" data-toggle="modal" data-target="#editModal" data-user='<?php echo json_encode($value); ?>'>Edit</button>
                                                    <button class="btn btn-danger deletebtn" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $value->id; ?>">Delete</button>
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
        <form action="user-list.php" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Users</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="User Name" value="<?php echo $_POST['name'] ?? ''; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">User Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $_POST['email'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="1" <?php if((isset($_POST['role'])) && ($_POST['role'] == 1)){ echo 'selected'; } ?>>Cat Owner</option>
                                <option value="2" <?php if((isset($_POST['role'])) && ($_POST['role'] == 2)){ echo 'selected'; } ?>>Staff</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="<?php echo $_POST['phone_number'] ?? ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $_POST['password'] ?? ''; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="confirm_password">Confrim Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" value="<?php echo $_POST['confirm_password'] ?? ''; ?>" required>
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
<!-- Edit Modal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
        <form action="user-list.php" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="uname">User Name</label>
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="User Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="uemail">User Email</label>
                            <input type="email" name="email" class="form-control" id="uemail" placeholder="Email" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="urole">Role</label>
                            <select name="urole" id="urole" class="form-control">
                                <option value="1">Cat Owner</option>
                                <option value="2">Staff</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="uphone_number">Phone Number</label>
                            <input type="text" class="form-control" name="uphone_number" id="uphone_number" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <input type="hidden" name="uuser_id" id="uuser_id">
                </div>
                
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
        <form action="user-list.php" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete User</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this account ?</p>
                   <input type="hidden" name="duser_id" id="duser_id">
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
            $('#user-list').DataTable();

            // edit button click
            $(".editbtn").click(function(){
                var user_data = $(this).attr("data-user");
                var user_data_obj = $.parseJSON(user_data);
                $('#uname').val(user_data_obj.name);
                $('#uemail').val(user_data_obj.email);
                $('#urole').val(user_data_obj.role);
                $('#uphone_number').val(user_data_obj.phone_number);
                $('#uuser_id').val(user_data_obj.id);
            });
            $(".deletebtn").click(function(){
                var user_id = $(this).attr("data-id");
                $("#duser_id").val(user_id);
            });
    });

</script>