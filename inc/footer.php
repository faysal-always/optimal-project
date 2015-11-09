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
   			console.log('sdfsdf');
   			jx.load('ajax/users.php?userid='+uid,function(data){
				    $('#userEditData').html(data); // Do what you want with the 'data' variable.
			   });
   		}
    </script>
  </body>
</html>