<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
          
           $taskss = task::all();
           return View::make('tasks.index')
               ->with('tasks', $tasks);
    
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'tasks_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('tasks/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $tasks = new task;
            $tasks->name = Input::get('name');
            $tasks->description  = Input::get('descriptiom');
            $tasks->assignment = Input::get('assignment');
            $tasks->status = Input::get('status');
            $tasks->date_of_creation = Input::get('date_of_creation');

            $tasks->save();

            // redirect
            Session::flash('message', 'Successfully created task!');
            return Redirect::to('tasks');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        // get the tasks
        $tasks = tasks::find($id);

        // show the view and pass the tasks to it
        return View::make('tasks.show')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
