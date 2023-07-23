@extends('gwc.template.createTemplate')
@section('head')
    <style type="text/css">
        .dropzone {
            border: 2px dashed #999999;
            border-radius: 10px;
        }

        .dropzone .dz-default.dz-message {
            height: 171px;
            background-size: 132px 132px;
            margin-top: -101.5px;
            background-position-x: center;


        }

        .dropzone .dz-default.dz-message span {
            display: block;
            margin-top: 145px;
            font-size: 20px;
            text-align: center;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/basic.min.css" rel="stylesheet">
@endsection
@section('createContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="{{route($data['storeRoute'])}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="kt-portlet__body">

            <!-- title -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        @component('gwc.components.createSelectBox', [
                            'label' => 'User',
                            'title' => 'fullnamee',
                            'name' => 'member_id',
                            'resources' => $members,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-2">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Weight',
                            'name' => 'weight',
                            'type' => 'number',
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-2">
                        @component('gwc.components.createSelectBox', [
                            'label' => 'Weight Type',
                            'title' => 'id',
                            'name' => 'weight_type',
                            'resources' => json_decode(json_encode(array(array('id'=>'KG'), array('id'=>'LB')))),
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-2">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Boxes Count',
                            'name' => 'boxes_count',
                            'type' => 'number',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-2">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Good Value',
                            'name' => 'goods_value'
                        ]) @endcomponent
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Original Track Id',
                            'name' => 'original_track_id',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-3">
                        @component('gwc.components.createSelectBox', [
                            'label' => 'Package Type',
                            'title' => 'name',
                            'value' => 'name',
                            'name' => 'package_type',
                            'resources' => $packagesTypes,
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-3">
                        @component('gwc.components.createSelectBox', [
                            'label' => 'Shipping Method',
                            'title' => 'name',
                            'value' => 'name',
                            'name' => 'shipping_method',
                            'resources' => $shippingMethod,
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-3">
                        @component('gwc.components.createSelectBox', [
                            'label' => 'Order Status',
                            'title' => 'name',
                            'value' => 'name',
                            'name' => 'order_status',
                            'resources' => $orderStatus,
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <!-- Details -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.createTinyMce', [
                            'label' => 'Description (en)',
                            'name' => 'description_en',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.createTinyMce', [
                            'label' => 'Description (ar)',
                            'name' => 'description_ar',
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- image -->
                        @php $label = "Main image (Package image)"; @endphp
                        @php $field = 'image'; @endphp
                        @component('gwc.components.createImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'required' => true
                        ]) @endcomponent
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <div class="needsclick dropzone" style="height: 165px" id="document-dropzone"></div>
        </div>
        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <script type="text/javascript">
        var uploadedDocumentMap = {}
        Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drop more image (Inside box) here to upload";
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.images.store') }}',
            maxFilesize: 1, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                var name = uploadedDocumentMap[file.name];
                var token = $('[name=_token]').val();
                var dir = $('[name=dir]').val();
                console.log(dir);


                $.ajax({
                    type: 'get',
                    headers: {'X-CSRF-Token': token},
                    url: '{{ route('dropzone.images.remove') }}',
                    data: {name: name, dir: dir},
                    dataType: 'html'
                });

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                availableImages = availableImages + 1;
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                        {!! json_encode($project->document) !!}
                        for(
                var i
            in
                files
            )
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
                }
                @endif
            }
        };
    </script>
@endsection