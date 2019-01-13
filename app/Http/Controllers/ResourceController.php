<?php

namespace App\Http\Controllers;

use App\FlowResources;
use App\Resource;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{

    public function index(){

        $resources = Resource::paginate(5);

        return view('resource.index', array('resources'=>$resources));

    }

    public function show($id){

       $resource = Resource::find($id);

       $flowresources = (object) FlowResources::where('resource_id','=',$id)
                                                ->join('users', 'flow_resources.user_id', '=', 'users.id')
                                                ->get();


       return view('resource.show',['resource' => $resource,
                                         'flowresources' => $flowresources]);

    }

    public function create(){

        if (!Auth::check()) {
            return redirect ('login');

        }

        return view('resource.create');

    }

    public function store(Request $request){

        if (!Auth::check()) {
            return redirect ('login');

        }

        $this->validate($request, [
                                    'description' => 'required|min:3',
                                    'quantity' => 'required|min:1',
                                   ]);

        $resource = new Resource();
        $resource->description = $request->input('description');
        $resource->quantity = $request->input('quantity');
        $resource->note = $request->input('note');

        if($resource->save()){
           return redirect('resources');

        }

    }

    public function edit($id){

        if (!Auth::check()) {
            return redirect ('login');

        }

        $resource = Resource::find($id);

        return view('resource.edit')->with('resource', $resource);

    }

    public function update(Request $request, $id){

        if (!Auth::check()) {
            return redirect ('login');

        }

        $resource = Resource::find($id);

        $this->validate($request, [
            'description' => 'required|min:3',
        ]);

        $resource->description = $request->input('description');
        $resource->note = $request->input('note');
        $resource->save();

        Session::flash('mensagem', 'Recurso atualizado com sucesso.');
        return redirect('resources');

    }

    public function destroy($id){

        if (!Auth::check()) {
            return redirect ('login');

        }

        $resource = Resource::find($id);
        $resource->delete();
        Session::flash('mensagem', 'Recurso excluído com sucesso.');

        return redirect()->back();
    }


}
