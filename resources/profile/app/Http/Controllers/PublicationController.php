<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    } 
    
    public function index()
    {
        $publication = Publication::latest()->paginate();
       return view('publications.index',compact('publication'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        $FormFields = $request->validated();
        if ($request->hasFile('image')) {
            $FormFields['image'] =  $request->file('image')->store('publication','public');
        }
        $FormFields['profile_id'] = Auth::id();
            Publication::create($FormFields);
            return redirect()->route('publications.index')->with('success','Votre Publication est bien ajouter !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $this->authorize('update',$publication);
        return view('publications.edit',compact('publication'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        Gate::authorize('update-publication',$publication);

        $FormFields = $request->validated();
        if ($request->hasFile('image')) {
            $FormFields['image'] =  $request->file('image')->store('publication','public');
        }
        $publication->fill($FormFields)->save();
        return to_route('publications.index')->with('success','Votre publication est bien modifier !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publications.index')->with('success','La Publication a Bien Ete Supprime');
    }
}
