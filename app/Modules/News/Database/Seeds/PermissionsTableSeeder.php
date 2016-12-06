<?php

namespace App\Modules\News\Database\Seeds;

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
        //futurenews
        $futurenews1 = Permission::create([
            'name'          => 'index-futurenews',
            'display_name'  => 'futurenews  Listeleme',
            'is_active'     => 1,
        ]);

        $futurenews2 = Permission::create([
            'name'          => 'create-futurenews',
            'display_name'  => 'futurenews Oluşturma',
            'is_active'     => 1,
        ]);

        $futurenews3 = Permission::create([
            'name'          => 'edit-futurenews',
            'display_name'  => 'futurenews Düzenleme',
            'is_active'     => 1,
        ]);

        $futurenews4 = Permission::create([
            'name'          => 'destroy-futurenews',
            'display_name'  => 'futurenews Silme',
            'is_active'     => 1,
        ]);

        $futurenews5 = Permission::create([
            'name'          => 'show-futurenews',
            'display_name'  => 'futurenews Gösterme',
            'is_active'     => 1,
        ]);

        //newscategory
        $newscategory1 = Permission::create([
            'name'          => 'index-newscategory',
            'display_name'  => 'newscategory  Listeleme',
            'is_active'     => 1,
        ]);

        $newscategory2 = Permission::create([
            'name'          => 'create-newscategory',
            'display_name'  => 'newscategory Oluşturma',
            'is_active'     => 1,
        ]);

        $newscategory3 = Permission::create([
            'name'          => 'edit-newscategory',
            'display_name'  => 'newscategory Düzenleme',
            'is_active'     => 1,
        ]);

        $newscategory4 = Permission::create([
            'name'          => 'destroy-newscategory',
            'display_name'  => 'newscategory Silme',
            'is_active'     => 1,
        ]);

        $newscategory5 = Permission::create([
            'name'          => 'show-newscategory',
            'display_name'  => 'newscategory Gösterme',
            'is_active'     => 1,
        ]);

        //newssource
        $newssource1 = Permission::create([
            'name'          => 'index-newssource',
            'display_name'  => 'newssource  Listeleme',
            'is_active'     => 1,
        ]);

        $newssource2 = Permission::create([
            'name'          => 'create-newssource',
            'display_name'  => 'newssource Oluşturma',
            'is_active'     => 1,
        ]);

        $newssource3 = Permission::create([
            'name'          => 'edit-newssource',
            'display_name'  => 'newssource Düzenleme',
            'is_active'     => 1,
        ]);

        $newssource4 = Permission::create([
            'name'          => 'destroy-newssource',
            'display_name'  => 'newssource Silme',
            'is_active'     => 1,
        ]);

        $newssource5 = Permission::create([
            'name'          => 'show-newssource',
            'display_name'  => 'newssource Gösterme',
            'is_active'     => 1,
        ]);

        //news
        $news1 = Permission::create([
            'name'          => 'index-news',
            'display_name'  => 'news  Listeleme',
            'is_active'     => 1,
        ]);

        $news2 = Permission::create([
            'name'          => 'create-news',
            'display_name'  => 'news Oluşturma',
            'is_active'     => 1,
        ]);

        $news3 = Permission::create([
            'name'          => 'edit-news',
            'display_name'  => 'news Düzenleme',
            'is_active'     => 1,
        ]);

        $news4 = Permission::create([
            'name'          => 'destroy-news',
            'display_name'  => 'news Silme',
            'is_active'     => 1,
        ]);

        $news5 = Permission::create([
            'name'          => 'show-news',
            'display_name'  => 'news Gösterme',
            'is_active'     => 1,
        ]);

        //newswidgetmanager
        $newswidgetmanager1 = Permission::create([
            'name'          => 'index-newswidgetmanager',
            'display_name'  => 'newswidgetmanager  Listeleme',
            'is_active'     => 1,
        ]);

        $newswidgetmanager2 = Permission::create([
            'name'          => 'create-newswidgetmanager',
            'display_name'  => 'newswidgetmanager Oluşturma',
            'is_active'     => 1,
        ]);

        $newswidgetmanager3 = Permission::create([
            'name'          => 'edit-newswidgetmanager',
            'display_name'  => 'newswidgetmanager Düzenleme',
            'is_active'     => 1,
        ]);

        $newswidgetmanager4 = Permission::create([
            'name'          => 'destroy-newswidgetmanager',
            'display_name'  => 'newswidgetmanager Silme',
            'is_active'     => 1,
        ]);

        $newswidgetmanager5 = Permission::create([
            'name'          => 'show-newswidgetmanager',
            'display_name'  => 'newswidgetmanager Gösterme',
            'is_active'     => 1,
        ]);

        //photocategory
        $photocategory1 = Permission::create([
            'name'          => 'index-photocategory',
            'display_name'  => 'photocategory  Listeleme',
            'is_active'     => 1,
        ]);

        $photocategory2 = Permission::create([
            'name'          => 'create-photocategory',
            'display_name'  => 'photocategory Oluşturma',
            'is_active'     => 1,
        ]);

        $photocategory3 = Permission::create([
            'name'          => 'edit-photocategory',
            'display_name'  => 'photocategory Düzenleme',
            'is_active'     => 1,
        ]);

        $photocategory4 = Permission::create([
            'name'          => 'destroy-photocategory',
            'display_name'  => 'photocategory Silme',
            'is_active'     => 1,
        ]);

        $photocategory5 = Permission::create([
            'name'          => 'show-photocategory',
            'display_name'  => 'photocategory Gösterme',
            'is_active'     => 1,
        ]);

        //photogallery
        $photogallery1 = Permission::create([
            'name'          => 'index-photogallery',
            'display_name'  => 'photogallery  Listeleme',
            'is_active'     => 1,
        ]);

        $photogallery2 = Permission::create([
            'name'          => 'create-photogallery',
            'display_name'  => 'photogallery Oluşturma',
            'is_active'     => 1,
        ]);

        $photogallery3 = Permission::create([
            'name'          => 'edit-photogallery',
            'display_name'  => 'photogallery Düzenleme',
            'is_active'     => 1,
        ]);

        $photogallery4 = Permission::create([
            'name'          => 'destroy-photogallery',
            'display_name'  => 'photogallery Silme',
            'is_active'     => 1,
        ]);

        $photogallery5 = Permission::create([
            'name'          => 'show-photogallery',
            'display_name'  => 'photogallery Gösterme',
            'is_active'     => 1,
        ]);

        //photo
        $photo1 = Permission::create([
            'name'          => 'index-photo',
            'display_name'  => 'photo  Listeleme',
            'is_active'     => 1,
        ]);

        $photo2 = Permission::create([
            'name'          => 'create-photo',
            'display_name'  => 'photo Oluşturma',
            'is_active'     => 1,
        ]);

        $photo3 = Permission::create([
            'name'          => 'edit-photo',
            'display_name'  => 'photo Düzenleme',
            'is_active'     => 1,
        ]);

        $photo4 = Permission::create([
            'name'          => 'destroy-photo',
            'display_name'  => 'photo Silme',
            'is_active'     => 1,
        ]);

        $photo5 = Permission::create([
            'name'          => 'show-photo',
            'display_name'  => 'photo Gösterme',
            'is_active'     => 1,
        ]);

        //recommendationnews
        $recommendationnews1 = Permission::create([
            'name'          => 'index-recommendationnews',
            'display_name'  => 'recommendationnews  Listeleme',
            'is_active'     => 1,
        ]);

        $recommendationnews2 = Permission::create([
            'name'          => 'create-recommendationnews',
            'display_name'  => 'recommendationnews Oluşturma',
            'is_active'     => 1,
        ]);

        $recommendationnews3 = Permission::create([
            'name'          => 'edit-recommendationnews',
            'display_name'  => 'recommendationnews Düzenleme',
            'is_active'     => 1,
        ]);

        $recommendationnews4 = Permission::create([
            'name'          => 'destroy-recommendationnews',
            'display_name'  => 'recommendationnews Silme',
            'is_active'     => 1,
        ]);

        $recommendationnews5 = Permission::create([
            'name'          => 'show-recommendationnews',
            'display_name'  => 'recommendationnews Gösterme',
            'is_active'     => 1,
        ]);

        //videocategory
        $videocategory1 = Permission::create([
            'name'          => 'index-videocategory',
            'display_name'  => 'videocategory  Listeleme',
            'is_active'     => 1,
        ]);

        $videocategory2 = Permission::create([
            'name'          => 'create-videocategory',
            'display_name'  => 'videocategory Oluşturma',
            'is_active'     => 1,
        ]);

        $videocategory3 = Permission::create([
            'name'          => 'edit-videocategory',
            'display_name'  => 'videocategory Düzenleme',
            'is_active'     => 1,
        ]);

        $videocategory4 = Permission::create([
            'name'          => 'destroy-videocategory',
            'display_name'  => 'videocategory Silme',
            'is_active'     => 1,
        ]);

        $videocategory5 = Permission::create([
            'name'          => 'show-videocategory',
            'display_name'  => 'videocategory Gösterme',
            'is_active'     => 1,
        ]);

        //videogallery
        $videogallery1 = Permission::create([
            'name'          => 'index-videogallery',
            'display_name'  => 'videogallery  Listeleme',
            'is_active'     => 1,
        ]);

        $videogallery2 = Permission::create([
            'name'          => 'create-videogallery',
            'display_name'  => 'videogallery Oluşturma',
            'is_active'     => 1,
        ]);

        $videogallery3 = Permission::create([
            'name'          => 'edit-videogallery',
            'display_name'  => 'videogallery Düzenleme',
            'is_active'     => 1,
        ]);

        $videogallery4 = Permission::create([
            'name'          => 'destroy-videogallery',
            'display_name'  => 'videogallery Silme',
            'is_active'     => 1,
        ]);

        $videogallery5 = Permission::create([
            'name'          => 'show-videogallery',
            'display_name'  => 'videogallery Gösterme',
            'is_active'     => 1,
        ]);

        //video
        $video1 = Permission::create([
            'name'          => 'index-video',
            'display_name'  => 'video  Listeleme',
            'is_active'     => 1,
        ]);

        $video2 = Permission::create([
            'name'          => 'create-video',
            'display_name'  => 'video Oluşturma',
            'is_active'     => 1,
        ]);

        $video3 = Permission::create([
            'name'          => 'edit-video',
            'display_name'  => 'video Düzenleme',
            'is_active'     => 1,
        ]);

        $video4 = Permission::create([
            'name'          => 'destroy-video',
            'display_name'  => 'video Silme',
            'is_active'     => 1,
        ]);

        $video5 = Permission::create([
            'name'          => 'show-video',
            'display_name'  => 'video Gösterme',
            'is_active'     => 1,
        ]);



        $first_user = User::find(1);
        $super_admin = Role::find(1);

        $super_admin->permissions()->attach($futurenews1);
        $super_admin->permissions()->attach($futurenews2);
        $super_admin->permissions()->attach($futurenews3);
        $super_admin->permissions()->attach($futurenews4);
        $super_admin->permissions()->attach($futurenews5);
        $super_admin->permissions()->attach($newscategory1);
        $super_admin->permissions()->attach($newscategory2);
        $super_admin->permissions()->attach($newscategory3);
        $super_admin->permissions()->attach($newscategory4);
        $super_admin->permissions()->attach($newscategory5);
        $super_admin->permissions()->attach($newssource1);
        $super_admin->permissions()->attach($newssource2);
        $super_admin->permissions()->attach($newssource3);
        $super_admin->permissions()->attach($newssource4);
        $super_admin->permissions()->attach($newssource5);
        $super_admin->permissions()->attach($news1);
        $super_admin->permissions()->attach($news2);
        $super_admin->permissions()->attach($news3);
        $super_admin->permissions()->attach($news4);
        $super_admin->permissions()->attach($news5);
        $super_admin->permissions()->attach($newswidgetmanager1);
        $super_admin->permissions()->attach($newswidgetmanager2);
        $super_admin->permissions()->attach($newswidgetmanager3);
        $super_admin->permissions()->attach($newswidgetmanager4);
        $super_admin->permissions()->attach($newswidgetmanager5);
        $super_admin->permissions()->attach($photocategory1);
        $super_admin->permissions()->attach($photocategory2);
        $super_admin->permissions()->attach($photocategory3);
        $super_admin->permissions()->attach($photocategory4);
        $super_admin->permissions()->attach($photocategory5);
        $super_admin->permissions()->attach($photogallery1);
        $super_admin->permissions()->attach($photogallery2);
        $super_admin->permissions()->attach($photogallery3);
        $super_admin->permissions()->attach($photogallery4);
        $super_admin->permissions()->attach($photogallery5);
        $super_admin->permissions()->attach($photo1);
        $super_admin->permissions()->attach($photo2);
        $super_admin->permissions()->attach($photo3);
        $super_admin->permissions()->attach($photo4);
        $super_admin->permissions()->attach($photo5);
        $super_admin->permissions()->attach($recommendationnews1);
        $super_admin->permissions()->attach($recommendationnews2);
        $super_admin->permissions()->attach($recommendationnews3);
        $super_admin->permissions()->attach($recommendationnews4);
        $super_admin->permissions()->attach($recommendationnews5);
        $super_admin->permissions()->attach($videocategory1);
        $super_admin->permissions()->attach($videocategory2);
        $super_admin->permissions()->attach($videocategory3);
        $super_admin->permissions()->attach($videocategory4);
        $super_admin->permissions()->attach($videocategory5);
        $super_admin->permissions()->attach($videogallery1);
        $super_admin->permissions()->attach($videogallery2);
        $super_admin->permissions()->attach($videogallery3);
        $super_admin->permissions()->attach($videogallery4);
        $super_admin->permissions()->attach($videogallery5);
        $super_admin->permissions()->attach($video1);
        $super_admin->permissions()->attach($video2);
        $super_admin->permissions()->attach($video3);
        $super_admin->permissions()->attach($video4);
        $super_admin->permissions()->attach($video5);

    }
}