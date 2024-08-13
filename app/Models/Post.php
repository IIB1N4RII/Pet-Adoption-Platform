<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function favoritedByUsers()
    {
    return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function location()
    {
    return $this->belongsTo(Location::class);
    }

    public function reports()
    {
    return $this->hasMany(Report::class);
    }

    protected $fillable = ['name' , 'description' ,'pet_image' ,'age' , 'gender' , 'animal_type' , 'location_id' ,
    'is_adopted' ,'size' , 'color' , 'breed' , 'create_at' , 'update_at' ];

    public $timestamps = true;

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
                
                $query->where('name', 'like', '%' . $search . '%');
             
            })
                ->when($filters['animal_type'] ?? null, function ($query, $animal_type) {
                    if ($animal_type !== 'any') {
                    $query->where('animal_type', $animal_type);
            }
            })
                ->when($filters['age'] ?? null, function ($query, $age) {
                    if ($age !== 'any') {
                    $query->where('age', $age);
            }
            })
                ->when($filters['color'] ?? null, function ($query, $color) {
                    if ($color !== 'any') {
                    $query->where('color', $color);
            }
            })
                ->when($filters['size'] ?? null, function ($query, $size) {
                    if ($size !== 'any') {
                    $query->where('size', $size);
            }
            })
                ->when($filters['gender'] ?? null, function ($query, $gender) {
                    if ($gender !== 'any') {
                    $query->where('gender', $gender);
            }
            })
                ->when($filters['location_id'] ?? null, function ($query, $location_id) {
                    $query->whereHas('location', function ($query) use ($location_id) {
                    $query->where('id', $location_id);
                    });
            });
                

    }

    

}

    
