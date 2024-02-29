<?php

namespace App\Models\revisionca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisionca extends Model
{
    use HasFactory;

    protected $fillable=['ruta', 'codigo','lecturaan','consumoan','lecturaac','consumoac','promedio','causadenol','nombre','estrato', 'direccion','nmedidor','estado','observacion'];
    //protected $guarded = [];

    /*public function scopeFilter($query, $filters){
        $query ->when($filters['category'] ?? null, function($query, $category){
            $query->whereIn('category_id', $category);
          })->when($filters['order'] ?? 'new', function($query,$order) {
             $sort= $order === 'new' ? 'desc' : 'asc';
             $query->orderBy('created_at',$sort);
          })->when($filters['tag'] ?? null, function($query,$tag){
            $query->whereHas('tags', function($query) use ($tag) {
                $query->where('tags.name',$tag);
            });
          })->when($filters['textobuscar'] ?? null, function($query,$textobuscar){   
            $query->where( function($query)  use ($textobuscar){
                $query->where('name','like','%'. $textobuscar.'%')
                  ->orWhere('body','like','%'. $textobuscar.'%')
                  ->orWhere('autor','like','%'. $textobuscar.'%');
            });

          })->when($filters['colecciones'] ?? null, function($query,$tag){
            $query->whereHas('tags', function($query) use ($tag) {
                $query->where('tags.id',$tag);
            });
          });
    }*/
    // public function scopeFilter($query, $filters){        
    //     $query ->when($filters['ruta'] ?? null, function($query, $ruta){
    //         $query->where('ruta', $ruta);
    //       });
    // }
}
