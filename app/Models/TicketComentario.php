<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Ticket;

class TicketComentario extends Model
{
    use SoftDeletes;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket_comentarios';

    protected $fillable = [
        'ticket_id',
        'usuario_id',
        'comentario'
    ];

    public function users() {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function tickets() {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
