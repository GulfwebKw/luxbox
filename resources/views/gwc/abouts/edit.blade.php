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
                            'label' => 'Tilte (en)',
                            'name' => 'title_en',
                            'value'=>$resource->title_en,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Title (ar)',
                            'name' => 'title_ar',
                            'value'=>$resource->title_ar,
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

           


            <!-- Details -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editTinyMce', [
                           'label' => 'description (en)',
                           'name' => 'description_en',
                           'value' => $resource->description_en,
                           'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTinyMce', [
                           'label' => 'description (ar)',
                           'name' => 'description_ar',
                           'value' => $resource->description_ar,
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
                            'folder' => 'uploads/abouts/',
                        'deletePath'=> '/gwc/' . $data['path'] . '/deleteimage/' . $resource->id . '/' . $field,
                        ]) @endcomponent
                    </div>
                    <div class="col-md-2">
                        <img src="{{'/uploads/'. $data['path']. '/thumb/'.$resource->image}}" alt="">
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">{{__('adminMessage.counter')}}</label>
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Enter Counter" name="counter" value="{{ $resource->counter }}">
                            </div>
                            <!-- is active? -->
                            <label class="col-3 col-form-label">{{__('adminMessage.isactive')}}</label>
                            <div class="col-3">
                                @component('gwc.components.editIsActive',[
                                 'value'=>$resource->is_active
                                ]) @endcomponent
                            </div>
                            <!-- display order -->
                            <label class="col-3 col-form-label">{{__('adminMessage.displayorder')}}</label>
                            <div class="col-3">
                                @component('gwc.components.editDisplayOrder', [
                                'lastOrder' => $resource->display_order
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