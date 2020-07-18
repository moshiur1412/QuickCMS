<?php $__env->startSection('title', trans('static.editprofile')); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo e(trans('user.my_profile')); ?></div>
            <div class="panel-body">



               <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('users/updateProfile')); ?>">
                  <?php echo csrf_field(); ?>


                  <div class="form-group">
                      <div class="col-md-4">
                       <img src="<?php echo e(URL::to('/')); ?>/upload/avatars/<?php echo e($user->avatar); ?>" style="width: 150px; height: 150px; float: left; border-radius:50%; margin-right: 25px" >
                   </div>
                   <div class="col-md-6">
                       <h2><?php echo e($user->name); ?>'s Profile </h2>
                       <label class=" control-label"> Update Profile Image</label>
                       <input type="file" name="avatar">
                   </div>
               </div>

               <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="<?php echo e($errors->has('name') ? '' : $user->name); ?>" >

                    <?php if($errors->has('name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                    <?php endif; ?>


                </div>


            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                    <input type="email" disabled class="form-control" name="email" value="<?php echo e($user->email); ?>" >


                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">


                    <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                    <?php endif; ?>

                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                <label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">

                    <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                    <?php endif; ?>

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Update
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>