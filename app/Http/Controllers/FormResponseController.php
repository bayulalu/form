<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notif;
use App\Models\Form;
use App\Models\FormResponse;
use Illuminate\Http\Request;

class FormResponseController extends Controller
{
    public function store(Request $request, $id)
    {
         // TODO 3 : 1.3 MEMVALIDASI DAN MENYIMPAN TANGGAPAN(KOMENTAR) DARI USER
        $this->validate($request, [
            'subject' => 'required|min:5',
        ]);

        $form = Form::findOrFail($id);

        // dd($form->notifs);
        $formResponse = FormResponse::create([
            'subject' => $request->subject,
            'form_id' => $id,
            'user_id' => Auth::user()->id
        ]);

    // TODO 4 : 1.2 MENGIRIM NOTIFIKASI KE USER
        if ($form->user->id != Auth::user()->id) {
            Notif::create([
                'subject' => 'Ada tanggapan dari '. Auth::user()->name,
                'user_id' => $form->user->id,
                'form_id' => $id,
                'hel' => Auth::user()->id,
                'seen' => 0
            ]);
        }else{
            foreach ($form->notifs as $notif) {
                // dd($notif->form_id);
                if( $notif->hel != 0 && $notif->form_id == $form->id){
                    Notif::create([
                        'subject' => 'Ada tanggapan dari '. Auth::user()->name,
                        'user_id' => $notif->hel,
                        'form_id' => $form->id,
                        'hel' => 0,
                        'seen' => 0
                    ]);
                }
                
            }
        }
  
        return redirect('/'.$form->slug)->with('msg', 'Pertanyaan Berhasil di Edit');

    }
}
