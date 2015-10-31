<?php

namespace App\Http\Controllers;

use App\Events\TermCreated;
use App\Events\TermDeleted;
use App\Events\TermUpdated;
use App\Term;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $terms = Term::orderBy('name','asc')->get();

        if ($request->ajax()) {
            return $terms;
        }

        return view('terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:terms|max:100',
            'definition' => 'required',
        ]);

        $term = Term::create($request->all());

        Event::fire(new TermCreated($term));

        if ( $request->ajax() ) {
            return compact('term');
        }

        return redirect()->route('terms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Term::findOrFail($id);

        return view('terms.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* @var \App\Term */
        $term = Term::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:100',
            'definition' => 'required',
        ]);

        $term->fill($request->all())
            ->save();

        Event::fire(new TermUpdated($term));

        if ($request->ajax()) {
            return compact('term');
        }

        return redirect()->route('terms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $success = Term::destroy($id);

        if ( ! $success && ! $request->ajax()) {
            return redirect()->route('term.index')
                             ->with('errors', 'Term could not be deleted!');
        }

        Event::fire(new TermDeleted($id));

        if ($request->ajax()) {
            return compact('success','id');
        }

        return redirect()->route('terms')
                         ->with('success', 'Term deleted!');
    }

}
