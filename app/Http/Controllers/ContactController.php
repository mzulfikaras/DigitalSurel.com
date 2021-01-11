<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Repositories\Contact\ContactRepository;

class ContactController extends Controller
{

    protected $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    public function index(){
        return view('user.pages.contact');
    }

    public function getDataContact(){
        $dataContact = $this->contact->dataContact();

        return view('admin.pages.contact.index', compact('dataContact'));
    }

    public function getDeleteContact($id){
        $contact = $this->contact->deleteContact($id);

        if ($contact['status']) {
            return redirect()->route('admin.contact')->with(['sukses' => $contact['message']]);
        } else {
            return redirect()->route('admin.contact')->with(['gagal' => $contact['message']]);
        }
    }
}
