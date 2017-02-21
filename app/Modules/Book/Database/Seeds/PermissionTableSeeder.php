<?php

namespace App\Modules\Book\Database\Seeds;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //book
        $book1 = Permission::create([
            'name'          => 'index-book',
            'display_name'  => 'book  Listeleme',
            'is_active'     => 1,
        ]);

        $book2 = Permission::create([
            'name'          => 'create-book',
            'display_name'  => 'book Oluşturma',
            'is_active'     => 1,
        ]);

        $book3 = Permission::create([
            'name'          => 'edit-book',
            'display_name'  => 'book Düzenleme',
            'is_active'     => 1,
        ]);

        $book4 = Permission::create([
            'name'          => 'destroy-book',
            'display_name'  => 'book Silme',
            'is_active'     => 1,
        ]);

        $book5 = Permission::create([
            'name'          => 'show-book',
            'display_name'  => 'book Gösterme',
            'is_active'     => 1,
        ]);

        $book6 = Permission::create([
            'name'          => 'update-book',
            'display_name'  => 'book update',
            'is_active'     => 1,
        ]);

        $book7 = Permission::create([
            'name'          => 'store-book',
            'display_name'  => 'book store',
            'is_active'     => 1,
        ]);


        //book_category
        $book_category1 = Permission::create([
            'name'          => 'index-bookcategory',
            'display_name'  => 'book_category  Listeleme',
            'is_active'     => 1,
        ]);

        $book_category2 = Permission::create([
            'name'          => 'create-bookcategory',
            'display_name'  => 'book_category Oluşturma',
            'is_active'     => 1,
        ]);

        $book_category3 = Permission::create([
            'name'          => 'edit-bookcategory',
            'display_name'  => 'book_category Düzenleme',
            'is_active'     => 1,
        ]);

        $book_category4 = Permission::create([
            'name'          => 'destroy-bookcategory',
            'display_name'  => 'book_category Silme',
            'is_active'     => 1,
        ]);

        $book_category5 = Permission::create([
            'name'          => 'show-bookcategory',
            'display_name'  => 'book_category Gösterme',
            'is_active'     => 1,
        ]);

        $book_category6 = Permission::create([
            'name'          => 'update-bookcategory',
            'display_name'  => 'book_category update',
            'is_active'     => 1,
        ]);

        $book_category7 = Permission::create([
            'name'          => 'store-bookcategory',
            'display_name'  => 'book_category store',
            'is_active'     => 1,
        ]);

        //publisher
        $publisher1 = Permission::create([
            'name'          => 'index-publisher',
            'display_name'  => 'publisher  Listeleme',
            'is_active'     => 1,
        ]);

        $publisher2 = Permission::create([
            'name'          => 'create-publisher',
            'display_name'  => 'publisher Oluşturma',
            'is_active'     => 1,
        ]);

        $publisher3 = Permission::create([
            'name'          => 'edit-publisher',
            'display_name'  => 'publisher Düzenleme',
            'is_active'     => 1,
        ]);

        $publisher4 = Permission::create([
            'name'          => 'destroy-publisher',
            'display_name'  => 'publisher Silme',
            'is_active'     => 1,
        ]);

        $publisher5 = Permission::create([
            'name'          => 'show-publisher',
            'display_name'  => 'publisher Gösterme',
            'is_active'     => 1,
        ]);

        $publisher6 = Permission::create([
            'name'          => 'update-publisher',
            'display_name'  => 'publisher update',
            'is_active'     => 1,
        ]);

        $publisher7 = Permission::create([
            'name'          => 'store-publisher',
            'display_name'  => 'publisher store',
            'is_active'     => 1,
        ]);


        //bookauthor
        $bookauthor1 = Permission::create([
            'name'          => 'index-bookauthor',
            'display_name'  => 'bookauthor  Listeleme',
            'is_active'     => 1,
        ]);

        $bookauthor2 = Permission::create([
            'name'          => 'create-bookauthor',
            'display_name'  => 'bookauthor Oluşturma',
            'is_active'     => 1,
        ]);

        $bookauthor3 = Permission::create([
            'name'          => 'edit-bookauthor',
            'display_name'  => 'bookauthor Düzenleme',
            'is_active'     => 1,
        ]);

        $bookauthor4 = Permission::create([
            'name'          => 'destroy-bookauthor',
            'display_name'  => 'bookauthor Silme',
            'is_active'     => 1,
        ]);

        $bookauthor5 = Permission::create([
            'name'          => 'show-bookauthor',
            'display_name'  => 'bookauthor Gösterme',
            'is_active'     => 1,
        ]);

        $bookauthor6 = Permission::create([
            'name'          => 'update-bookauthor',
            'display_name'  => 'bookauthor update',
            'is_active'     => 1,
        ]);

        $bookauthor7 = Permission::create([
            'name'          => 'store-bookauthor',
            'display_name'  => 'bookauthor store',
            'is_active'     => 1,
        ]);

        $super_admin = Role::find(1);

        $super_admin->permissions()->attach($book1);
        $super_admin->permissions()->attach($book2);
        $super_admin->permissions()->attach($book3);
        $super_admin->permissions()->attach($book4);
        $super_admin->permissions()->attach($book5);
        $super_admin->permissions()->attach($book6);
        $super_admin->permissions()->attach($book7);

        $super_admin->permissions()->attach($book_category1);
        $super_admin->permissions()->attach($book_category2);
        $super_admin->permissions()->attach($book_category3);
        $super_admin->permissions()->attach($book_category4);
        $super_admin->permissions()->attach($book_category5);
        $super_admin->permissions()->attach($book_category6);
        $super_admin->permissions()->attach($book_category7);

        $super_admin->permissions()->attach($publisher1);
        $super_admin->permissions()->attach($publisher2);
        $super_admin->permissions()->attach($publisher3);
        $super_admin->permissions()->attach($publisher4);
        $super_admin->permissions()->attach($publisher5);
        $super_admin->permissions()->attach($publisher6);
        $super_admin->permissions()->attach($publisher7);

        $super_admin->permissions()->attach($bookauthor1);
        $super_admin->permissions()->attach($bookauthor2);
        $super_admin->permissions()->attach($bookauthor3);
        $super_admin->permissions()->attach($bookauthor4);
        $super_admin->permissions()->attach($bookauthor5);
        $super_admin->permissions()->attach($bookauthor6);
        $super_admin->permissions()->attach($bookauthor7);

    }
}
