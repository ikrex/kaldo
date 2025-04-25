<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * A tömeges feltöltésre használható attribútumok.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'is_completed',
        'contact_message_id',
        'user_id'
    ];

    /**
     * A típuskonvertálni kívánt attribútumok.
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'datetime',
        'is_completed' => 'boolean',
    ];

    /**
     * Get the contact message that the task belongs to.
     */
    public function contactMessage()
    {
        return $this->belongsTo(ContactMessage::class);
    }

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
