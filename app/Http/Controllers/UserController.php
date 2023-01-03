<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Session;
class UserController extends Controller
{

    public function index() {
        $results = $this->user->get();
    return view('welcome',compact('results'));
    }

	public function insert(Request $request){
		$validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('')
                        ->withErrors($validator)
                        ->withInput();
        }else{
			// Retrieve the validated input...
			$validated = $validator->validated();
			$fname = $validated['fname'];
			$lname = $validated['lname'];

			$today = date("Y-m-d H:i:s");     // 2019-10-30 22:42:18(MySQL DATETIME format)

			$user = $this->user;
			$user->fname = $fname;
			$user->lname = $lname;
			$user->save();

			Session::flash('message', trans("Data insert successfully."));
			return redirect('');

		}
	}

	public function update(Request $request){
	    $validator = Validator::make($request->all(), [
            'id' => 'required',
            'choose-name' => 'required',
			'update-value'=> 'required',
        ]);
        if ($validator->fails()) {
            return redirect('')
                        ->withErrors($validator)
                        ->withInput();
        }else{
			// Retrieve the validated input...
			$validated = $validator->validated();
			$id = $validated['id'];
			$chooseName = $validated['choose-name'];
			$updateValue = $validated['update-value'];

			$today = date("Y-m-d H:i:s");     // 2019-10-30 22:42:18(MySQL DATETIME format)

			if(!$this->user->find($id)){
				Session::flash('error', trans("Data not found."));
				return redirect()->back();
			}else{
				if($chooseName == 'fname'){
					$user = $this->user->where('id',$id)->update(['fname'=>$updateValue]);
					Session::flash('message', trans("Data updated successfully."));
					return redirect('');

				}else{
					$user = $this->user->where('id',$id)->update(['lname'=>$updateValue]);
					Session::flash('message', trans("Data updated successfully."));
					return redirect('');
				}
			}

		}




	}

	public function delete(Request $request){
		$validator = Validator::make($request->all(), [
            'delete-id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('')
                        ->withErrors($validator)
                        ->withInput();
        }else{
			$validated = $validator->validated();
			$id = $validated['delete-id'];

			if(!$this->user->find($id)){
				Session::flash('error', trans("Data not found."));
				return redirect()->back();
			}else{
				$this->user->find($id)->delete();
				Session::flash('message', trans("Data delete successfully."));
				return redirect('');
			}
		}
	}


}
