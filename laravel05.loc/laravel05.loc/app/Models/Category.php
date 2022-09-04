<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
//    protected $guarded = ['id']; указываем набор полей которые менять нельзя.
//    protected $table = 'catalog_categories'; меняет имя таблицы.
//    protected $primaryKey = 'category_id'; указывает поле первычным ключом.
}
