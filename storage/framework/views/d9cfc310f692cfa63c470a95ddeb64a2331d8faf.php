<?php $__env->startSection('content'); ?>


<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container">
          <img src="<?php echo e(url('themes/default/assets/images/logo.png')); ?>" alt="MDB CMS" height="70px" width="200px">
      </div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form role="form" method="POST" action="<?php echo e(url('/login')); ?>" id="loginForm">
         <?php echo e(csrf_field()); ?>

         <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            
            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required="required" autofocus placeholder="email address"/> 

        </div>
        <?php if($errors->has('email')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('email')); ?></strong>
        </span>
        <?php endif; ?>
        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='password' placeholder="password" required/>  
            <?php if($errors->has('password')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
            <?php endif; ?>   
        </div>
        <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" required="required"> I agree to the <a href="#">Terms and Conditions</a>
          </label>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-def btn-block">Login</button>
    </div>
    <div class="form-group text-center">
        <a href="<?php echo e(url('/password/reset')); ?>">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Support</a>
    </div>
</form>        
</div>  
</div>    
</div>
</div>




<!-- 
<script type="text/javascript">

    $(document).on('click','.btn-login',function(){
        $.ajax({
            type: 'post',
            url: 'login/authSucces',
            data: {


            },
            success:function(data){
                alert(data);
            },
            error:function(){
                alert('Errror!!');
            }
        });
    });

</script> -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>