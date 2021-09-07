<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Stock;
class Product extends Model
{
    use HasFactory;
    protected $guarded =[];


    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
