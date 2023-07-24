Hello<br>
Thank you for your payment. Your payment has been <strong>received</strong>.

<ul>
    <li>Order: <strong>#{{$package->order}}</strong></li>
    <li>Order Created: <strong>{{$package->created_at->format('y-m-d')}}</strong></li>
    <li>Order Total: <strong>{{'$'.$package['invoice']->shipping_cost}}</strong></li>
    <li>Number of Packages: <strong>{{$package->boxes_count}}</strong>
    </li>
    <li>Order Status: <strong>{{$package->order_status}}</strong></li>
    <li>Order Weight: <strong>{{$package->weight . ' '. $package->weight_type}}</strong>
    </li>
    <li>Goods Value: <strong>{{$package->goods_value ? '$'.$package->goods_value : "Unknown"}}</strong></li>
    <li>Shipping Method: <strong>{{$package->shipping_method}}</strong>
    </li>
    <li>Number Of Consolidated Boxes: <strong>{{$package->boxes_count}}</strong></li>
    <li>Transaction code: <strong>{{$charge->id}}</strong></li>
</ul>