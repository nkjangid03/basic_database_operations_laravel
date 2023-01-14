<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
class UserController extends Controller
{

    public function index() {
        $results = $this->user->get();
        return view('welcome',compact('results'));
    }

	public function insert(Request $request){
		$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }else{
			$user = $this->user;
			$user->name = $request->input('name');
			$user->email = $request->input('email');
			$user->save();
			return redirect('/')->with('message', 'Data inserted successfully!');
		}
	}

	public function update(Request $request){

	    $validator = Validator::make($request->all(), [
            'update_id' => 'required|exists:users,id',
            'update_name' => 'required|string|max:255',
			'update_email' => 'required|email|unique:users,email,'.$request->input('update_id'),
        ],[
            'update_id.required' => 'The id field is required.',
            'update_name.required' => 'The name field is required.',
            'update_name.string' => 'The name must be a string.',
            'update_name.max' => 'The name may not be greater than 255 characters.',
            'update_email.required' => 'The email field is required.',
            'update_email.email' => 'The email must be a valid email address.',
            'update_email.unique' => 'The email has already been taken.',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $update = $this->user->find($request->input('update_id'));
            $update->name = $request->input('update_name');
            $update->email = $request->input('update_email');
            $update->save();
            return redirect('/')->with('message', 'Data updated successfully!');
		}
	}

	public function delete(Request $request){
		$validator = Validator::make($request->all(), [
            'delete-id' => 'required|exists:users,id'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $delete = $this->user->find($request->input('delete-id'));
            $delete->delete();
            return redirect('/')->with('message', 'Data deleted successfully!');
		}
	}


}
