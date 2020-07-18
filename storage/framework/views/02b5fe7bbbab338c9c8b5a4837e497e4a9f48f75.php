<div class="container">
	<article>
		<h2><?php echo e($post->title); ?></h2>

		<p>
			Posted by <?php echo e($post->author->name); ?> on <?php echo e($post->published_at); ?>

		</p>

		<div style="clear: both; padding-bottom: 10px; margin-left: auto; margin-right: auto; text-align: center; ">
			<img src="/upload/posts/<?php echo e($post->image); ?>" alt="<?php echo e($post->tile); ?>" width="100%"  height="100%" />
		</div>
		<?php echo $post->body; ?>

		
	</article>

	<article style="padding-top: 30px;">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<?php $__currentLoopData = $post->comments->where('approved', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<div class="media">
					<div class="media-left">
						<a href="#">
							<img class="media-object" src="<?php echo e(Gravatar::src($comment->email, 64)); ?>" alt="...">
						</a>
					</div>

					<div class="media-body">
						<h4 class="media-heading"><?php echo $comment->name; ?></h4>
						<?php echo $comment->present()->messageHtml; ?>

					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				
				
				<h3><?php echo e(trans('static.leave_comment')); ?></h3>

				<?php echo Form::open(['method'=>'post', 'route'=>'comments.store']); ?>

				
				<?php echo Form::hidden('post_id', $post->id); ?>


				<div class="row">
					<div class='col-sm-6'>
						<div class="form-group">
							<?php echo Form::text('name', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_name')]); ?>

						</div>
					</div class='col-sm-6'>	
					<div class='col-sm-6'>
						<?php echo Form::text('email', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_email')]); ?>

					</div class='col-sm-6'>
				</div>

				<div class="form-group">
					<?php echo Form::textarea('message', null, ['class'=>'form-control', 'placeholder'=>trans('comment.placeholder_message')]); ?>

				</div>
				
				<div class="pull-right">
					<?php echo Form::submit(trans('comment.save'), ['class'=>'btn btn-primary']); ?>

				</div>

				<?php echo Form::close(); ?>

				
				
			</div>
		</div>
	</article>
</div>