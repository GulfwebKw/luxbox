@extends('gwc.template.editTemplate')

@section('editContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="{{route($data['updateRoute'],$resource->id)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method('PUT')
        <div class="kt-portlet__body">

            <!-- title -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Title (en)',
                            'name' => 'title_en',
                            'value' => $resource->title_en,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Title (ar)',
                            'name' => 'title_ar',
                            'value' => $resource->title_ar,
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editTinyMce', [
                           'label' => 'description (en) ',
                           'name' => 'description_en',
                           'value' => $resource->description_en,
                           'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTinyMce', [
                           'label' => 'description (ar) ',
                           'name' => 'description_ar',
                           'value' => $resource->description_ar,
                           'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                           'label' => 'Time Monday Friday',
                           'name' => 'time_mon_fir',
                           'value' => $resource->time_mon_fir,
                           'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                           'label' => 'Time Saturday',
                           'name' => 'time_sat',
                           'value' => $resource->time_sat,
                           'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                           'label' => 'Time Sunday',
                           'name' => 'time_sun',
                           'value' => $resource->time_sun,
                           'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>
           
        </div>

        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>
@endsection