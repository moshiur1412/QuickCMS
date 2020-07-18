<?php $__env->startSection('title', trans('static.dashboard')); ?>

<?php $__env->startSection('content'); ?>

<div class="daashboard-status row">

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6">
						<h3 style="float: left;" class="counter font-bold font-size-38"><?php echo e(number_format($percentComments,2)); ?></h3><h3 style="float: right;margin-right: -20px;">%</h3> 
					</div>
					<div class="col-xs-6">
						<p class="font-size-38"><span class="fa fa-thumbs-up fa-4x icon-primary icon-people pull-right"></span></p>
					</div>
				</div>
				<p>Comments</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo e(number_format($percentComments,2)); ?>" style="width: <?php echo e(number_format($percentComments,2)); ?>%;" aria-valuenow="<?php echo e(number_format($percentComments,2)); ?>"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-green" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!--/widget-->
	</div>

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="counter font-bold font-size-38"><?php echo e($countPages); ?></h3>
					</div>
					<div class="col-xs-6">
						<p class="font-size-38"><span class="fa fa-files-o fa-4x icon-accent icon-user-follow pull-right"></span></p>
					</div>
				</div>
				<p>Total Pages</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-green-sea" role="progressbar" data-transitiongoal="<?php echo e($countPages); ?>" style="width: <?php echo e($countPages); ?>%;" aria-valuenow="<?php echo e($countPages); ?>"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div><!--/widget-content--> 
		</div><!--/widget-->
	</div>

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="counter font-bold font-size-38"><?php echo e($countPosts); ?></h3>
					</div>
					<div class="col-xs-6">
						<p class="font-size-38"><span class="fa fa-chain-broken fa-4x icon-book-open pull-right"></span></p>
					</div>
				</div>
				<p>Total Posts</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="<?php echo e($countPosts); ?>" style="width: <?php echo e($countPosts); ?>%;" aria-valuenow="<?php echo e($countPosts); ?>"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div><!--/widget-content--> 
		</div><!--/widget-->
	</div>

	<div class="col-md-3">
		<div class="widget">
			<div class="widget-content bg-white">
				<div class="row">
					<div class="col-xs-6"> <h3 class="counter font-bold font-size-38"><?php echo e($countUsers); ?></h3> </div>
					<div class="col-xs-6"> <p class="font-size-38"><span class="fa fa-users fa-4x pull-right"></span></p> </div>
				</div>
				<p>Total Users</p>
				<div class="progress progress-xs">
					<div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="<?php echo e($countUsers); ?>" style="width: <?php echo e($countUsers); ?>%;" aria-valuenow="<?php echo e($countUsers); ?>"></div>
				</div>
				<a href="#" class="padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
</div><!-- \ End Page Status row -->



<div class="row">
	<div class="col-md-6">
		<div class="widget">
			<div class="widget-head">
				<h2 class="pull-left dash-header"><i class="fa fa-users" aria-hidden="true"></i> Last Login Users</h2>
			</div>
			<ul class="list-group">
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li class="list-group-item" style="margin:10px;">
					<img src="<?php echo e(URL::to('/')); ?>/upload/avatars/<?php echo e($user->avatar); ?>" style="width: 50px; height: 50px; float: left; border-radius:50%; margin-right: 25px">
					<h4><?php echo e($user->name); ?> - (<?php echo e($user->role); ?>)</h4>
					<p>Last Login <?php echo e($user->present()->lastLoginDifference); ?></p>
				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</ul>
		</div>
	</div> <!--\* End last login Users-->


	<div class="col-md-6">
		<div class="widget">
			<div class="widget-head">
				<h2 class="pull-left dash-header"><i class="fa fa-commenting" aria-hidden="true"></i> Recent Comments</h2>
			</div>
			<div class="widget-content" style="display: block;">
				<ul class="chats">
					<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<?php if($k % 2 == 0): ?>
					<li class="by-me">
						<div class="avatar pull-left"> <img src="<?php echo e(URL::to('/')); ?>/upload/avatars/default.jpg" style="width: 44px; height: 44px;"> </div>
						<div class="chat-content">
							<div class="chat-meta"><?php echo e($comment->email); ?> <span class="pull-right"><?php echo e($comment->created_at->diffForHumans()); ?></span></div>
							<?php echo e($comment->message); ?>

						</div>
					</li> 
					<?php else: ?>
					<li class="by-other">
						<div class="avatar pull-right"> <img src="<?php echo e(URL::to('/')); ?>/upload/avatars/default.jpg" style="width: 44px; height: 44px;"> </div>
						<div class="chat-content">
							<div class="chat-meta"><?php echo e($comment->email); ?> <span class="pull-right"><?php echo e($comment->created_at->diffForHumans()); ?></span></div>
							<?php echo e(str_limit($comment->message, 150, "...")); ?> 
						</div>
					</li>  
					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="widget-head" style=" float: left; width: 100%; ">
			<h2 class="pull-left dash-header"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Latest Posts</h2>
		</div>
		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<div class="col-lg-4">
			<h3> <a href="<?php echo e(route('single-post', [$post->id, $post->slug])); ?>"><?php echo e(str_limit($post->title, 25, "...")); ?> </a></h3>
			<h4>  Posted by (<?php echo e($post->author->name); ?>) </h4>
			<h5> Published at - <?php echo e($post->published_at->toDayDateTimeString()); ?> <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a></h5>
			<hr>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</div>
</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>