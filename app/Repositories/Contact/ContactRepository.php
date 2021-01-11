<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactRepository{

    public function dataContact(){

        $data = Contact::orderBy('created_at','DESC');

        return $data->get();
    }

    public function storeContact(Request $request){

        $result = [
            'status' => false,
            'message' => '',
        ];

        try {
            $contact = new Contact();

            $contact->nama = $request->nama;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->notes = $request->notes;
            $contact->save();

            $result['status'] = true;
            $result['message'] = 'Data Berhasil Ditambahkan';

            return $result;
        } catch (\Throwable $th) {
            $result['message'] = 'function storeDataUser error => ' . $th->getMessage();
            return $result;
        }
    }

    public function findContactById($id){

        return Contact::with([])->find($id);

    }

    public function updateContact($request, $id){
        $contact = $this->findContactById($id);

        $result = [
            'status' => false,
            'message' => ''
        ];


        try {
            $contact->update();

            $contact->nama = $request->nama;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->notes = $request->notes;
            $contact->save();

            $result['status'] = true;
            $result['message'] = 'Data Berhasil Ditambahkan';

            return $result;
        } catch (\Throwable $th) {
            $result['message'] = 'function storeDataUser error => ' . $th->getMessage();
            return $result;
        }

    }

    public function deleteContact($id){
        $contact = $this->findContactById($id);

        $result = [
            'status' => false,
            'message' => ''
        ];
        try {
            $contact->delete();
            $result['status']   = true;
            $result['message']  = 'Data Berhasil Di delete';
            return $result;
        } catch (\Throwable $th) {
            $result['message'] = 'function dataContact error => ' . $th->getMessage();
            return $result;
        }
    }
}
