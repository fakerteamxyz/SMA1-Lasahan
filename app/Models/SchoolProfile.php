<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'content',
        'is_array',
        'order'
    ];

    protected $casts = [
        'is_array' => 'boolean',
        'content' => 'array'
    ];

    /**
     * Get a specific profile by key
     *
     * @param string $key
     * @return mixed
     */
    public static function getByKey(string $key)
    {
        // Ensure we're not getting cached results by using query builder freshly
        return self::where('key', $key)->first();
    }

    /**
     * Get content value (array or text)
     *
     * @return mixed
     */
    public function getValueAttribute()
    {
        return $this->is_array ? $this->content : $this->content;
    }
}
