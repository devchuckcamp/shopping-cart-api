<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
		$this->call(AdminTableSeeder::class);
        $this->call(BuyerTableSeeder::class);
        $this->call(ProductGroupTableSeeder::class);
        $this->call(ProducTableSeeder::class);
    }
}



class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        
        User::create(['username' => 'admin', 'email' => 'admin@gmail.com', 'password' => \Hash::make('password'), 'role_id' => 1, 'status' => 1 ]);
        User::create(['username' => 'buyer1', 'email' => 'buyer1@gmail.com', 'password' => \Hash::make('password'), 'role_id' => 2, 'status' => 1 ]);
        User::create(['username' => 'buyer2', 'email' => 'buyer2@gmail.com', 'password' => \Hash::make('password'), 'role_id' => 2, 'status' => 1 ]);
        User::create(['username' => 'buyer3', 'email' => 'buyer3@gmail.com', 'password' => \Hash::make('password'), 'role_id' => 2, 'status' => 1 ]);
        
    }
}

class UserRolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_roles')->delete();
        
        UserRole::create(['id' => 1,  'name' => 'Admin'                 ]) ;
        UserRole::create(['id' => 2,  'name' => 'Buyer'                ]) ;
    }
}

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->delete();
        Admin::create([
        				'fname' => 'Admin', 
        				'mname' => 'Admin', 
        				'lname' => 'Admin',
        				'birth_date' => '1991-11-12',
        				'contact_no' => '09391721256',
        				'gender'	=> 1,
        				'address'	=> 'Admin Address',
        				'city' => 'Cebu',
        				'zip'	=> '6000',
        				'image_url'	=> '',
        				'user_id'	=> 1
        			]);
    }
}


class BuyerTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('buyers')->delete();
    	Buyer::create([
        				'fname' => 'Buyer 1', 
        				'mname' => 'Buyer 1', 
        				'lname' => 'Buyer 1',
        				'birth_date' => '01991-11-12',
        				'contact_no' => '09391721252',
        				'gender'	=> 2,
        				'address'	=> 'Buyer 1 Address',
        				'city' => 'Cebu',
        				'zip'	=> '6000',
        				'image_url'	=> '',
        				'user_id'	=> 2
        			]);

        Buyer::create([
        				'fname' => 'Buyer 2', 
        				'mname' => 'Buyer 2', 
        				'lname' => 'Buyer 2',
        				'birth_date' => '1991-11-12',
        				'contact_no' => '09391721252',
        				'gender'	=> 2,
        				'address'	=> 'Buyer 2 Address',
        				'city' => 'Cebu',
        				'zip'	=> '6000',
        				'image_url'	=> '',
        				'user_id'	=> 3
        			]);

        Buyer::create([
        				'fname' => 'Buyer 3', 
        				'mname' => 'Buyer 3', 
        				'lname' => 'Buyer 3',
        				'birth_date' => '1991-11-12',
        				'contact_no' => '09391721252',
        				'gender'	=> 1,
        				'address'	=> 'Buyer 2 Address',
        				'city' => 'Cebu',
        				'zip'	=> '6000',
        				'image_url'	=> '',
        				'user_id'	=> 4
        			]);
    }

}

class ProductGroupTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('product_groups')->delete();
    	ProductGroup::create([
    					'id'=> 1,
        				'name' => 'Furniture', 
        				'description' => 'Appliances and home ammeneties', 
        				'logo_url' => ''
        			]);
    	ProductGroup::create([
    					'id'=>2,
        				'name' => 'Electronic', 
        				'description' => 'Electronic devices and gadgets', 
        				'logo_url' => ''
        			]);
    }

}

class ProducTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('products')->delete();
    	Product::create([
        				'name' => 'Samsung Galaxy S8', 
        				'description' => 'Samsung Galaxy S Series 2017', 
        				'price' => 9000,
        				'image_url' => '',
        				'product_group_id' => 2
        			]);
    	Product::create([
        				'name' => 'Samsung Note 8', 
        				'description' => 'Samsung Note Series 2017', 
        				'price' => 1300,
        				'image_url' => '',
        				'product_group_id' => 2
        			]);
    	Product::create([
        				'name' => 'Samsung Galaxy S8 Plus', 
        				'description' => 'Samsung Galaxy S Plus Series 2017', 
        				'price' => 1100,
        				'image_url' => '',
        				'product_group_id' => 2
        			]);
    	Product::create([
        				'name' => 'Apple IPhone 8', 
        				'description' => 'Apple IPhone Series 2017', 
        				'price' => 1200,
        				'image_url' => '',
        				'product_group_id' => 2
        			]);
    	Product::create([
        				'name' => 'Apple IPhone  X', 
        				'description' => 'Apple X Series 2017', 
        				'price' => 1600,
        				'image_url' => '',
        				'product_group_id' => 2
        			]);
    	Product::create([
        				'name' => 'Apple IPhone 8 Plus', 
        				'description' => 'Apple 8 Series 2017', 
        				'price' => 1250,
        				'image_url' => '',
        				'product_group_id' => 2
        			]);
        Product::create([
                        'name' => 'Apple IPhone 6', 
                        'description' => 'Apple 6 Series 2016', 
                        'price' => 850,
                        'image_url' => '',
                        'product_group_id' => 2
                    ]);
        Product::create([
                        'name' => 'Apple IPhone 6 Plus', 
                        'description' => 'Apple Plus Series 2016', 
                        'price' => 850,
                        'image_url' => '',
                        'product_group_id' => 2
                    ]);
        Product::create([
                        'name' => 'Apple IPhone 6S Plus', 
                        'description' => 'Apple S Plus Series 2016', 
                        'price' => 950,
                        'image_url' => '',
                        'product_group_id' => 2
                    ]);


    	//Furniture
    	Product::create([
        				'name' => 'Dining Table', 
        				'description' => 'Reactangular Dining Table', 
        				'price' => 200,
        				'image_url' => '',
        				'product_group_id' => 1
        			]);
    	Product::create([
        				'name' => 'Round Table', 
        				'description' => 'Round Table', 
        				'price' => 800,
        				'image_url' => '',
        				'product_group_id' => 1
        			]);
    	Product::create([
        				'name' => 'Working Table', 
        				'description' => '7 X 5 Working Table', 
        				'price' => 600,
        				'image_url' => '',
        				'product_group_id' => 1
        			]);
    	Product::create([
        				'name' => 'Executive Office Chair', 
        				'description' => 'A comfortable office chair.', 
        				'price' => 300,
        				'image_url' => '',
        				'product_group_id' => 1
        			]);
    	Product::create([
        				'name' => 'Regular office chair', 
        				'description' => 'Affordable and comfy office chair.', 
        				'price' => 180,
        				'image_url' => '',
        				'product_group_id' => 1
        			]);
    	Product::create([
        				'name' => 'Conference Table', 
        				'description' => '10 x 5 Rectangular Table, good for conference meetings.', 
        				'price' => 1250,
        				'image_url' => '',
        				'product_group_id' => 1
        			]);
        Product::create([
                        'name' => '6 Person Cubicle Table', 
                        'description' => '10 x 5 Rectangular Table, 6 division.', 
                        'price' => 350,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '8 Person Cubicle Table', 
                        'description' => '12 x 5 Rectangular Table, 8 division.', 
                        'price' => 450,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '10  Person Cubicle Table', 
                        'description' => '15 x 5 Rectangular Table, 10 division.', 
                        'price' => 600,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '12 Person Cubicle Table', 
                        'description' => '18 x 5 Rectangular Table, 12 division.', 
                        'price' => 650,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '16 Person Cubicle Table', 
                        'description' => '23 x 5 Rectangular Table, 16 division.', 
                        'price' => 750,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '6 person Non Cubicle Table', 
                        'description' => '10 x 5 Rectangular Table.', 
                        'price' => 350,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '8 person Non Cubicle Table', 
                        'description' => '12 x 5 Rectangular Table.', 
                        'price' => 450,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '10 person Non Cubicle Table', 
                        'description' => '15 x 5 Rectangular Table.', 
                        'price' => 580,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '12 person Non Cubicle Table', 
                        'description' => '18 x 5 Rectangular Table.', 
                        'price' => 650,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
        Product::create([
                        'name' => '16 person Non Cubicle Table', 
                        'description' => '23 x 5 Rectangular Table.', 
                        'price' => 700,
                        'image_url' => '',
                        'product_group_id' => 1
                    ]);
    }



}