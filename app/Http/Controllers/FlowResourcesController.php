<?php

namespace App\Http\Controllers;

use App\FlowResources;
use App\Resource;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;


class FlowResourcesController extends Controller
{

    public function index(){
        return 'Histórico de entradas e saídas';
    }

    public function createFlow($resource_id){

        $resource = Resource::find($resource_id);

        if (!Auth::check()) {
            return redirect ('login');

        }

        return view('flowresources.create')->with('resource', $resource);

    }

    public function store(Request $request){

        if (!Auth::check()) {
            return redirect ('login');

        }

        $this->validate($request, [
            'quantity' => 'required|min:1',
        ]);

        $resource = Resource::find($request->input('resource_id'));

        $resourceQuantity = Resource::updateQuantity($request->input('type_flow'),
            $resource->quantity,
            $request->input('quantity'));

        if($resourceQuantity < 0){
            Session::flash('mensagem', 'Quantidade menor que a quantidade atual.');

            return view('flowresources.create')->with('resource', $resource);

        }

        $resource->quantity = $resourceQuantity;

        $resourceFlow = new FlowResources();
        $resourceFlow->resource_id = $request->input('resource_id');
        $resourceFlow->type_flow = $request->input('type_flow');
        $resourceFlow->quantity = $request->input('quantity');
        $resourceFlow->user_id = Auth::id();


        if($resourceFlow->save()){

            $resource->save();

        }

        return redirect('resources');

    }
}
