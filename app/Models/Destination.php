<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model 
{
    // definisco il modello con gli attributi della tabella destination

    // specifico la tabella o in default sara Destinations (nome tabella + s)
    protected $table = 'destination';

    // specifico la chiave primaria o in default sara id
    protected $primaryKey = 'iddestination';

    // levo created_at e updated_at che sono campi di default per data creazione e data ultima modifica
    public $timestamps = false; 

     // specifico in $fillable quali possono essere usati per inserimenti nel database dall'api
    protected $fillable = [
    'title',
    'description',
    'image',
    ];  

    // se volessi nascondere qualche dato nelle risposte dell'api:
    // protected $hidden = ['nome campo'];
    // solitamente le password hanno questa proprieta
}
?> 