<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::with(['users'])->orderBy('created_at')->get();

        return view('event.index', ['events' => $event]);
    }

    public function create()
    {
        $view = view('event.form');
        $view->event = new Event;

        return $view;
    }

    public function edit($id)
    {
        $view = view('event.form');
        $view->event = Event::findOrFail($id);

        return $view;
    }

    public function show($id)
    {
        $view = view('event.show');
        $view->event = Event::findOrFail($id);
        $view->users = User::where('event_id', $id)->paginate(20);

        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        $event = $request->id ? Event::findOrFail($request->id) : new Event;
        $event->name = $request->name;
        $event->date = $request->date;
        $event->description = $request->description;
        
        $event->save();
        
        return redirect('event')->with(['success' => 'Berhasil tambah event']);
    }

    public function remove($id)
    {
        $model = Event::findOrFail($id);
        $model->delete();

        return redirect('event')->with(['success' => 'Berhasil hapus event']);
    }
}
