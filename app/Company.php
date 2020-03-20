<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address', 
        'email',
        'website'
    ];

    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function userCompanies()
    {
        return self::where('user_id', auth()->id())->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
    }

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
// by tinker 

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
