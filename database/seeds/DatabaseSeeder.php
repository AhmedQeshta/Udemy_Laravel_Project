<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Contact;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

        public function run()
        {
                 // factory(Company::class, 10)->create()->each(function ($company) {
        //     $company->contacts()->saveMany(
        //         factory(Contact::class, rand(5, 10))->make()
        //     );
        // });
        
           $users = factory(User::class, 5)->create();
   
           $users->each(function ($user) {
               $companies = $user->companies()->saveMany(
                   factory(Company::class, rand(2, 5))->make()
                );
               
               $companies->each(function ($company) use ($user) {
                   $company->contacts()->saveMany(
                       factory(Contact::class, rand(5, 10))
                           ->make()
                           ->map(function ($contact) use ($user) {
                               $contact->user_id = $user->id;
                               return $contact;
                           })
                   );
               });
            });
        }
    }
