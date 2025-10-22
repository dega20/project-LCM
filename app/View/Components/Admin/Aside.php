<?php

namespace App\View\Components\Admin;

use routes;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public $routes;
    public function __construct()
    {
        $this->routes = [
            [
                'label' => 'Dashboard',
                'icon' => 'fa fa-laptop',
                'route_name' => 'dashboard',
                'route_active' => 'dashboard',
                'is_dropdown' => false
            ],
            // [
            //     'label' => 'Data User',
            //     'icon' => 'fa fa-users',
            //     'route_name' => 'users.index',
            //     'route_active' => 'users.*',
            //     'is_dropdown' => false
            // ],
            [
                'label' => 'Manajemen User',
                'icon' => 'fa fa-users',
                'route_active' => 'manajemen-user.*',
                'is_dropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'User',
                        'route_name' => 'manajemen-user.users.index',
                        'route_active' => 'manajemen-user.users.*',
                    ],
                    [
                        'label' => 'Role',
                        'route_name' => 'manajemen-user.roles.index',
                        'route_active' => 'manajemen-user.roles.*',
                    ],
                    [
                        'label' => 'Role User',
                        'route_name' => 'manajemen-user.role_user.index',
                        'route_active' => 'manajemen-user.role_user.*',
                    ],
                    // [
                    //     'label' => 'Role',
                    //     'route_name' => 'manajemen-user.users.index',
                    //     'route_active' => 'manajemen-user.users.*',
                    // ],
                    // Add more dropdown items as needed
                ]
            ],
            [
                'label' => 'Contoh',
                'icon' => 'fa fa-passport',
                'route_name' => 'contoh.index',
                'route_active' => 'contoh.*',
                'is_dropdown' => false
            ],

            [
                'label' => 'Profil Perusahaan',
                'icon' => 'fa fa-suitcase',
                'route_active' => 'profil-perusahaan.*',
                'is_dropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Lihat Profil',
                        'route_name' => 'profil-perusahaan.profil.index',
                        'route_active' => 'profil-perusahaan.profil.*',
                    ],
                    // [
                    //     'label' => 'Edit Profil',
                    //     'route_name' => 'profil-perusahaan.profil-edit.index',
                    //     'route_active' => 'profil-perusahaan.profil-edit.*',
                    // ],
                    [
                        'label' => 'Tim & Manajemen',
                        'route_name' => 'profil-perusahaan.profil-tim.index',
                        'route_active' => 'profil-perusahaan.profil-tim.*',
                    ],
                ]
            ],
            [
    'label' => 'Produk & Layanan',
    'icon' => 'fa fa-briefcase', 
    'route_active' => 'produk-layanan.*', 
    'is_dropdown' => true,
    'dropdown' => [
        [
            'label' => 'Kategori',
            'route_name' => 'produk-layanan.kategori.index', 
            'route_active' => 'produk-layanan.kategori.*', 
        ],
        [
            'label' => 'Produk',
            'route_name' => 'produk-layanan.produk.index',
            'route_active' => 'produk-layanan.produk.*',
        ],
        [
            'label' => 'Layanan',
            'route_name' => 'produk-layanan.layanan.index',
            'route_active' => 'produk-layanan.layanan.*',
        ],
    ]
], 
            [
                'label' => 'Manage Apply',
                'icon' => 'fa fa-file',
                'route_name' => 'apply.index',
                'route_active' => 'apply.*',
                'is_dropdown' => false
            ],
            [
                'label' => 'Berita',
                'icon' => 'fa fa-newspaper',
                'route_name' => 'news.index',
                'route_active' => 'news.*',
                'is_dropdown' => false
            ],
            [
                'label' => 'Galeri',
                'icon' => 'fa fa-image',
                'route_name' => 'galleries.index',
                'route_active' => 'galleries.*',
                'is_dropdown' => false
            ],
            [
                'label' => 'FAQ',
                'icon' => 'fa fa-question',
                'route_name' => 'faq.index',
                'route_active' => 'faq.*',
                'is_dropdown' => false
            ],
            // Add more routes as needed
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.aside');
    }
}
