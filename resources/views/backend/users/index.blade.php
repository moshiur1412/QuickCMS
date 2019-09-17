@section('title', trans('static.user'))

@extends('layouts.backend')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>{{ trans('user.user_managment_process') }}</h1>
	</div>	
</div>
<div class="form-group row add">
	<div class="col-md-3">
		<input type="text" class="form-control" name="username" required placeholder="username">
		<p class="error error-name text-center alert alert-danger hidden"></p>		
	</div>
	<div class="col-md-4">
		<input type="text" class="form-control" name="email" required placeholder="email">
		<p class="error error-email text-center alert alert-danger hidden"></p>		
	</div>
	<div class="col-md-3">
		<select class="form-control" name="role" id="role">
			<option value="super admin">Super Admin</option>
			<option value="admin" selected="selected">Admin</option>
			<option value="user">User</option>
		</select>	
	</div>
	<div class="col-md-2">
		<button class="btn btn-warning" type="submit" id="add">
			<span class="glyphicon glyphicon-plus"></span> {{ trans('user.add_new_user') }}
		</button>
	</div>	
</div>

<div class="row">
	<div class="table-responsive">
		<table class="table table-borderless" id="table">
			<tr>
				<th>{{ trans('user.table_no') }}</th>
				<th>{{ trans('user.table_name') }} </th>
				<th>{{ trans('user.table_email') }} </th>
				<th>{{ trans('user.table_last_login') }} </th>
				<th>{{ trans('user.table_role') }} </th>
				<th>{{ trans('user.table_action') }} </th>
			</tr>

			{{ csrf_field() }}

			<?php $no=1; ?>

			@foreach($users as $user)
			<tr class="user{{$user->id}}">
				<td> {{$no++}} </td>
				<td> {{$user->name}} </td> 
				<td> {{$user->email}} </td>
				<td> {{$user->last_login_at}}  </td> 
				<td> {{$user->role}} </td>
				<td> 
					<button class="edit-modal btn btn-primary" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-logat="{{$user->last_login_at}}" data-role="{{$user->role}}"><span class="glyphicon glyphicon-edit"></span> {{ trans('user.edit') }}</button>
					@if(Auth::check() && Auth::user()->id != $user->id)
					<button class="delete-modal btn btn-danger" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-logat="{{$user->last_login_at}}" data-role="{{$user->role}}"> <span class="glyphicon glyphicon-trash"></span> {{ trans('user.delete') }}</button>
					@else
					<button class="btn btn-danger" disabled="disabled"> <span class="glyphicon glyphicon-trash"></span> {{ trans('user.delete') }}</button>
					@endif
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
{{ $users->links('vendor.pagination.default') }}

<!-- JavaScript Dialog Box -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form role="form" class="form-horizontal">
					<div class="form-group">
						<label for="id" class="control-label col-sm-2">ID</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="fid" disabled="disabled">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="control-label col-sm-2">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="n" required="required">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-sm-2">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="e" required="email">
						</div>
					</div>
					<div class="form-group" style="display: none;align-items: ">
						<label for="a" class="control-label col-sm-2">Last Login</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="a">
						</div>
					</div>
					<div class="form-group">
						<label for="role" class="control-label col-sm-2">Role</label>
						<div class="col-sm-10">
							<!-- <input type="text" class="form-control" id="r" > -->
							<select class="form-control" name="role" id="r">
								<option value="super admin" <?php if (("#r")=='super admin'){echo "selected";}?>>Super Admin</option>
								<option value="admin" <?php if (("#r")=='admin'){echo "selected";}?>>Admin</option>
								<option value="user" <?php if (("#r")=='user'){echo "selected";}?>>User</option>
							</select>	
						</div>
					</div>
				</form>


				<div class="deleteContent">
					Are you sure you want to delete <span class="user"></span> ? <span class="hidden id"></span>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn actionBtn" data-dismiss="modal">
						<span id="footer_action_button" class="glyphicon"></span>
					</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<span class="glyphicon glyphicon-remove"></span> Close
					</button>
				</div>
			</div>	
		</div>
	</div>
</div>

