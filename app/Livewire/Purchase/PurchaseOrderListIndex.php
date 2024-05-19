<?php

namespace App\Livewire\Purchase;

use App\Exports\PurchaseOrderAttachment;
use App\Mail\PurchaseOrderMail;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseOrderListIndex extends Component
{
    public function render()
    {
        return view('livewire.purchase.purchase-order-list-index',[
            'purchaseOrders' => PurchaseOrder::orderBy('created_at','desc')->get()
        ]);
    }
    
    public function sendPerchaseOrder($id){
        $po = PurchaseOrder::findOrFail($id);
        $po->update([
                'sent_date' => now(),
            ]);

        $document = $this->getAttachmentFile($po);

        if($po->supplier->email){
            // $this->sendEmailNotification($po, $document);
        }
        noty()->addSuccess('sent to email');
        return Excel::download($document, 'PurchaseOrder'.$po->id.'.pdf');
    }

    public function getAttachmentFile($po){
       return (new PurchaseOrderAttachment($po));
    //    return Excel::download(new PurchaseOrderAttachment($po), 'PurchaseOrder'.$po->id.'.pdf');
    }
    
    public function sendEmailNotification(PurchaseOrder $po, $doc){
        Mail::to($po->supplier->email)->send(new PurchaseOrderMail($po, $doc));
    }

    public function recieveOrder($id){
        $po = PurchaseOrder::findOrFail($id);
        $this->redirect(route('products.purchases.order.view', ['po_id' => $po->id]), true);
    }
}
