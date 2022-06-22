<?php
include 'components/head.php'
?>

				<section class="section">
					<div class="section-header">
						<h1>Daftar Rumah Sakit <small>Web-Service</small></h1>
					</div>
					<div class="section-table">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form">
											<div class="form-group">
												<label>Nama Rumah Sakit</label>
												<input type="text" class="form-control" id="name" name="name" value="">
											</div>
											<div class="form-group">
												<label>Alamat Rumah Sakit</label>
												<input type="text" class="form-control" id="address" name="address" value="">
											</div>
											<div class="form-group">
												<button class="btn btn-primary" type="button" id="addNew">Save</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<h5>Daftar Rumah Sakit (Ubuntu)</h5>
									<table class="table table-striped">
										<tr>
											<th style="width: 10%">Id</th>
											<th>Name</th>
											<th>Address</th>
											<th style="width: 20%">Actions</th>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>





			</div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
				</div>
				<div class="footer-right">
					2.3.0
				</div>
			</footer>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="assets/js/stisla.js"></script>


	<script src="../assets/js/scripts.js"></script>
	<script src="../assets/js/custom.js"></script>



	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON('http://192.168.56.69/api/read.php', function(json) {
				var tr = [];
				for (var i = 0; i < json.length; i++) {
					tr.push('<tr>');
					tr.push('<td>' + json[i].id + '</td>');
					tr.push('<td>' + json[i].name + '</td>');
					tr.push('<td>' + json[i].address + '</td>');
					tr.push('<td><a class="btn btn-info edit">Edit</a> &nbsp;&nbsp; <a class="btn btn-danger delete" id=' + json[i].id + '>Delete</a></td>');
					tr.push('</tr>');
				}
				$('table').append($(tr.join('')));
			});

			$(document).delegate('#addNew', 'click', function(event) {
				event.preventDefault();

				var name = $('#name').val();
				var address = $('#address').val();

				if (name == null || name == "") {
					alert("Pasien Name is required");
					return;
				}
				if (address == null || address == "") {
					alert("Pasien Address is required");
					return;
				}
				var contentType = "application/x-www-form-urlencoded; charset=utf-8";
				$.ajax({
					type: "POST",
					url: "http://192.168.56.69/api/create.php",
					data: JSON.stringify({
						'name': name,
						'address': address
					}),
					cache: false,
					contentType: contentType,
					success: function(result) {
						alert('Pasien Data added successfully');
						location.reload(true);
					},
					error: function(err) {
						location.reload(true);
						//						alert(err);
					}
				});
			});

			$(document).delegate('.delete', 'click', function() {
				if (confirm('Do you really want to delete record?')) {
					var id = $(this).attr('id');
					var parent = $(this).parent().parent();
					$.ajax({
						type: "DELETE",
						url: "http://192.168.56.69/api/delete.php?id=" + id,
						cache: false,
						success: function() {
							parent.fadeOut('slow', function() {
								$(this).remove();
							});
							location.reload(false)
						},
						error: function() {
							alert('Error deleting record');
						}
					});
				}
			});

			$(document).delegate('.edit', 'click', function() {
				var parent = $(this).parent().parent();

				var id = parent.children("td:nth-child(1)");
				var name = parent.children("td:nth-child(2)");
				var address = parent.children("td:nth-child(3)");
				var buttons = parent.children("td:nth-child(4)");

				name.html("<input type='text' id='txtName' class='form-control' value='" + name.html() + "'/>");
				address.html("<input type='text' id='txtAddress' class='form-control' value='" + address.html() + "'/>");
				buttons.html("<a class='btn btn-info' id='save'>Save</a");
			});

			$(document).delegate('#save', 'click', function() {
				var parent = $(this).parent().parent();

				var id = parent.children("td:nth-child(1)");
				var name = parent.children("td:nth-child(2)");
				var address = parent.children("td:nth-child(3)");
				var buttons = parent.children("td:nth-child(4)");

				$.ajax({
					type: "PUT",
					url: "http://192.168.56.69/api/update.php",
					data: JSON.stringify({
						'id': id.html(),
						'name': name.children("input[type=text]").val(),
						'address': address.children("input[type=text]").val()
					}),
					cache: false,
					success: function() {
						name.html(name.children("input[type=text]").val());
						address.html(address.children("input[type=text]").val());
						buttons.html("<a class='btn btn-info edit' id='" + id.html() + "'>Edit</a>&nbsp;&nbsp;<a class='btn btn-danger delete' id='" + id.html() + "'>Delete</a>");
					},
					error: function() {
						alert('Error updating record');
					}
				});
			});

		});
	</script>
</body>

</html>