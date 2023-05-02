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
                                        <h4 class="title"><a href="index.php">Dashboard</a> | Cat Questions </h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="float:right !important;">Add Question</button>
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="cat-questions">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Question Text</th>
                                    	<th>Question Type</th>
                                    	<th>Option Values</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(!empty($CatQuestions))
                                            {
                                                $i = 1;
                                                foreach($CatQuestions as $key => $value){ 
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->question_text; ?></td>
                                                <td><?php echo $value->question_type; ?></td>
                                                <td><?php echo $value->option_values; ?></td>
                                                <td>
                                                        <button class="btn btn-primary btn-sm editbtn mx-2" data-toggle="modal" data-target="#editModal" data-question='<?php echo json_encode($value); ?>' >Edit</button>
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
                <h4 class="modal-title">Add Questions</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="question_text">Question Text</label>
                            <textarea name="question_text" id="question_text" class="form-control" cols="30" rows="10" placeholder="Please write a question text."><?php echo $_POST['question_text'] ?? ''; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="question_type">Question_type</label>
                            <select name="question_type" class="form-control" name="question_type" id="question_type" required>
                                <option value="radio" <?php if(isset($_POST['question_type']) && $_POST['question_type'] == 'radio') { echo "selected"; } ?>>Radio</option>
                                <option value="selectbox" <?php if(isset($_POST['question_type']) && $_POST['question_type'] == 'selectbox') { echo "selected"; } ?>>Select Box</option>
                                <option value="textbox" <?php if(isset($_POST['question_type']) && $_POST['question_type'] == 'textbox') { echo "selected"; } ?>>Text Box</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="option_values">Option Values</label>
                            <textarea name="option_values" id="option_values" cols="30" rows="10" class="form-control" placeholder="Please write question type by using ',' e.g Yes, No"><?php echo $_POST['option_values'] ?? ''; ?></textarea>
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
        <form action="cat-questions/update" method="POST" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Questions</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="uquestion_text">Question Text</label>
                            <textarea name="question_text" id="uquestion_text" class="form-control" cols="30" rows="10" placeholder="Please write a question text."><?php echo $_POST['question_text'] ?? ''; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="uquestion_type">Question_type</label>
                            <select name="question_type" class="form-control" name="uquestion_type" id="uquestion_type" required>
                                <option value="radio" <?php if(isset($_POST['uquestion_type']) && $_POST['uquestion_type'] == 'radio') { echo "selected"; } ?>>Radio</option>
                                <option value="selectbox" <?php if(isset($_POST['uquestion_type']) && $_POST['uquestion_type'] == 'selectbox') { echo "selected"; } ?>>Select Box</option>
                                <option value="textbox" <?php if(isset($_POST['uquestion_type']) && $_POST['uquestion_type'] == 'textbox') { echo "selected"; } ?>>Text Box</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="uoption_values">Option Values</label>
                            <textarea name="option_values" id="uoption_values" cols="30" rows="10" class="form-control" placeholder="Please write question type by using ',' e.g Yes, No"><?php echo $_POST['option_values'] ?? ''; ?></textarea>
                        </div>
                    </div>

                </div>
                <input type="hidden" name="question_id" id="uquestion_id">
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
        <form action="cat-questions/delete" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Question</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this question ?</p>
                   <input type="hidden" name="dquestion_id" id="dquestion_id">
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
            $('#cat-questions').DataTable();

            // edit button click
            $(".editbtn").click(function(){
                var question_data = $(this).attr("data-question");
                var question_data_obj = $.parseJSON(question_data);
                $('#uquestion_type').val(question_data_obj.question_type);
                $('#uquestion_text').val(question_data_obj.question_text);
                $('#uoption_values').val(question_data_obj.option_values);
                $('#uquestion_id').val(question_data_obj.id);
            });
            $(".deletebtn").click(function(){
                var question_id = $(this).attr("data-id");
                $("#dquestion_id").val(question_id);
            });
    });

</script>