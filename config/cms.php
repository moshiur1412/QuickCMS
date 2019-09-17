<?php 

return [

'theme' => [

'folder' => 'themes',
'active' => 'ecommerce'
],

'templates' => [

'ecommerce' => App\Templates\EcommerceTemplate::class,
'products' => App\Templates\ProductTemplate::class,
'home' => App\Templates\HomeTemplate::class,
'blog' => App\Templates\BlogTemplate::class,
'singlePost' => App\Templates\SinglePostTemplate::class,
'singleProduct' => App\Templates\SingleProductTemplate::class,
'contact' => App\Templates\ContactTemplate::class,
'recruitment' => App\Templates\RecruitmentTemplate::class,

]
];