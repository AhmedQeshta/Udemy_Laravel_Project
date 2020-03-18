<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
}


/*
Company::all()
Company::take(3)->get()
Company::first()
Company::find(1)
Company::find([1, 2, 3])
Company::where('website', 'kreiger.net')->first()
Company::whereWebsite('kreiger.net')->first()

# create new record

$company = new Company()
$company->name = "My company"
$company->address = "My Address"
$company->email = "mycompany@test.com"
$company->website = "mywebsite.com"
$company->save()

# update
$company->website = "mywebsitecompany.com"
$company->save()

# delete record
$company = Company::find(1)

$company->delete()
Company::destroy(11)
Company::destroy([7, 8, 9])
*/
