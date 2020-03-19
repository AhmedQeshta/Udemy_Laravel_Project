<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        
        public function scopeFilter($query)
        {
                if ($companyId = request('company_id')) {
                  $query->where('company_id', $companyId);
                }

                if ($search = request('search')) {
                  $query->where('first_name', 'LIKE', "%{$search}%");
                }

                return $query;
        }
    
}