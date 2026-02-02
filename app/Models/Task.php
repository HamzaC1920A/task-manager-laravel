<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Les attributs qui peuvent être assignés en masse
     * (protection contre les injections)
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_completed',
    ];

    /**
     * Les attributs qui doivent être castés (convertis)
     */
    protected $casts = [
        'is_completed' => 'boolean',
    ];
    /**
     * Relation : Une tâche appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
