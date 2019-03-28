<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Form;
use Illuminate\Http\Request;


class FormController extends Controller
{

    public function index(Request $request)
    {
        $search_q = urlencode($request->input('cari'));

        if(!empty($search_q))
             $forms = Form::where('title', 'like', '%'.$search_q.'%')->get();
        else
        $forms = Form::all();

        return view('welcome', compact('forms'));
    }

    public function create(){
        
        return view('form.create');
    }  
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'subject' => 'required|min:5'
        ]);

        $slug = str_slug($request->title, '-');

        //cek slug ngga kembar
        if(Form::where('slug', $slug)->first() != null)
            $slug = $slug . '-' .time();

        $form = Form::create([
            'title' => $request->title,
            'slug' => $slug,
            'subject' => $request->subject,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/')->with('msg', 'Pertanyaan Berhasil diBuat');
    }


    public function singgle($slug)
    {
                // findOrFail
        $form = Form::where('slug', $slug)->get();
        return view('form.singgle', compact('form'));
    }

    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();
       
        return redirect('/')->with('msg-hapus', 'Pertanyaan Berhasil Di Hapus');
    }

    public function edit($slug)
    {
        $form = Form::where('slug', $slug)->get();
        return view('form.edit', compact('form'));
    }

    public function update(Request $request, $id){
       
        $this->validate($request, [
            'title' => 'required|min:3',
            'subject' => 'required|min:5'
        ]);

        $form =Form::findOrFail($id);
        
        $form->update([
            'title' => $request->title,
            'subject' => $request->subject,
        ]);

        return redirect('/')->with('msg', 'Pertanyaan Berhasil di Edit');


    }

   
}
