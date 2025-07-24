<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category',
        'priority',
        'announcement_date',
        'valid_until',
        'is_published',
        'is_featured',
        'attachment_url',
        'external_link',
    ];

    protected $casts = [
        'announcement_date' => 'date',
        'valid_until' => 'date',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('valid_until')
                ->orWhere('valid_until', '>=', now()->toDateString());
        });
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors
    protected function categoryLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => match ($this->category) {
                'kegiatan' => 'Kegiatan Sekolah',
                'ujian' => 'Ujian',
                'libur' => 'Libur',
                'ppdb' => 'PPDB',
                'umum' => 'Umum',
                default => 'Lainnya',
            },
        );
    }

    protected function priorityLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => match ($this->priority) {
                'low' => 'Rendah',
                'normal' => 'Normal',
                'high' => 'Tinggi',
                'urgent' => 'Mendesak',
                default => 'Normal',
            },
        );
    }

    protected function priorityColor(): Attribute
    {
        return Attribute::make(
            get: fn() => match ($this->priority) {
                'low' => 'gray',
                'normal' => 'blue',
                'high' => 'yellow',
                'urgent' => 'red',
                default => 'blue',
            },
        );
    }

    protected function categoryColor(): Attribute
    {
        return Attribute::make(
            get: fn() => match ($this->category) {
                'kegiatan' => 'green',
                'ujian' => 'red',
                'libur' => 'purple',
                'ppdb' => 'blue',
                'umum' => 'gray',
                default => 'gray',
            },
        );
    }
}
