@extends('gwc.template.editTemplate')

@section('editContent')


    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="{{route('how-it-work.update',$resource->id)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
       @method('PUT')
        <div class="kt-portlet__body">

            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#english" role="tab">
                            English
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Arabic" role="tab">
                            Arabic
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#image" role="tab">
                            Images
                        </a>
                    </li>
                </ul>
            </div>

  <div class="tab-content">
    <div id="english" class="tab-pane active">
      <br>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    @component('gwc.components.editTinyMce', [
                       'label' => 'description (en) 1',
                       'name' => 'description_en_1',
                       'value' => $resource->description_en_1,
                       'required' => true
                    ]) @endcomponent
                </div>
            
                <div class="col-md-6">
                    @component('gwc.components.editTinyMce', [
                       'label' => 'description (en) 2',
                       'name' => 'description_en_2',
                       'value' => $resource->description_en_2,
                       'required' => true
                    ]) @endcomponent
                </div>
                <div class="col-md-6">
                    @component('gwc.components.editTinyMce', [
                       'label' => 'description (en) 3',
                       'name' => 'description_en_3',
                       'value' => $resource->description_en_3,
                       'required' => true
                    ]) @endcomponent
                </div>
                <div class="col-md-6">
                    @component('gwc.components.editTinyMce', [
                       'label' => 'description (en) 4',
                       'name' => 'description_en_4',
                       'value' => $resource->description_en_4,
                       'required' => true
                    ]) @endcomponent
                </div>
                <div class="col-md-6">
                    @component('gwc.components.editTinyMce', [
                       'label' => 'description (en) 5',
                       'name' => 'description_en_5',
                       'value' => $resource->description_en_5,
                       'required' => true
                    ]) @endcomponent
                </div>
            </div>
        </div>
    </div>
    <div id="Arabic" class="tab-pane fade">
        <br>
        <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                @component('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 1',
                   'name' => 'description_ar_1',
                   'value' => $resource->description_ar_1,
                   'required' => true
                ]) @endcomponent
            </div>

            <div class="col-md-6">
                @component('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 2',
                   'name' => 'description_ar_2',
                   'value' => $resource->description_ar_2,
                   'required' => true
                ]) @endcomponent
            </div>
            <div class="col-md-6">
                @component('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 3',
                   'name' => 'description_ar_3',
                   'value' => $resource->description_ar_3,
                   'required' => true
                ]) @endcomponent
            </div>
            <div class="col-md-6">
                @component('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 4',
                   'name' => 'description_ar_4',
                   'value' => $resource->description_ar_4,
                   'required' => true
                ]) @endcomponent
            </div>
            <div class="col-md-6">
                @component('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 5',
                   'name' => 'description_ar_5',
                   'value' => $resource->description_ar_5,
                   'required' => true
                ]) @endcomponent
            </div>
            </div>
        </div>
    </div>
    <div id="image" class="tab-pane fade">
        <br>
        <div class="col-lg-6">
            <!-- image -->
            @php $label = "Image Top"; @endphp
            @php $field = 'image_top'; @endphp
            @component('gwc.components.editImageUpload', [
                'label' => $label,
                'name' => $field,
                'value'=>$resource->image_top,
            ]) @endcomponent
        </div>
        <div class="col-md-2">
            <img src="{!! asset('uploads/how-it-work/' . $resource->image_top) !!}" width="80">
        </div>
        <div class="col-lg-6">
            <!-- image -->
            @php $label = "Image Middle"; @endphp
            @php $field = 'image_middle'; @endphp
            @component('gwc.components.editImageUpload', [
                'label' => $label,
                'name' => $field,
                'value'=>$resource->image_middle,
            ]) @endcomponent
        </div>
        <div class="col-md-2">
            <img src="{!! asset('uploads/how-it-work/' . $resource->image_middle) !!}" width="80">
        </div>
        <div class="col-lg-6">
            <!-- image -->
            @php $label = "Image Buttom"; @endphp
            @php $field = 'image_buttom'; @endphp
            @component('gwc.components.editImageUpload', [
                'label' => $label,
                'name' => $field,
                'value'=>$resource->image_buttom,
            ]) @endcomponent
        </div>
        <div class="col-md-2">
            <img src="{!! asset('uploads/how-it-work/' . $resource->image_buttom) !!}" width="80">
        </div>
       
      
    </div>
      
    </div>
  </div>

          
                    
      

        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>

@endsection