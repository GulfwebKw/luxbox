@extends('gwc.template.editTemplate')

@section('editContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="{{route($data['updateRoute'],$resource->id)}}">
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="kt-portlet__body">

            <!-- title -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Youtube Link',
                            'name' => 'link_youtube',
                            'value'=>$resource->link_youtube,
                            'required' => true
                        ]) @endcomponent
                    </div>
                   
                </div>
            </div>

           


            
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- image -->
                        @php $label = "Image"; @endphp
                        @php $field = 'image'; @endphp
                        @component('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image,
                        ]) @endcomponent
                    </div>
                    <div class="col-md-2">
                        <img src="{{'/uploads/'. $data['path']. '/thumb/'.$resource->image}}" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <!-- is active? -->
                            <label class="col-3 col-form-label">{{__('adminMessage.isactive')}}</label>
                            <div class="col-3">
                                @component('gwc.components.editIsActive',[
                                 'value'=>$resource->is_active
                                ]) @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>
@endsection