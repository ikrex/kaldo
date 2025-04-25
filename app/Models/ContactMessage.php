<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    /**
     * A tömeges feltöltésre használható attribútumok.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'notes',
        'status' // 'new', 'in_progress', 'completed', 'archived'
    ];

    /**
     * A típuskonvertálni kívánt attribútumok.
     *
     * @var array
     */
    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Get the tasks associated with this contact message.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
