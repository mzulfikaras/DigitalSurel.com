<?php

namespace App\Repositories\Invoice;

use App\Models\Checkout;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceRepository{

    public function allDataInvoice(){
        $checkout = Checkout::all();
        foreach($checkout as $d){
            $data = Invoice::where('checkout_id', $d->id);
        }

        return $data->get();
    }

    public function oneDataInvoice(){
        $checkout = Checkout::all();
        foreach($checkout as $d){
            $invoice = Invoice::where('checkout_id', $d->id);
        }

        return $invoice->first();
    }


}
