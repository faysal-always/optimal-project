 	</div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-switch.min.js"></script>
    <script src="js/bootstrap-confirmation.js"></script>
	<script src="js/jx_compressed.js"></script>

    <script type="text/javascript">
   		$(".switch").bootstrapSwitch();
   		function editUser(uid){
        $('.alert').remove();
   			jx.load('ajax/users.php?action=getupdatemodal&userid='+uid,function(data){
				    $('#userEditData').html(data); // Do what you want with the 'data' variable.
			   });
   		}

      function updateUserData(){
        var userid = $('#userid').val();
        var uname = $('#uFullname').val();
        var uemail = $('#uEmail').val();
        var udob = $('#uDob').val();

        jx.load('ajax/users.php?action=updateUserdata&userid='+userid+'&uname='+uname+'&uemail='+uemail+'&udob='+udob,function(data){
          $('.alert').remove();
            if(data=='updated'){
              $('.close').click();
              $('#row'+userid+' .fname').html(uname);
              $('#row'+userid+' .email').html(uemail);
              $('#row'+userid+' .dob').html(udob);
              $('.table-responsive').prepend('<div class="alert alert-success" role="alert">Data Updated Successfully.</div>');
            }else{
              $('#userEditData').prepend('<div class="alert alert-danger" role="alert">Update Failed. Try Again.</div>')
            }
         });
      }

      function updateStatus(uid){
        jx.load('ajax/users.php?action=statusChange&userid='+uid,function(data){
           
         });
      }
    </script>
  </body>
</html>