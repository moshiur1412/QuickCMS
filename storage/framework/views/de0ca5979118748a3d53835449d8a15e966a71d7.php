<?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li class="<?php echo e(Request::is($page->present()->uriWildCard) ? 'active' : ''); ?> <?php echo e(count($page->children) ? ($page->isChild() ? 'dropdown-submenu' : 'dropdown') : ''); ?>">
       
        <a href="<?php echo e(url($page->uri)); ?>">
            
            <?php echo e($page->title); ?>


            <?php if(count($page->children)): ?>
                <span class="caret <?php echo e($page->isChild() ? 'right' : ''); ?>"></span>
            <?php endif; ?>

        </a>

        <?php if(count($page->children)): ?>
            <ul class="dropdown-menu">
                <?php echo $__env->make('partials.frontend_nav', ['pages' => $page->children], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </ul>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

