<?php

use \shop\Router;

Router::add('^products/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Products', 'action' => 'view']);
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);
//Router::add('^user/profile(?P<action>[a-z0-9-]+)/?$', ['controller' => 'Profile', 'action' => 'view']);

// Default routes
Router::add('^ahmadshoh$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^ahmadshoh/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');