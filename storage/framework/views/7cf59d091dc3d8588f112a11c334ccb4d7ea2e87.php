<section class="container">
    <header class="header fixed-top clearfix">
       <div class="brand">
        <a href="<?php echo e(url('/')); ?>" class="logo"> Admin Panel </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>

    <div class="top-nav">
        <ul class="nav navbar-nav navbar-right">
         <?php if(Auth::guest()): ?>
         <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('static.login')); ?></a></li>
         <?php else: ?>
         <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;padding-left: 50px; "> <img src="<?php echo e(URL::to('/')); ?>/upload/avatars/<?php echo e(Auth::user()->avatar); ?>" > <?php echo e(Auth::user()->name); ?> <span class="caret"></span> </a>
            <ul class="dropdown-menu" role="menu">
             <li> <a href="<?php echo e(url('/users/editProfile ')); ?>"> <?php echo e(trans('static.edit_my_profile')); ?> </a> </li>
             <li> <a href="<?php echo e(url('/logout')); ?>"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <?php echo e(trans('static.logout')); ?> </a> <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?> </form> </li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
</div>
</header>
</section><!--\* End Top Menu -->


<div class="row">
    <div id="sidebar" class="nav-collapse md-box-shadowed col-md-2">
        <!-- sidebar menu start-->
        <div class="leftside-navigation leftside-navigation-scroll" style="overflow: hidden; outline: none;" tabindex="5000">
            <ul class="sidebar-menu" id="nav-accordion">
                <?php if(Auth::check()): ?>
                <li class="sidebar-profile">
                    <div class="profile-main">
                        <p class="text-right profile-options"><i class="profile-options-open icon-options-vertical fa-2x"></i></p>
                        <p class="image">
                            <img alt="image" src="<?php echo e(URL::to('/')); ?>/upload/avatars/<?php echo e(Auth::user()->avatar); ?>" width="80">
                            <span class="status"><i class="fa fa-circle text-success"></i></span>
                        </p>
                        <p> <span class="name"><?php echo e(Auth::user()->name); ?></span><br>
                            <span class="position" style="font-family: monospace;"><?php echo e(Auth::user()->role); ?></span>
                        </p>
                    </div>
                </li>
                <?php endif; ?>

                <li class=" "><a  class="hvr-bounce-to-right-sidebar-parent <?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>"><span class="fa fa-home icon-sidebar icon-home fa-2x"></span><span> <?php echo e(trans('static.dashboard')); ?></span></a> </li>

                <li class="sub-menu  dcjq-parent-li"><a href="1" class="hvr-bounce-to-right-sidebar-parent dcjq-parent"><span class="fa fa-desktop fa-2x"></span><span>Layouts</span><span class="fa dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li > <a class="<?php echo e(Request::is('pages*') ? 'active' : ''); ?>" href="<?php echo e(route('pages.index')); ?>"><?php echo e(trans('static.page')); ?></a></li>
                        <li > <a class="<?php echo e(Request::is('categories*') ? 'active' : ''); ?>"   href="<?php echo e(route('categories.index')); ?>"><?php echo e(trans('static.category')); ?></a></li>
                        <li > <a class="<?php echo e(Request::is('blocks*') ? 'active' : ''); ?>"  href="<?php echo e(route('blocks.index')); ?>"><?php echo e(trans('static.block')); ?></a></li>
                        <li > <a class="<?php echo e(Request::is('sliders*') ? 'active' : ''); ?>"  href="<?php echo e(route('sliders.index')); ?>"><?php echo e(trans('static.slider')); ?></a></li>
                        <?php if(Auth::user()->role == 'super admin' || Auth::user()->role == 'admin'  ): ?>
                        <li > <a class="<?php echo e(Request::is('settings*') ? 'active' : ''); ?>"  href="<?php echo e(route('settings.create')); ?>"><?php echo e(trans('static.general_settings')); ?></a></li>
                    <?php endif; ?>

                    </ul>
                </li>
                 <?php if(Auth::user()->role == 'super admin' ): ?>
                <li><a href="<?php echo e(route('users.index')); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo e(Request::is('users*') ? 'active' : ''); ?>"><span class="icon-sidebar fa fa-users fa-2x"></span><span><?php echo e(trans('static.user')); ?></span></a> </li>
                <?php endif; ?>
                <li><a href="<?php echo e(route('posts.index')); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo e(Request::is('posts*') ? 'active' : ''); ?>"><span class="icon-sidebar fa fa-eercast fa-2x"></span><span><?php echo e(trans('static.post')); ?></span></a> </li>

                <li><a href="<?php echo e(route('products.index')); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo e(Request::is('products*') ? 'active' : ''); ?>"><span class="fa fa-product-hunt fa-2x"></span><span><?php echo e(trans('static.products')); ?></span></a> </li>

                <li><a href="<?php echo e(route('orders.index')); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo e(Request::is('orders*') ? 'active' : ''); ?>"><span class="fa fa-shopping-cart fa-2x"></span><span><?php echo e(trans('static.orders')); ?></span></a> </li>

                <li><a href="<?php echo e(route('comments.index')); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo e(Request::is('comments*') ? 'active' : ''); ?>""><span class="icon-sidebar fa fa-comments-o fa-2x"></span><span><?php echo e(trans('static.comment')); ?></span></a></li>
                <li><a href="<?php echo e(route('feedbacks.index')); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo e(Request::is('feedbacks*') ? 'active' : ''); ?>"><span class="icon-sidebar fa fa-envelope fa-2x"></span><span><?php echo e(trans('static.feedback')); ?></span></a> </li>
            </ul>           
        </div>
    </div>

    <div class="col-md-10">
        <div class="container-n top-page-header">
            <div class="page-title"> <h2>Theme Dashboard</h2>  <small>Your admin dashboard.</small> </div>
            <div class="page-breadcrumb">
                <nav class="c_breadcrumbs">
                    <ul>
                   <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-home"></i> <?php echo e(trans('static.dashboard')); ?></a></li>
                   <?php for($i = 1; $i <= count(Request::segments()); $i++): ?>
                       <?php if(!is_numeric(ucfirst(Request::segment($i)))): ?>
                          <li>
                             <a href="<?php echo e(URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))); ?>">
                                <?php echo e(ucfirst(Request::segment($i))); ?>

                             </a>
                          </li>
                       <?php endif; ?>
                   <?php endfor; ?>
               </ul>
                </nav>
            </div>
        </div>


        <script src="<?php echo e(theme('js/global-plugins.js')); ?>"></script>
        <script src="<?php echo e(theme('js/theme.js')); ?>"></script>

        <script type="text/javascript">


            $(document).ready(function(){
                new WOW().init();

                App.initPage();
                App.initLeftSideBar();
                App.initCounter();
                App.initNiceScroll();
                App.initPanels();
                App.initProgressBar();
                App.initSlimScroll();
                App.initNotific8();
                App.initTooltipster();
                App.initStyleSwitcher();
                App.initMenuSelected();
                App.initRightSideBar();
                App.initEmail();
                App.initSummernote();
                App.initAccordion();
                App.initModal();
                App.initPopover();
                App.initOwlCarousel();
                App.initWidgets();




            });
        </script>




