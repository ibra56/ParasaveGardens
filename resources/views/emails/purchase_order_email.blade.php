<x-mail::message>
# Interconnect Airport Cottages
## Puchase Order

Hello {{ $purchaseOrder->supplier->name ?? $purchaseOrder->supplier->Company }}!

Please find the attached purchase order.

@if (isset($purchaseOrder->expected_arrival_date))
Expected Arrival Date: {{ $purchaseOrder->expected_arrival_date }}  
@endif
@if (isset($purchaseOrder->order_deadline_date))
Order Deadline Date: {{ $purchaseOrder->order_deadline_date }}  
@endif

If you did not expect this email or believe it is a mistake, you can safely ignore this email.

Thank you,

{{ auth()->user()->name }}

Interconnect Airport Cottages

</x-mail::message>
