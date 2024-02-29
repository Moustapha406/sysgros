<?php

namespace App\Http\Controllers;

use App\Models\Vi;
use Illuminate\Http\Request;

class ViController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$vis = Vi::all()->paginate(20);

        $vis = Vi::query()
            ->when(
                $request->search,
                function ($query) use ($request) {
                    $query->where('code', 'Like', '%' . $request->search . '%')
                        ->orwhere('nom', 'Like', '%' . $request->search . '%')
                        ->orwhere('zone', 'Like', '%' . $request->search . '%')
                        ->orwhere('secteur', 'Like', '%' . $request->search . '%')
                        ->orwhere('active', 'Like', '%' . $request->search . '%')
                        ->orwhere('telephone', 'Like', '%' . $request->search . '%')
                        ->orwhere('type', 'Like', '%' . $request->search . '%');
                }
            )->orderBy('code', 'desc')
            ->paginate(10);


        return view('dashboard', compact('vis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vi $vi)
    {
        return view('vis.edit', compact('vi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'active' => ['string'],
            'plafond' => ['numeric']
        ]);



        $vi = Vi::findOrFail($id);
        $vi->update([
            'plafond' => $data['plafond'],
            'active' => $data['active']
        ]);
        $vi->save;
        return redirect()->route('vis.index');
    }

    // public function update_vis(Request $request)
    // {
    //     $id = $request->input('id');
    //     $active = $request->input('active');
    //     $vi = Vi::findOrFail($id);
    //     $vi->active = $active;
    //     $vi->save();

    //     return response()->json(['success' => true]);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
