<?php

public function edit($id)
    {
        $userData = UserData::find($id);
        return view('userData.edit',compact('userData','id'));
    }

public function update($id)
    {
        $userData = UserData::find($id);
        $userData->type = request('type');
        $userData->name = request('name');
        $userData->email = request('email');
        $userData->phone = request('phone');
        $userData->city = request('city');
        
        $userData->save();
       
        return json_encode(array('statusCode'=>200));
      
    }
    