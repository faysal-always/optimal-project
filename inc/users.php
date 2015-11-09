<h2 class="sub-header">Users</h2>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Date Of birth</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = $db->query("SELECT * FROM `users`");
      while($user = $query->fetch_object()){
    ?>
    <tr>
      <td><?=$user->uid?></td>
      <td><?=$user->full_name?></td>
      <td><?=$user->email?></td>
      <td><?=$user->dob?></td>
      <td>
            <input type="checkbox" class="switch" id="status<?=$user->uid?>" <?=($user->status==1)?'checked':''?>>
      </td>
      <td><a href="javascript:void()" onclick="editUser(<?=$user->uid?>)" data-toggle="modal" data-target="#userEdit" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a></td>
      <td><a href="?page=users&amp;delete=<?=$user->uid?>" class="btn btn-danger" onclick="return confirm('Are you Sure?')"><i class=" glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="userEdit" tabindex="-1" role="dialog" aria-labelledby="userEditLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="userEditLabel">Edit - <span id="uname"></span></h4>
      </div>
      <div class="modal-body" id="userEditData">
        <i class="fa fa-spinner fa-pulse"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>