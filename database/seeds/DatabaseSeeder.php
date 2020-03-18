<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Contact;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // use facker library
        // $this->call(CompaniesTableSeeder::class);

        // // 
        // $this->call([
        //     CompaniesTableSeeder::class,
        //     ContactsTableSeeder::class,
        // ]);
        factory(Company::class, 10)->create()->each(function ($company) {
            $company->contacts()->saveMany(
                factory(Contact::class, rand(5, 10))->make()
            );
        });

    }
}
