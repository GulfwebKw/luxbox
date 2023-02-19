@extends('gwc.template.createTemplate')

@section('createContent')

    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="{{route($data['storeRoute'])}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="kt-portlet__body">
            <div class="form-group">
                <div class="row">
    @if(isset(request()->package_order) && request()->package_order!=null)
                        <div class="col-md-6">
                            <label>Packages</label>
                            <select id=""  name="package_id" class="form-control">
                                @foreach($packages as $p)
                                    @if($p->order==request()->package_order)
                                    <option value="{{$p->id}}">{{ $p->order }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="col-md-6">
                            @component('gwc.components.createSelectBox', [
                                'label' => 'Packages',
                                'title' => 'order',
                                'name' => 'package_id',
                                'resources' => $packages,
                                'required' => true
                            ]) @endcomponent
                        </div>
                    @endif

                    <div class="col-md-6">
                            @component('gwc.components.createTextInput', [
                                'label' => 'Price',
                                'name' => 'shipping_cost',
                                'required' => true
                            ]) @endcomponent
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            @component('gwc.components.createSelectBox', [
                                'label' => 'Status',
                                'title' => 'id',
                                'name' => 'status',
                                'resources' => json_decode(json_encode(array(array('id'=>'pending'), array('id'=>'paid'), array('id'=>'cancel')))),
                                'required' => true
                            ]) @endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('gwc.components.createSelectBox', [
                                'label' => 'Payment Method',
                                'title' => 'id',
                                'name' => 'payment_method',
                                'resources' => json_decode(json_encode(array(array('id'=>'Paypal')))),
                                'required' => true
                            ]) @endcomponent
                        </div>

                    </div>
                </div>

            </div>

            @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

        </form>
    @endsection