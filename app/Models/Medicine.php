<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function saleItems(){
        return $this->hasMany(SaleItem::class);
    }
}
