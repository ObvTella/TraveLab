<?php
namespace App\Http\Controllers;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller 
{
	/** @var destination */
	protected $destination;
	/** 
	* Create a new controller instance.
	* @return void
	*/
	public function __construct(Destination $destination) //construttore, creo un oggetto dal modello Destination
	{
		//
		$this->destination = $destination;
	}
	public function index() 
	{
		$destination = $this->destination->all();
		return $destination; //mostra tutte le destinationi
	}
	public function store(Request $request) //$request sarebbe il corpo del messaggio post (json)
	{
		// VALIDAZIONE DEGLI INGRESSI PER IL SALVATAGGIO DI UNA DESTINAZIONE
		$this->validate($request, [
		'title' => 'required|string|max:200',
		'description' => 'required|string|max:200',
		'image' => 'required|string|max:200',
		]);
        // ADESSO I VALORI IN INPUT SONO TUTTI:
        // required (ritorna errore se manca un campo) 
        // string (ritorna errore se non sono stringhe)
        // max:200 (ritorna errore se superano i 200 caratteri)


		// Crea una nuova destinatione
		$destination = $this->destination->create([
		'title' => $request->input('title'), // il campo title = campo title in input
		'description' => $request->input('description'), // il campo description = campo description in input
		'image' => $request->input('image'), // il campo image = campo image in input
		]);
		return $destination; //ritorno l'oggetto creato
	}
 
	public function update(Request $request) 
	{
		// VALIDAZIONE DEGLI INGRESSI PER LA MODIFICA DI UNA DESTINAZIONE
		$this->validate($request, [
		'iddestination' => 'required|int',
        'title' => 'required|string|max:200',
        'description' => 'required|string|max:200',
        'image' => 'required|string|max:200',
		]);

		$destination = $this->destination->findOrFail($request->input('iddestination')); // SELECT * FROM destination WHERE iddestination = (iddestination in input)
        //findOrFail = se non trova l'oggetto restituisce un exception (errore)

		// aggiorna destination
		$destination->title = $request->input('title');
		$destination->description = $request->input('description');
		$destination->image = $request->input('image');
		$destination->save(); // salvo l'oggetto con i nuovi dati
		
		/* METODO ALTERNATIVO USANDO UPDATE() INVECE DI SAVE()
		$destination->update
		(
		    ['title' => $request->input('title')],
		    ['description' => $request->input('description')],
		    ['image' => $request->input('image')],
		);
		*/
		
		return $destination;
	}
	
	
	public function detail($id) 
	{
		$destination = $this->destination->findOrFail($id); // SELECT * FROM destination WHERE iddestination = $id (variabile nell'url [/destination/$id])
		return $destination; // ritorno quello che trovo
	} 
	public function destroy($id) 
	{
		$destination = $this->destination->findOrFail($id); // SELECT * FROM destination WHERE iddestination = $id (variabile nell'url [/destination/$id])
		$destination->delete(); // cancello l'oggetto
		return "Ho cancellato: " . $destination; // ritorno un messaggio di conferma
	}
}
?> 