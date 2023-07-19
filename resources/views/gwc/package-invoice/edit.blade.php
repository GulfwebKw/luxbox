@extends('gwc.template.editTemplate')

@section('editContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="{{route($data['updateRoute'],$resource->id)}}">
        @method('PUT')
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
                        @component('gwc.components.editSelectBox', [
                            'label' => 'Packages',
                            'title' => 'order',
                            'name' => 'package_id',
                            'resources' => $packages,
                            'foreign_key'=> $resource->package_id,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    @endif
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Price',
                            'name' => 'shipping_cost',
                            'value'=>$resource->shipping_cost,
                            'required' => true
                        ]) @endcomponent
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editSelectBox', [
                            'label' => 'Status',
                            'title' => 'id',
                            'name' => 'status',
                            'foreign_key'=> $resource->status,
                            'resources' => json_decode(json_encode(array(array('id'=>'pending'), array('id'=>'paid'), array('id'=>'cancel')))),
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editSelectBox', [
                            'label' => 'Payment Method',
                            'title' => 'id',
                            'name' => 'payment_method',
                            'foreign_key'=> $resource->payment_method,
                            'resources' => json_decode(json_encode(array(array('id'=>'Stripe')))),
                            'required' => true
                        ]) @endcomponent
                    </div>

                </div>
            </div>

        </div>

        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>
@endsection