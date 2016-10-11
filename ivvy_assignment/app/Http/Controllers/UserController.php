<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\User_files;
use Input;
use Validator;
use Session;
use Redirect;
use Carbon\Carbon;
use App\Http\Requests\CreateUserFormRequest;
use App\Http\Requests\EditUserFormRequest;

class UserController extends Controller
{   
    /**
     * List All Users
     * @return \Illuminate\Http\Response
     */
    public function manageUser()
    {   
        return view('manage-user');
    }

    /**
     * Create a new user
     */
    public function createUser()
    {
        return view('create-user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = User::latest()->paginate(5);
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateUserFormRequest $form)
    {   
          $create = User::create($request->all());
          $user_id = $create->id;

          $this->_process_zip($user_id);

          Session::flash('success', 'User Created Successfully'); 

          return redirect('manage-users');
    }

    /**
     * Edit the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, EditUserFormRequest $form)
    {
        $edit = User::find($id)->update($request->all());
        return redirect('manage-users');
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $data['user'] = User::find($id);
        return view('edit-user', $data);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        User::find($id)->delete();
        return response()->json(['done']);
    }

    /**
     * Process the zip file and insert file data in db
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    private function _process_zip($user_id)
    {
        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('user_files')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension; 
        
        //Move Uploaded file
        Input::file('user_files')->move($destinationPath, $fileName);
        
        $now = Carbon::now('utc')->toDateTimeString();

        $zip = new \ZipArchive();

        $uploaded_file_path = public_path("uploads/".$fileName);

        if ($zip->open($uploaded_file_path) === TRUE) {

            if ($zip->numFiles>0){

                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $filename = $zip->getNameIndex($i);
                    $files_array[$i]['file_name'] = $filename;
                    $files_array[$i]['user_id'] = $user_id;
                    $files_array[$i]['created_at'] = $now;
                    $files_array[$i]['updated_at'] = $now;
                }

            }

            $user_files = User_files::insert($files_array);
            
            //Extract the files to users directory
            if ($user_files){
                $zip->extractTo(public_path().'/uploads/'.$user_id);
            }

            $zip->close();

            return true;
        }

        return false;
    }
}