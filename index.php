<?php

require __DIR__ . "/app/init.php";

$routeExplode = explode('?', $_SERVER['REQUEST_URI']);

$route = array_filter(explode('/', $routeExplode[0]));

if (SUBFOLDER === true) {
  array_shift($route);
}

if (!route(0)) {
  $route[0] = 'index';
}

if (!file_exists(controller(route(0)))) {
  $route[0] = '404';
}

if (!session('login')) {
  $route[0] = 'login';
}

$menus = [
  'index' => [
    'title' => 'Anasayfa',
    'icon' => 'tv-2',
    'permissions' => [
      'show' => 'Görüntüleme'
    ]
  ],
  'records' => [
    'title' => 'Kayıtlar',
    'icon' => 'collection',
    'permissions' => [
      'show' => 'Görüntüleme',
      'add' => 'Ekleme',
      'edit' => 'Düzenleme',
      'delete' => 'Silme'
    ],
    'sub-menu' => [
      'add-record' => [
        'title' => 'Kayıt Ekle',
        'icon' => 'fat-add'
      ],
      'records' => [
        'title' => 'Kayıt Listesi',
        'icon' => 'bullet-list-67'
      ]
    ]
  ],
  'users' => [
    'title' => 'Kullanıcılar',
    'icon' => 'circle-08',
    'permissions' => [
      'show' => 'Görüntüleme',
      'add' => 'Ekleme',
      'edit' => 'Düzenleme',
      'delete' => 'Silme'
    ],
    'sub-menu' => [
      'add-user' => [
        'title' => 'Kullanıcı Ekle',
        'icon' => 'fat-add'
      ],
      'users' => [
        'title' => 'Kullanıcı Listesi',
        'icon' => 'bullet-list-67'
      ]
    ]
  ],
  'units' => [
    'title' => 'Birimler',
    'icon' => 'ungroup',
    'permissions' => [
      'show' => 'Görüntüleme',
      'add' => 'Ekleme',
      'edit' => 'Düzenleme',
      'delete' => 'Silme'
    ],
    'sub-menu' => [
      'add-unit' => [
        'title' => 'Birim Ekle',
        'icon' => 'fat-add'
      ],
      'units' => [
        'title' => 'Birim Listesi',
        'icon' => 'bullet-list-67'
      ]
    ]
  ],
  'analysis' => [
    'title' => 'Analizler',
    'icon' => 'chart-bar-32',
    'permissions' => [
      'show' => 'Görüntüleme',
      'add' => 'Ekleme',
      'edit' => 'Düzenleme',
      'delete' => 'Silme'
    ],
    'sub-menu' => [
      'add-analysis' => [
        'title' => 'Analiz Ekle',
        'icon' => 'fat-add'
      ],
      'analysis' => [
        'title' => 'Analiz Listesi',
        'icon' => 'bullet-list-67'
      ]
    ]
  ]
];

require controller(route(0));
