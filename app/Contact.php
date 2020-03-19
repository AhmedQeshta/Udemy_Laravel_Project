<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Scopes\FilterScope;
use App\Scopes\SearchScope;

class Contact extends Model
{
        protected $fillable = [
                'first_name',
                'last_name',
                'email',
                'phone',
                'address',
                'company_id'
        ];
   
        public function company(){
                return $this->belongsTo(Company::class);
        }

        public function scopeLatestFirst($query)
        {
                return $query->orderBy('id', 'desc');
        }
        protected static function boot()
        {
                parent::boot();
                static::addGlobalScope(new FilterScope);
                static::addGlobalScope(new SearchScope);
        }
        
    
}