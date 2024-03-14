<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePruebaRequest;
use App\Models\PruebaModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use App\Http\Requests\UpdatePruebaRequest;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private PruebaModel $prueba) {}
    public function index(): Response
    {
        /*$projects = Project::with('user:id,name')->paginate(2);
        return inertia('Projects/Index', [
            'projects' => $projects
        ]);*/

        $pruebas= $this->getPruebas();


        return inertia('Pruebalista', [
                'pruebas' => $pruebas
            ]);
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
    public function store(StorePruebaRequest $request)
    {
        /*$prueba =new PruebaModel();

        $prueba->input1 = $request->input1;
        $prueba->input2 = $request->input2;
        $prueba->input2 = $request->input1;*/
        try{
            //$prueba = $this->prueba->create($request->all());
            $prueba = PruebaModel::create($request->validated());
            return $request;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function getPruebas(){
        $pruebas = PruebaModel::paginate(10);
        return $pruebas;
    }

    /**
     * Display the specified resource.
     */
    public function show(PruebaModel $prueba)
    {
    }

    /**     * Show the form for editing the specified resource.
     */
    public function edit(Request $prueba)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePruebaRequest $request, PruebaModel $prueba)
    {
        $prueba->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $prueba)
    {
//        dd($prueba);
         PruebaModel::where('id_prueba',$prueba->id_prueba)->delete();
    }
}
