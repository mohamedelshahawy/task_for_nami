<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $clients = ClientResource::collection(Client::get());
        return $this->apiResponse($clients , 'ok', 200);
    }
    public function show($id){
        $client =Client::find($id);
        if($client){
            return $this->apiResponse(new ClientResource($client) , 'ok', 200);
        }
        
            return $this->apiResponse('null' , 'the client dosent exist', 401);

        
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required|unique:clients|max:255',
            'phone_number' => 'required|unique:clients|max:255',
        ]);
        if($validator->fails()){
            return $this->apiResponse(null ,  $validator->errors(), 200);
        }
       
        $client =Client::create($request->all());
        if($client){
            return $this->apiResponse(new ClientResource($client) , 'the client was add', 201);
        }
        
            return $this->apiResponse('null' , 'the client dosent add', 401);

        
    }
    public function update(Request $request , $id){

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required|unique:clients|max:255',
            'phone_number' => 'required|unique:clients|max:255',
        ]);
        if($validator->fails()){
            return $this->apiResponse(null ,  $validator->errors(), 400);
        }
        $client=Client::find($id);
        if(!$client){
            return $this->apiResponse('null' , 'the client dosent exist', 401);
        }
        

       
        $client->update($request->all());

        if($client){
            return $this->apiResponse(new ClientResource($client) , 'client data updated' , 200);
        }
       
            return $this->apiResponse(null , 'client data  not updated' , 404);
    }
    public function destroy($id){
        $client = Client::find($id);
        if(!$client){
            return $this->apiResponse(null , 'client not found' , 400);
        }
        $client->delete($id);
        if($client){
            return $this->apiResponse(null , 'client deleted' , 200);
        }
    }
}
