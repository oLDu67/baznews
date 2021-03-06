<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //env file
        $env1 = Permission::create([
            'name'          => 'index-env',
            'display_name'  => 'It makes show in the dashboard route list',
            'is_active'     => 1,
        ]);

        $env2 = Permission::create([
            'name'          => 'changes-env',
            'display_name'  => 'Changes the Env file.',
            'is_active'     => 1,
        ]);

        $laravelfilemanager = Permission::create([
            'name'          => '*-laravelfilemanager',
            'display_name'  => 'Laravel File Manager permissions',
            'is_active'     => 1,
        ]);

        //dashboard
        $dashboard1 = Permission::create([
            'name'          => 'index-admin',
            'display_name'  => 'Admin anasayfası',
            'is_active'     => 1,
        ]);

        $dashboard2 = Permission::create([
            'name'          => 'clear-admin',
            'display_name'  => 'Cache leri temizliyor sistemi düzenliyor.',
            'is_active'     => 1,
        ]);


        //announcement
        $announcement1 = Permission::create([
            'name'          => 'index-announcement',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $announcement2 = Permission::create([
            'name'          => 'create-announcement',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $announcement3 = Permission::create([
            'name'          => 'edit-announcement',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $announcement4 = Permission::create([
            'name'          => 'destroy-announcement',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $announcement5 = Permission::create([
            'name'          => 'show-announcement',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $announcement6 = Permission::create([
            'name'          => 'update-announcement',
            'display_name'  => 'announcement update',
            'is_active'     => 1,
        ]);

        $announcement7 = Permission::create([
            'name'          => 'store-announcement',
            'display_name'  => 'announcement store',
            'is_active'     => 1,
        ]);

        //contacttype
        $contacttype1 = Permission::create([
            'name'          => 'index-contacttype',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $contacttype2 = Permission::create([
            'name'          => 'create-contacttype',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $contacttype3 = Permission::create([
            'name'          => 'edit-contacttype',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $contacttype4 = Permission::create([
            'name'          => 'destroy-contacttype',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $contacttype5 = Permission::create([
            'name'          => 'show-contacttype',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $contacttype6 = Permission::create([
            'name'          => 'update-contacttype',
            'display_name'  => 'contacttype update',
            'is_active'     => 1,
        ]);

        $contacttype7 = Permission::create([
            'name'          => 'store-contacttype',
            'display_name'  => 'contacttype store',
            'is_active'     => 1,
        ]);

        //menu
        $menu1 = Permission::create([
            'name'          => 'index-menu',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $menu2 = Permission::create([
            'name'          => 'create-menu',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $menu3 = Permission::create([
            'name'          => 'edit-menu',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $menu4 = Permission::create([
            'name'          => 'destroy-menu',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $menu5 = Permission::create([
            'name'          => 'show-menu',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $menu6 = Permission::create([
            'name'          => 'update-menu',
            'display_name'  => 'menu update',
            'is_active'     => 1,
        ]);

        $menu7 = Permission::create([
            'name'          => 'store-menu',
            'display_name'  => 'menu store',
            'is_active'     => 1,
        ]);

        //page
        $page1 = Permission::create([
            'name'          => 'index-page',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $page2 = Permission::create([
            'name'          => 'create-page',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $page3 = Permission::create([
            'name'          => 'edit-page',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $page4 = Permission::create([
            'name'          => 'destroy-page',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $page5 = Permission::create([
            'name'          => 'show-page',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $page6 = Permission::create([
            'name'          => 'update-page',
            'display_name'  => 'page update',
            'is_active'     => 1,
        ]);

        $page7 = Permission::create([
            'name'          => 'store-page',
            'display_name'  => 'page store',
            'is_active'     => 1,
        ]);

        //rss
        $rss1 = Permission::create([
            'name'          => 'index-rss',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $rss2 = Permission::create([
            'name'          => 'create-rss',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $rss3 = Permission::create([
            'name'          => 'edit-rss',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $rss4 = Permission::create([
            'name'          => 'destroy-rss',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $rss5 = Permission::create([
            'name'          => 'show-rss',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $rss6 = Permission::create([
            'name'          => 'update-rss',
            'display_name'  => 'rss update',
            'is_active'     => 1,
        ]);

        $rss7 = Permission::create([
            'name'          => 'store-rss',
            'display_name'  => 'rss store',
            'is_active'     => 1,
        ]);

        //sitemaps
        $sitemaps1 = Permission::create([
            'name'          => 'index-sitemap',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $sitemaps2 = Permission::create([
            'name'          => 'create-sitemap',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $sitemaps3 = Permission::create([
            'name'          => 'edit-sitemap',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $sitemaps4 = Permission::create([
            'name'          => 'destroy-sitemap',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $sitemaps5 = Permission::create([
            'name'          => 'show-sitemap',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $sitemaps6 = Permission::create([
            'name'          => 'update-sitemap',
            'display_name'  => 'sitemaps update',
            'is_active'     => 1,
        ]);

        $sitemaps7 = Permission::create([
            'name'          => 'store-sitemap',
            'display_name'  => 'sitemaps store',
            'is_active'     => 1,
        ]);

        //user
        $user1 = Permission::create([
            'name'          => 'index-user',
            'display_name'  => 'Kullanıcı Listeleme',
            'is_active'     => 1,
        ]);

        $user2 = Permission::create([
            'name'          => 'create-user',
            'display_name'  => 'Kullanıcı Oluşturma',
            'is_active'     => 1,
        ]);

        $user3 = Permission::create([
            'name'          => 'edit-user',
            'display_name'  => 'Kullanıcı Düzenleme',
            'is_active'     => 1,
        ]);

        $user4 = Permission::create([
            'name'          => 'destroy-user',
            'display_name'  => 'Kullanıcı Silme',
            'is_active'     => 1,
        ]);

        $user5 = Permission::create([
            'name'          => 'show-user',
            'display_name'  => 'Kullanıcı Gösterme',
            'is_active'     => 1,
        ]);

        $user6 = Permission::create([
            'name'          => 'update-user',
            'display_name'  => 'Kullanıcı Güncelleme',
            'is_active'     => 1,
        ]);

        $user7 = Permission::create([
            'name'          => 'store-user',
            'display_name'  => 'Kullanıcı başka bir kullanıcıyı güncelleme yetkisi',
            'is_active'     => 1,
        ]);

        $user8 = Permission::create([
            'name'          => 'update_other_user-user',
            'display_name'  => 'Kullanıcı başka bir kullanıcıyı güncelleme yetkisi',
            'is_active'     => 1,
        ]);


        $user9 = Permission::create([
            'name'          => 'show_other_user-user',
            'display_name'  => 'Kullanıcı başka bir kullanıcıyı detaylarını görme yetkisi',
            'is_active'     => 1,
        ]);

        $user10 = Permission::create([
            'name'          => 'showTrashedRecords-user',
            'display_name'  => 'user showTrashedRecords ',
            'is_active'     => 1,
        ]);

        $user11 = Permission::create([
            'name'          => 'trashedUserRestore-user',
            'display_name'  => 'user trashedNewsRestore',
            'is_active'     => 1,
        ]);

        $user12 = Permission::create([
            'name'          => 'historyForceDelete-user',
            'display_name'  => 'user historyForceDelete',
            'is_active'     => 1,
        ]);

        foreach (User::$statuses as $status){

            $user[$status] = Permission::create([
                'name'          => $status . '-user',
                'display_name'  => 'user status ' . $status,
                'is_active'     => 1,
            ]);
        }

        //Group
        $group1 = Permission::create([
            'name'          => 'index-group',
            'display_name'  => 'Group  Listeleme',
            'is_active'     => 1,
        ]);

        $group2 = Permission::create([
            'name'          => 'create-group',
            'display_name'  => 'Group Oluşturma',
            'is_active'     => 1,
        ]);

        $group3 = Permission::create([
            'name'          => 'edit-group',
            'display_name'  => 'Group Düzenleme',
            'is_active'     => 1,
        ]);

        $group4 = Permission::create([
            'name'          => 'destroy-group',
            'display_name'  => 'Group Silme',
            'is_active'     => 1,
        ]);

        $group5 = Permission::create([
            'name'          => 'show-group',
            'display_name'  => 'Group Gösterme',
            'is_active'     => 1,
        ]);

        $group6 = Permission::create([
            'name'          => 'update-group',
            'display_name'  => 'group update',
            'is_active'     => 1,
        ]);

        $group7 = Permission::create([
            'name'          => 'store-group',
            'display_name'  => 'group store',
            'is_active'     => 1,
        ]);

        //role
        $role1 = Permission::create([
            'name'          => 'index-role',
            'display_name'  => 'role  Listeleme',
            'is_active'     => 1,
        ]);

        $role2 = Permission::create([
            'name'          => 'create-role',
            'display_name'  => 'role Oluşturma',
            'is_active'     => 1,
        ]);

        $role3 = Permission::create([
            'name'          => 'edit-role',
            'display_name'  => 'role Düzenleme',
            'is_active'     => 1,
        ]);

        $role4 = Permission::create([
            'name'          => 'destroy-role',
            'display_name'  => 'role Silme',
            'is_active'     => 1,
        ]);

        $role5 = Permission::create([
            'name'          => 'show-role',
            'display_name'  => 'role Gösterme',
            'is_active'     => 1,
        ]);

        $role6 = Permission::create([
            'name'          => 'update-role',
            'display_name'  => 'role update',
            'is_active'     => 1,
        ]);

        $role7 = Permission::create([
            'name'          => 'store-role',
            'display_name'  => 'role store',
            'is_active'     => 1,
        ]);

        $role8 = Permission::create([
            'name'          => 'permission_role_store-role',
            'display_name'  => 'role sayfasında permission kayıt etme yetkisi. ',
            'is_active'     => 1,
        ]);

        //tag
        $tag1 = Permission::create([
            'name'          => 'index-tag',
            'display_name'  => 'tag  Listeleme',
            'is_active'     => 1,
        ]);

        $tag2 = Permission::create([
            'name'          => 'create-tag',
            'display_name'  => 'tag Oluşturma',
            'is_active'     => 1,
        ]);

        $tag3 = Permission::create([
            'name'          => 'edit-tag',
            'display_name'  => 'tag Düzenleme',
            'is_active'     => 1,
        ]);

        $tag4 = Permission::create([
            'name'          => 'destroy-tag',
            'display_name'  => 'tag Silme',
            'is_active'     => 1,
        ]);

        $tag5 = Permission::create([
            'name'          => 'show-tag',
            'display_name'  => 'tag Gösterme',
            'is_active'     => 1,
        ]);

        $tag6 = Permission::create([
            'name'          => 'update-tag',
            'display_name'  => 'tag update',
            'is_active'     => 1,
        ]);

        $tag7 = Permission::create([
            'name'          => 'store-tag',
            'display_name'  => 'tag store',
            'is_active'     => 1,
        ]);

        //permission
        $permission1 = Permission::create([
            'name'          => 'index-permission',
            'display_name'  => 'permission  Listeleme',
            'is_active'     => 1,
        ]);

        $permission2 = Permission::create([
            'name'          => 'create-permission',
            'display_name'  => 'permission Oluşturma',
            'is_active'     => 1,
        ]);

        $permission3 = Permission::create([
            'name'          => 'edit-permission',
            'display_name'  => 'permission Düzenleme',
            'is_active'     => 1,
        ]);

        $permission4 = Permission::create([
            'name'          => 'destroy-permission',
            'display_name'  => 'permission Silme',
            'is_active'     => 1,
        ]);

        $permission5 = Permission::create([
            'name'          => 'show-permission',
            'display_name'  => 'permission Gösterme',
            'is_active'     => 1,
        ]);

        $permission6 = Permission::create([
            'name'          => 'update-permission',
            'display_name'  => 'permission update',
            'is_active'     => 1,
        ]);

        $permission7 = Permission::create([
            'name'          => 'store-permission',
            'display_name'  => 'permission store',
            'is_active'     => 1,
        ]);

        //revision
        $revision1 = Permission::create([
            'name'          => 'index-revision',
            'display_name'  => 'revision  Listeleme',
            'is_active'     => 1,
        ]);

        $revision2 = Permission::create([
            'name'          => 'create-revision',
            'display_name'  => 'revision Oluşturma',
            'is_active'     => 1,
        ]);

        $revision3 = Permission::create([
            'name'          => 'edit-revision',
            'display_name'  => 'revision Düzenleme',
            'is_active'     => 1,
        ]);

        $revision4 = Permission::create([
            'name'          => 'destroy-revision',
            'display_name'  => 'revision Silme',
            'is_active'     => 1,
        ]);

        $revision5 = Permission::create([
            'name'          => 'show-revision',
            'display_name'  => 'revision Gösterme',
            'is_active'     => 1,
        ]);

        $revision6 = Permission::create([
            'name'          => 'update-revision',
            'display_name'  => 'revision update',
            'is_active'     => 1,
        ]);

        $revision7 = Permission::create([
            'name'          => 'store-revision',
            'display_name'  => 'revision store',
            'is_active'     => 1,
        ]);

        //log
        $log1 = Permission::create([
            'name'          => 'index-log',
            'display_name'  => 'Dashboard da log linki görebilsin mi?',
            'is_active'     => 1,
        ]);

//        $log2 = Permission::create([
//            'name'          => 'create-log',
//            'display_name'  => 'log Oluşturma',
//            'is_active'     => 1,
//        ]);
//
//        $log3 = Permission::create([
//            'name'          => 'edit-log',
//            'display_name'  => 'log Düzenleme',
//            'is_active'     => 1,
//        ]);
//
//        $log4 = Permission::create([
//            'name'          => 'destroy-log',
//            'display_name'  => 'log Silme',
//            'is_active'     => 1,
//        ]);

        $log5 = Permission::create([
            'name'          => 'show-log',
            'display_name'  => 'log İle Alakalı işlemleri yapabilir.',
            'is_active'     => 1,
        ]);

//        $log6 = Permission::create([
//            'name'          => 'update-log',
//            'display_name'  => 'log update',
//            'is_active'     => 1,
//        ]);
//
//        $log7 = Permission::create([
//            'name'          => 'store-log',
//            'display_name'  => 'log update',
//            'is_active'     => 1,
//        ]);

        //account
        $account1 = Permission::create([
            'name'          => 'index-account',
            'display_name'  => 'account  Listeleme',
            'is_active'     => 1,
        ]);

        $account2 = Permission::create([
            'name'          => 'create-account',
            'display_name'  => 'account Oluşturma',
            'is_active'     => 1,
        ]);

        $account3 = Permission::create([
            'name'          => 'edit-account',
            'display_name'  => 'account Düzenleme',
            'is_active'     => 1,
        ]);

        $account4 = Permission::create([
            'name'          => 'destroy-account',
            'display_name'  => 'account Silme',
            'is_active'     => 1,
        ]);

        $account5 = Permission::create([
            'name'          => 'show-account',
            'display_name'  => 'account Gösterme',
            'is_active'     => 1,
        ]);

        $account6 = Permission::create([
            'name'          => 'update-account',
            'display_name'  => 'account Güncelleme',
            'is_active'     => 1,
        ]);

        $account7 = Permission::create([
            'name'          => 'store-account',
            'display_name'  => 'account store',
            'is_active'     => 1,
        ]);

        $account8 = Permission::create([
            'name'          => 'changePasswordView-account',
            'display_name'  => 'frontend de kullanıcının şifre değiştirme sayfasını görüntüleme yetkisi.',
            'is_active'     => 1,
        ]);

        $account9 = Permission::create([
            'name'          => 'changePassword-account',
            'display_name'  => 'frontend de kullanıcının şifre değiştirme yetkisi.',
            'is_active'     => 1,
        ]);

        //country
        $country1 = Permission::create([
            'name'          => 'index-country',
            'display_name'  => 'country  Listeleme',
            'is_active'     => 1,
        ]);

        $country2 = Permission::create([
            'name'          => 'create-country',
            'display_name'  => 'country Oluşturma',
            'is_active'     => 1,
        ]);

        $country3 = Permission::create([
            'name'          => 'edit-country',
            'display_name'  => 'country Düzenleme',
            'is_active'     => 1,
        ]);

        $country4 = Permission::create([
            'name'          => 'destroy-country',
            'display_name'  => 'country Silme',
            'is_active'     => 1,
        ]);

        $country5 = Permission::create([
            'name'          => 'show-country',
            'display_name'  => 'country Gösterme',
            'is_active'     => 1,
        ]);

        $country6 = Permission::create([
            'name'          => 'update-country',
            'display_name'  => 'country update',
            'is_active'     => 1,
        ]);

        $country7 = Permission::create([
            'name'          => 'store-country',
            'display_name'  => 'country store',
            'is_active'     => 1,
        ]);

        //city
        $city1 = Permission::create([
            'name'          => 'index-city',
            'display_name'  => 'city  Listeleme',
            'is_active'     => 1,
        ]);

        $city2 = Permission::create([
            'name'          => 'create-city',
            'display_name'  => 'city Oluşturma',
            'is_active'     => 1,
        ]);

        $city3 = Permission::create([
            'name'          => 'edit-city',
            'display_name'  => 'city Düzenleme',
            'is_active'     => 1,
        ]);

        $city4 = Permission::create([
            'name'          => 'destroy-city',
            'display_name'  => 'city Silme',
            'is_active'     => 1,
        ]);

        $city5 = Permission::create([
            'name'          => 'show-city',
            'display_name'  => 'city Gösterme',
            'is_active'     => 1,
        ]);

        $city6 = Permission::create([
            'name'          => 'update-city',
            'display_name'  => 'city update',
            'is_active'     => 1,
        ]);

        $city7 = Permission::create([
            'name'          => 'store-city',
            'display_name'  => 'city store',
            'is_active'     => 1,
        ]);

        //contact
        $contact1 = Permission::create([
            'name'          => 'index-contact',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $contact2 = Permission::create([
            'name'          => 'create-contact',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $contact3 = Permission::create([
            'name'          => 'edit-contact',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $contact4 = Permission::create([
            'name'          => 'destroy-contact',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $contact5 = Permission::create([
            'name'          => 'show-contact',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $contact6 = Permission::create([
            'name'          => 'update-contact',
            'display_name'  => 'contact update',
            'is_active'     => 1,
        ]);

        $contact7 = Permission::create([
            'name'          => 'store-contact',
            'display_name'  => 'contact store',
            'is_active'     => 1,
        ]);

        //event
        $event1 = Permission::create([
            'name'          => 'index-event',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $event2 = Permission::create([
            'name'          => 'create-event',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $event3 = Permission::create([
            'name'          => 'edit-event',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $event4 = Permission::create([
            'name'          => 'destroy-event',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $event5 = Permission::create([
            'name'          => 'show-event',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $event6 = Permission::create([
            'name'          => 'update-event',
            'display_name'  => 'event update',
            'is_active'     => 1,
        ]);

        $event7 = Permission::create([
            'name'          => 'store-event',
            'display_name'  => 'event store',
            'is_active'     => 1,
        ]);

        //thememanager
        $thememanager1 = Permission::create([
            'name'          => 'index-thememanager',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $thememanager2 = Permission::create([
            'name'          => 'create-thememanager',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $thememanager3 = Permission::create([
            'name'          => 'edit-thememanager',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $thememanager4 = Permission::create([
            'name'          => 'destroy-thememanager',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $thememanager5 = Permission::create([
            'name'          => 'show-thememanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $thememanager6 = Permission::create([
            'name'          => 'update-thememanager',
            'display_name'  => 'thememanager update',
            'is_active'     => 1,
        ]);

        $thememanager7 = Permission::create([
            'name'          => 'store-thememanager',
            'display_name'  => 'thememanager store',
            'is_active'     => 1,
        ]);

        $thememanager8 = Permission::create([
            'name'          => 'themeActivationToggle-thememanager',
            'display_name'  => 'thememanager themeActivationToggle',
            'is_active'     => 1,
        ]);

        //widgetmanager
        $widgetmanager1 = Permission::create([
            'name'          => 'index-widgetmanager',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $widgetmanager2 = Permission::create([
            'name'          => 'create-widgetmanager',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $widgetmanager3 = Permission::create([
            'name'          => 'edit-widgetmanager',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $widgetmanager4 = Permission::create([
            'name'          => 'destroy-widgetmanager',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $widgetmanager5 = Permission::create([
            'name'          => 'show-widgetmanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $widgetmanager6 = Permission::create([
            'name'          => 'update-widgetmanager',
            'display_name'  => 'widgetmanager update',
            'is_active'     => 1,
        ]);

        $widgetmanager7 = Permission::create([
            'name'          => 'store-widgetmanager',
            'display_name'  => 'widgetmanager store',
            'is_active'     => 1,
        ]);

        $widgetmanager8 = Permission::create([
            'name'          => 'addWidgetActivation-widgetmanager',
            'display_name'  => 'addWidgetActivation işlemleri',
            'is_active'     => 1,
        ]);

        //modulemanager
        $modulemanager1 = Permission::create([
            'name'          => 'index-modulemanager',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $modulemanager2 = Permission::create([
            'name'          => 'create-modulemanager',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $modulemanager3 = Permission::create([
            'name'          => 'edit-modulemanager',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $modulemanager4 = Permission::create([
            'name'          => 'destroy-modulemanager',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $modulemanager5 = Permission::create([
            'name'          => 'show-modulemanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $modulemanager6 = Permission::create([
            'name'          => 'moduleActivationToggle-modulemanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $modulemanager7 = Permission::create([
            'name'          => 'update-modulemanager',
            'display_name'  => 'modulemanager update',
            'is_active'     => 1,
        ]);

        $modulemanager8 = Permission::create([
            'name'          => 'store-modulemanager',
            'display_name'  => 'modulemanager store',
            'is_active'     => 1,
        ]);

        $modulemanager9 = Permission::create([
            'name'          => 'moduleReset-modulemanager',
            'display_name'  => 'moduleReset',
            'is_active'     => 1,
        ]);

        $modulemanager10 = Permission::create([
            'name'          => 'moduleRefreshAndSeed-modulemanager',
            'display_name'  => 'moduleRefreshAndSeed',
            'is_active'     => 1,
        ]);

        //setting
        $setting1 = Permission::create([
            'name'          => 'index-setting',
            'display_name'  => 'Ayarlar Bilgilerinin Listeleme',
            'is_active'     => 1,
        ]);

        $setting2 = Permission::create([
            'name'          => 'create-setting',
            'display_name'  => 'Ayarlar Bilgilerinin Oluşturma',
            'is_active'     => 1,
        ]);

        $setting3 = Permission::create([
            'name'          => 'edit-setting',
            'display_name'  => 'Ayarlar Bilgilerinin Düzenleme',
            'is_active'     => 1,
        ]);

        $setting4 = Permission::create([
            'name'          => 'destroy-setting',
            'display_name'  => 'Ayarlar Bilgilerinin Silme',
            'is_active'     => 1,
        ]);

        $setting5 = Permission::create([
            'name'          => 'show-setting',
            'display_name'  => 'Ayarlar Bilgilerinin Gösterme',
            'is_active'     => 1,
        ]);

        $setting6 = Permission::create([
            'name'          => 'update-setting',
            'display_name'  => 'Ayarlar Bilgilerinin Güncelleme',
            'is_active'     => 1,
        ]);

        $setting7 = Permission::create([
            'name'          => 'store-setting',
            'display_name'  => 'setting store',
            'is_active'     => 1,
        ]);

        $setting8 = Permission::create([
            'name'          => 'repairMysqlTables-setting',
            'display_name'  => 'setting store',
            'is_active'     => 1,
        ]);

        $setting9 = Permission::create([
            'name'          => 'flushAllCache-setting',
            'display_name'  => 'setting store',
            'is_active'     => 1,
        ]);

        $setting10 = Permission::create([
            'name'          => 'getAllRedisKey-setting',
            'display_name'  => 'setting store',
            'is_active'     => 1,
        ]);

        $setting11 = Permission::create([
            'name'          => 'deleteCacheByContent-setting',
            'display_name'  => 'setting store',
            'is_active'     => 1,
        ]);

        $setting12 = Permission::create([
            'name'          => 'getBackUp-setting',
            'display_name'  => 'setting store',
            'is_active'     => 1,
        ]);

        $setting13 = Permission::create([
            'name'          => 'backUpClean-setting',
            'display_name'  => 'setting store',
            'is_active'     => 1,
        ]);

        $setting14 = Permission::create([
            'name'          => 'routeCache-setting',
            'display_name'  => 'setting route cache',
            'is_active'     => 1,
        ]);

        $setting15 = Permission::create([
            'name'          => 'routeClear-setting',
            'display_name'  => 'setting routeClear',
            'is_active'     => 1,
        ]);

        $setting16 = Permission::create([
            'name'          => 'viewClear-setting',
            'display_name'  => 'setting viewClear',
            'is_active'     => 1,
        ]);

        $setting17 = Permission::create([
            'name'          => 'configClear-setting',
            'display_name'  => 'setting configClear',
            'is_active'     => 1,
        ]);

        $setting18 = Permission::create([
            'name'          => 'configCache-setting',
            'display_name'  => 'setting configCache',
            'is_active'     => 1,
        ]);

        $setting19 = Permission::create([
            'name'          => 'flushCacheItem-setting',
            'display_name'  => 'Flush cache item',
            'is_active'     => 1,
        ]);


        //backend
        $backend1 = Permission::create([
            'name'          => 'removeCacheKey-backend',
            'display_name'  => 'Cache Silme',
            'is_active'     => 1,
        ]);

        $backend2 = Permission::create([
            'name'          => 'removeHomePageCache-backend',
            'display_name'  => 'removeHomePageCache Silme',
            'is_active'     => 1,
        ]);

        $backend3 = Permission::create([
            'name'          => 'removeHomePageCacheWithRedirect-backend',
            'display_name'  => 'removeHomePageCacheWithRedirect Silme',
            'is_active'     => 1,
        ]);

        $backend4 = Permission::create([
            'name'          => 'removeCacheTags-backend',
            'display_name'  => 'removeCacheTags Silme',
            'is_active'     => 1,
        ]);

        //advertisement
        $advertisement1 = Permission::create([
            'name'          => 'index-advertisement',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $advertisement2 = Permission::create([
            'name'          => 'create-advertisement',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $advertisement3 = Permission::create([
            'name'          => 'edit-advertisement',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $advertisement4 = Permission::create([
            'name'          => 'destroy-advertisement',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $advertisement5 = Permission::create([
            'name'          => 'show-advertisement',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $advertisement6 = Permission::create([
            'name'          => 'update-advertisement',
            'display_name'  => 'advertisement update',
            'is_active'     => 1,
        ]);

        $advertisement7 = Permission::create([
            'name'          => 'store-advertisement',
            'display_name'  => 'advertisement store',
            'is_active'     => 1,
        ]);

        //widgetgroup
        $widgetgroup1 = Permission::create([
            'name'          => 'index-widgetgroup',
            'display_name'  => 'widgetgroup Listeleme',
            'is_active'     => 1,
        ]);

        $widgetgroup2 = Permission::create([
            'name'          => 'create-widgetgroup',
            'display_name'  => 'widgetgroup Oluşturma',
            'is_active'     => 1,
        ]);

        $widgetgroup3 = Permission::create([
            'name'          => 'edit-widgetgroup',
            'display_name'  => 'widgetgroup Düzenleme',
            'is_active'     => 1,
        ]);

        $widgetgroup4 = Permission::create([
            'name'          => 'destroy-widgetgroup',
            'display_name'  => 'widgetgroup Silme',
            'is_active'     => 1,
        ]);

        $widgetgroup5 = Permission::create([
            'name'          => 'show-widgetgroup',
            'display_name'  => 'widgetgroup Gösterme',
            'is_active'     => 1,
        ]);

        $widgetgroup6 = Permission::create([
            'name'          => 'update-widgetgroup',
            'display_name'  => 'widgetgroup update',
            'is_active'     => 1,
        ]);

        $widgetgroup7 = Permission::create([
            'name'          => 'store-widgetgroup',
            'display_name'  => 'widgetgroup store',
            'is_active'     => 1,
        ]);

        //ping
        $ping1 = Permission::create([
            'name'          => 'index-ping',
            'display_name'  => 'ping Listeleme',
            'is_active'     => 1,
        ]);

        $ping2 = Permission::create([
            'name'          => 'edit-ping',
            'display_name'  => 'ping Düzenleme',
            'is_active'     => 1,
        ]);

        $ping3 = Permission::create([
            'name'          => 'update-ping',
            'display_name'  => 'ping update',
            'is_active'     => 1,
        ]);

        $ping4 = Permission::create([
            'name'          => 'sendPing-ping',
            'display_name'  => 'send ping',
            'is_active'     => 1,
        ]);

        //language
        $language1 = Permission::create([
            'name'          => 'index-language',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $language2 = Permission::create([
            'name'          => 'create-language',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $language3 = Permission::create([
            'name'          => 'edit-language',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $language4 = Permission::create([
            'name'          => 'destroy-language',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $language5 = Permission::create([
            'name'          => 'show-language',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $language6 = Permission::create([
            'name'          => 'update-language',
            'display_name'  => 'language update',
            'is_active'     => 1,
        ]);

        $language7 = Permission::create([
            'name'          => 'store-language',
            'display_name'  => 'language store',
            'is_active'     => 1,
        ]);

        //searchlist
        $searchlist1 = Permission::create([
            'name'          => 'index-searchlist',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $searchlist2 = Permission::create([
            'name'          => 'create-searchlist',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $searchlist3 = Permission::create([
            'name'          => 'edit-searchlist',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $searchlist4 = Permission::create([
            'name'          => 'destroy-searchlist',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $searchlist5 = Permission::create([
            'name'          => 'show-searchlist',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $searchlist6 = Permission::create([
            'name'          => 'update-searchlist',
            'display_name'  => 'searchlist update',
            'is_active'     => 1,
        ]);

        $searchlist7 = Permission::create([
            'name'          => 'store-searchlist',
            'display_name'  => 'searchlist store',
            'is_active'     => 1,
        ]);

        //api_manager
        $api_manager = Permission::create([
            'name'          => 'index-apimanager',
            'display_name'  => 'API Management',
            'is_active'     => 1,
        ]);






        $first_user = User::find(1);
        //RoleTableSeeder da super_admin id sırası 5 olduğu için id si 5 olanı çekiyoruz.
        $super_admin = Role::find(5);

        $super_admin->users()->attach($first_user);

        $super_admin->permissions()->attach($env1);
        $super_admin->permissions()->attach($env2);
        $super_admin->permissions()->attach($laravelfilemanager);
        $super_admin->permissions()->attach($dashboard1);
        $super_admin->permissions()->attach($dashboard2);
        $super_admin->permissions()->attach($user1);
        $super_admin->permissions()->attach($user2);
        $super_admin->permissions()->attach($user3);
        $super_admin->permissions()->attach($user4);
        $super_admin->permissions()->attach($user5);
        $super_admin->permissions()->attach($user6);
        $super_admin->permissions()->attach($user7);
        $super_admin->permissions()->attach($user8);
        $super_admin->permissions()->attach($user9);
        $super_admin->permissions()->attach($user10);
        $super_admin->permissions()->attach($user11);
        $super_admin->permissions()->attach($user12);

        foreach (User::$statuses as $status){
            $super_admin->permissions()->attach($user[$status]);
        }

        $super_admin->permissions()->attach($group1);
        $super_admin->permissions()->attach($group2);
        $super_admin->permissions()->attach($group3);
        $super_admin->permissions()->attach($group4);
        $super_admin->permissions()->attach($group5);
        $super_admin->permissions()->attach($group6);
        $super_admin->permissions()->attach($group7);
        $super_admin->permissions()->attach($role1);
        $super_admin->permissions()->attach($role2);
        $super_admin->permissions()->attach($role3);
        $super_admin->permissions()->attach($role4);
        $super_admin->permissions()->attach($role5);
        $super_admin->permissions()->attach($role6);
        $super_admin->permissions()->attach($role7);
        $super_admin->permissions()->attach($role8);
        $super_admin->permissions()->attach($tag1);
        $super_admin->permissions()->attach($tag2);
        $super_admin->permissions()->attach($tag3);
        $super_admin->permissions()->attach($tag4);
        $super_admin->permissions()->attach($tag5);
        $super_admin->permissions()->attach($tag6);
        $super_admin->permissions()->attach($tag7);
        $super_admin->permissions()->attach($permission1);
        $super_admin->permissions()->attach($permission2);
        $super_admin->permissions()->attach($permission3);
        $super_admin->permissions()->attach($permission4);
        $super_admin->permissions()->attach($permission5);
        $super_admin->permissions()->attach($permission6);
        $super_admin->permissions()->attach($permission7);
        $super_admin->permissions()->attach($revision1);
        $super_admin->permissions()->attach($revision2);
        $super_admin->permissions()->attach($revision3);
        $super_admin->permissions()->attach($revision4);
        $super_admin->permissions()->attach($revision5);
        $super_admin->permissions()->attach($revision6);
        $super_admin->permissions()->attach($revision7);
        $super_admin->permissions()->attach($log1);
//        $super_admin->permissions()->attach($log2);
//        $super_admin->permissions()->attach($log3);
//        $super_admin->permissions()->attach($log4);
        $super_admin->permissions()->attach($log5);
//        $super_admin->permissions()->attach($log6);
//        $super_admin->permissions()->attach($log7);
        $super_admin->permissions()->attach($account1);
        $super_admin->permissions()->attach($account2);
        $super_admin->permissions()->attach($account3);
        $super_admin->permissions()->attach($account4);
        $super_admin->permissions()->attach($account5);
        $super_admin->permissions()->attach($account6);
        $super_admin->permissions()->attach($account7);
        $super_admin->permissions()->attach($account8);
        $super_admin->permissions()->attach($account9);
        $super_admin->permissions()->attach($country1);
        $super_admin->permissions()->attach($country2);
        $super_admin->permissions()->attach($country3);
        $super_admin->permissions()->attach($country4);
        $super_admin->permissions()->attach($country5);
        $super_admin->permissions()->attach($country6);
        $super_admin->permissions()->attach($country7);
        $super_admin->permissions()->attach($city1);
        $super_admin->permissions()->attach($city2);
        $super_admin->permissions()->attach($city3);
        $super_admin->permissions()->attach($city4);
        $super_admin->permissions()->attach($city5);
        $super_admin->permissions()->attach($city6);
        $super_admin->permissions()->attach($city7);
        $super_admin->permissions()->attach($contacttype1);
        $super_admin->permissions()->attach($contacttype2);
        $super_admin->permissions()->attach($contacttype3);
        $super_admin->permissions()->attach($contacttype4);
        $super_admin->permissions()->attach($contacttype5);
        $super_admin->permissions()->attach($contacttype6);
        $super_admin->permissions()->attach($contacttype7);
        $super_admin->permissions()->attach($contact1);
        $super_admin->permissions()->attach($contact2);
        $super_admin->permissions()->attach($contact3);
        $super_admin->permissions()->attach($contact4);
        $super_admin->permissions()->attach($contact5);
        $super_admin->permissions()->attach($contact6);
        $super_admin->permissions()->attach($contact7);
        $super_admin->permissions()->attach($event1);
        $super_admin->permissions()->attach($event2);
        $super_admin->permissions()->attach($event3);
        $super_admin->permissions()->attach($event4);
        $super_admin->permissions()->attach($event5);
        $super_admin->permissions()->attach($event6);
        $super_admin->permissions()->attach($event7);
        $super_admin->permissions()->attach($menu1);
        $super_admin->permissions()->attach($menu2);
        $super_admin->permissions()->attach($menu3);
        $super_admin->permissions()->attach($menu4);
        $super_admin->permissions()->attach($menu5);
        $super_admin->permissions()->attach($menu6);
        $super_admin->permissions()->attach($menu7);
        $super_admin->permissions()->attach($page1);
        $super_admin->permissions()->attach($page2);
        $super_admin->permissions()->attach($page3);
        $super_admin->permissions()->attach($page4);
        $super_admin->permissions()->attach($page5);
        $super_admin->permissions()->attach($page6);
        $super_admin->permissions()->attach($page7);
        $super_admin->permissions()->attach($rss1);
        $super_admin->permissions()->attach($rss2);
        $super_admin->permissions()->attach($rss3);
        $super_admin->permissions()->attach($rss4);
        $super_admin->permissions()->attach($rss5);
        $super_admin->permissions()->attach($rss6);
        $super_admin->permissions()->attach($rss7);
        $super_admin->permissions()->attach($sitemaps1);
        $super_admin->permissions()->attach($sitemaps2);
        $super_admin->permissions()->attach($sitemaps3);
        $super_admin->permissions()->attach($sitemaps4);
        $super_admin->permissions()->attach($sitemaps5);
        $super_admin->permissions()->attach($sitemaps6);
        $super_admin->permissions()->attach($sitemaps7);
        $super_admin->permissions()->attach($announcement1);
        $super_admin->permissions()->attach($announcement2);
        $super_admin->permissions()->attach($announcement3);
        $super_admin->permissions()->attach($announcement4);
        $super_admin->permissions()->attach($announcement5);
        $super_admin->permissions()->attach($announcement6);
        $super_admin->permissions()->attach($announcement7);
        $super_admin->permissions()->attach($thememanager1);
        $super_admin->permissions()->attach($thememanager2);
        $super_admin->permissions()->attach($thememanager3);
        $super_admin->permissions()->attach($thememanager4);
        $super_admin->permissions()->attach($thememanager5);
        $super_admin->permissions()->attach($thememanager6);
        $super_admin->permissions()->attach($thememanager7);
        $super_admin->permissions()->attach($thememanager8);
        $super_admin->permissions()->attach($modulemanager1);
        $super_admin->permissions()->attach($modulemanager2);
        $super_admin->permissions()->attach($modulemanager3);
        $super_admin->permissions()->attach($modulemanager4);
        $super_admin->permissions()->attach($modulemanager5);
        $super_admin->permissions()->attach($modulemanager6);
        $super_admin->permissions()->attach($modulemanager7);
        $super_admin->permissions()->attach($modulemanager8);
        $super_admin->permissions()->attach($modulemanager9);
        $super_admin->permissions()->attach($modulemanager10);
        $super_admin->permissions()->attach($widgetmanager1);
        $super_admin->permissions()->attach($widgetmanager2);
        $super_admin->permissions()->attach($widgetmanager3);
        $super_admin->permissions()->attach($widgetmanager4);
        $super_admin->permissions()->attach($widgetmanager5);
        $super_admin->permissions()->attach($widgetmanager6);
        $super_admin->permissions()->attach($widgetmanager7);
        $super_admin->permissions()->attach($widgetmanager8);
        $super_admin->permissions()->attach($setting1);
        $super_admin->permissions()->attach($setting2);
        $super_admin->permissions()->attach($setting3);
        $super_admin->permissions()->attach($setting4);
        $super_admin->permissions()->attach($setting5);
        $super_admin->permissions()->attach($setting6);
        $super_admin->permissions()->attach($setting7);
        $super_admin->permissions()->attach($setting8);
        $super_admin->permissions()->attach($setting9);
        $super_admin->permissions()->attach($setting10);
        $super_admin->permissions()->attach($setting12);
        $super_admin->permissions()->attach($setting13);
        $super_admin->permissions()->attach($setting14);
        $super_admin->permissions()->attach($setting15);
        $super_admin->permissions()->attach($setting16);
        $super_admin->permissions()->attach($setting17);
        $super_admin->permissions()->attach($setting18);
        $super_admin->permissions()->attach($setting19);
        $super_admin->permissions()->attach($backend1);
        $super_admin->permissions()->attach($backend2);
        $super_admin->permissions()->attach($backend3);
        $super_admin->permissions()->attach($backend4);
        $super_admin->permissions()->attach($advertisement1);
        $super_admin->permissions()->attach($advertisement2);
        $super_admin->permissions()->attach($advertisement3);
        $super_admin->permissions()->attach($advertisement4);
        $super_admin->permissions()->attach($advertisement5);
        $super_admin->permissions()->attach($advertisement6);
        $super_admin->permissions()->attach($advertisement7);
        $super_admin->permissions()->attach($widgetgroup1);
        $super_admin->permissions()->attach($widgetgroup2);
        $super_admin->permissions()->attach($widgetgroup3);
        $super_admin->permissions()->attach($widgetgroup4);
        $super_admin->permissions()->attach($widgetgroup5);
        $super_admin->permissions()->attach($widgetgroup6);
        $super_admin->permissions()->attach($widgetgroup7);
        $super_admin->permissions()->attach($ping1);
        $super_admin->permissions()->attach($ping2);
        $super_admin->permissions()->attach($ping3);
        $super_admin->permissions()->attach($ping4);
        $super_admin->permissions()->attach($language1);
        $super_admin->permissions()->attach($language2);
        $super_admin->permissions()->attach($language3);
        $super_admin->permissions()->attach($language4);
        $super_admin->permissions()->attach($language5);
        $super_admin->permissions()->attach($language6);
        $super_admin->permissions()->attach($language7);
        $super_admin->permissions()->attach($searchlist1);
        $super_admin->permissions()->attach($searchlist2);
        $super_admin->permissions()->attach($searchlist3);
        $super_admin->permissions()->attach($searchlist4);
        $super_admin->permissions()->attach($searchlist5);
        $super_admin->permissions()->attach($searchlist6);
        $super_admin->permissions()->attach($searchlist7);
        $super_admin->permissions()->attach($api_manager);


        //demo kullanıcısını çekiyoruz.
        $demo_user = User::find(4);
        //RoleTableSeeder da demo id sırası 6 olduğu için id si 6 olanı çekiyoruz.
        $demo_role = Role::find(6);

        $demo_role->users()->attach($demo_user);

        $demo_role->permissions()->attach($env1);

        $demo_role->permissions()->attach($laravelfilemanager);

        $demo_role->permissions()->attach($log1);

        $demo_role->permissions()->attach($dashboard1);
        $demo_role->permissions()->attach($dashboard2);

        $demo_role->permissions()->attach($user1);

        foreach (User::$statuses as $status){
            $demo_role->permissions()->attach($user[$status]);
        }

        $demo_role->permissions()->attach($group1);
        $demo_role->permissions()->attach($group3);
        $demo_role->permissions()->attach($group5);

        $demo_role->permissions()->attach($role1);
        $demo_role->permissions()->attach($role3);
        $demo_role->permissions()->attach($role5);
        $demo_role->permissions()->attach($role8);

        $demo_role->permissions()->attach($tag1);
        $demo_role->permissions()->attach($tag3);
        $demo_role->permissions()->attach($tag5);

        $demo_role->permissions()->attach($permission1);
        $demo_role->permissions()->attach($permission3);
        $demo_role->permissions()->attach($permission5);

        $demo_role->permissions()->attach($revision1);
        $demo_role->permissions()->attach($revision3);
        $demo_role->permissions()->attach($revision5);

        $demo_role->permissions()->attach($account1);
        $demo_role->permissions()->attach($account3);
        $demo_role->permissions()->attach($account5);
        $demo_role->permissions()->attach($account8);

        $demo_role->permissions()->attach($country1);
        $demo_role->permissions()->attach($country3);
        $demo_role->permissions()->attach($country5);

        $demo_role->permissions()->attach($city1);
        $demo_role->permissions()->attach($city3);
        $demo_role->permissions()->attach($city5);

        $demo_role->permissions()->attach($contacttype1);
        $demo_role->permissions()->attach($contacttype3);
        $demo_role->permissions()->attach($contacttype5);

        $demo_role->permissions()->attach($contact1);
        $demo_role->permissions()->attach($contact3);
        $demo_role->permissions()->attach($contact5);

        $demo_role->permissions()->attach($event1);
        $demo_role->permissions()->attach($event3);
        $demo_role->permissions()->attach($event5);

        $demo_role->permissions()->attach($menu1);
        $demo_role->permissions()->attach($menu3);
        $demo_role->permissions()->attach($menu5);

        $demo_role->permissions()->attach($page1);
        $demo_role->permissions()->attach($page3);
        $demo_role->permissions()->attach($page5);

        $demo_role->permissions()->attach($rss1);
        $demo_role->permissions()->attach($rss3);
        $demo_role->permissions()->attach($rss5);

        $demo_role->permissions()->attach($sitemaps1);
        $demo_role->permissions()->attach($sitemaps3);
        $demo_role->permissions()->attach($sitemaps5);

        $demo_role->permissions()->attach($announcement1);
        $demo_role->permissions()->attach($announcement3);
        $demo_role->permissions()->attach($announcement5);

        $demo_role->permissions()->attach($thememanager1);
        $demo_role->permissions()->attach($thememanager3);
        $demo_role->permissions()->attach($thememanager5);

        $demo_role->permissions()->attach($modulemanager1);
        $demo_role->permissions()->attach($modulemanager3);
        $demo_role->permissions()->attach($modulemanager5);

        $demo_role->permissions()->attach($widgetmanager1);
        $demo_role->permissions()->attach($widgetmanager3);
        $demo_role->permissions()->attach($widgetmanager5);

        $demo_role->permissions()->attach($setting1);
        $demo_role->permissions()->attach($setting3);
        $demo_role->permissions()->attach($setting5);
        $demo_role->permissions()->attach($setting16);
        $demo_role->permissions()->attach($setting17);
        $demo_role->permissions()->attach($setting18);
        $demo_role->permissions()->attach($setting19);

        $demo_role->permissions()->attach($backend1);
        $demo_role->permissions()->attach($backend2);
        $demo_role->permissions()->attach($backend3);
        $demo_role->permissions()->attach($backend4);

        $demo_role->permissions()->attach($advertisement1);
        $demo_role->permissions()->attach($advertisement3);
        $demo_role->permissions()->attach($advertisement5);

        $demo_role->permissions()->attach($widgetgroup1);
        $demo_role->permissions()->attach($widgetgroup3);
        $demo_role->permissions()->attach($widgetgroup5);

        $demo_role->permissions()->attach($ping1);
        $demo_role->permissions()->attach($ping2);

        $demo_role->permissions()->attach($language1);
        $demo_role->permissions()->attach($language3);
        $demo_role->permissions()->attach($language5);

        $demo_role->permissions()->attach($searchlist1);
        $demo_role->permissions()->attach($searchlist3);
        $demo_role->permissions()->attach($searchlist5);
    }
}