<script type="text/javascript">

					// add users -->
					$("#add").click(function(){

						$.ajax({
							type: 'post',
							url: 'users/addUser',
							data: {
								'_token': $('input[name=_token]').val(),
								'name' : $('input[name=username]').val(),
								'email' : $('input[name=email]').val(),
								'role' : $('select[name=role]').val()

							},
							success:function(data){
								
								if(data.errors){
									if((data.errors.name) && (data.errors.email) ){
										$('.error').removeClass('hidden');
										$('.error-name').text(data.errors.name);
										$('.error-email').text(data.errors.email);

									}else if((data.errors.name)){
										$('.error-email').addClass('hidden');
										$('.error-name').removeClass('hidden');
										$('.error-name').text(data.errors.name);
									}else if((data.errors.email)){
										$('.error-name').addClass('hidden');
										$('.error-email').removeClass('hidden');
										$('.error-email').text(data.errors.email);
									}	
								}else{

									$('.error').remove();

									window.location.href = "users";
								}
								

							},
							error:function(){
								alert('Sorry, Please check duplicated data !!!');

							}
						});
						$('#name').val(' ');
						$('#email').val(' ');
						

					});
				// Edit Data (Modal and function edit data)
				$(document).on('click','.edit-modal', function(){

					
					$('#footer_action_button').text(" Update");
					$('#footer_action_button').addClass('glyphicon-check');
					$('#footer_action_button').removeClass('glyphicon-trash');

					$('.actionBtn').addClass('btn-success');
					$('.actionBtn').removeClass('btn-danger');
					$('.actionBtn').addClass('edit');

					$('.modal-title').text('Edit User');
					$('.deleteContent').hide();
					$('.form-horizontal').show();

					$('#fid').val($(this).data('id'));
					$('#n').val($(this).data('name'));
					$('#e').val($(this).data('email'));
					
					$('#r').val($(this).data('role'));

					$('#myModal').modal('show');

				});

				$('.modal-footer').on('click','.edit',function(){

					$.ajax({
						type: 'post',
						url: 'users/editUser',
						data: {
							'_token' : $('input[name=_token]').val(),
							'id' : $("#fid").val(),
							'name' : $("#n").val(),
							'email' : $("#e").val(),
							'role' : $("#r").val()
						},	
						success: function(data){
							
							// $('.user'+data.id).replaceWith("<tr class='user"+data.id+"'> <td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.email+"</td><td>"+data.last_login_at+"</td><td>"+data.role+"</td><td><button class='edit-modal btn btn-info' data-id='"+data.id+"' data-user='"+data.name+"' data-email='" +data.email+"' data-logat='"+data.last_login_at+"' data-role='"+data.role+"'><span class='glyphicon glyphicon-edit'></span> Edit </button> <button class='delete-modal btn btn-danger' data-id='"+data.id+"' data-user='"+data.name +"' data-email='"+data.email +"' data-logat='"+data.last_login_at+"' data-role='"+data.role+"'><span class='glyphicon glyphicon-trash'></span> Delete </button> </td></tr>");
							window.location.href = "users";


						},
						error: function(){
							alert("Sorry, Something wrong...");
							console.log(response);


						}

					});
				});




				
				$(document).on('click', '.delete-modal',function(){
					$('#footer_action_button').text(" Delete");
					$('#footer_action_button').removeClass('glyphicon-check');
					$('#footer_action_button').addClass('glyphicon-trash');

					$('.actionBtn').removeClass('btn-success');
					$('.actionBtn').addClass('btn-danger');
					$('.actionBtn').addClass('delete')

					$('.modal-title').text('Delele User');

					$('.id').text($(this).data('id'));
					$('.deleteContent').show();
					$('.form-horizontal').hide();

					$('.user').html($(this).data('name'));
					$('#myModal').modal('show');

				});

				$('.modal-footer').on('click', '.delete', function(){
					$.ajax({

						type:'post',
						url:'users/deleteUser',
						data:{
							'_token':$('input[name=_token').val(),
							'id':$('.id').text()
						},
						success:function(data){
							$('.user' +$('.id').text()).remove();
						}
					});
				});

				

			</script>
			
			@endsection