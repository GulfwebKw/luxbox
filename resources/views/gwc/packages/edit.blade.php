@extends('gwc.template.editTemplate')
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

@section('editContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="{{route($data['updateRoute'],$resource->id)}}">
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="kt-portlet__body">

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="col-md-4">
                            <label>User</label>
                            <select id="select2-dropdown" name="member_id" class="form-control" required>
                                <option value="{{$resource->member_id}}" selected="selected">{{$resource->member ? $resource->member->fullnamee : "Member deleted!"}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Weight',
                            'name' => 'weight',
                            'type' => 'number',
                            'value' =>$resource->weight,
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-2">
                        @component('gwc.components.editSelectBox', [
                            'label' => 'Weight Type',
                            'title' => 'id',
                            'name' => 'weight_type',
                            'resources' => json_decode(json_encode(array(array('id'=>'KG'), array('id'=>'LB')))),
                            'foreign_key' => $resource->weight_type,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-2">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Boxes Count',
                            'name' => 'boxes_count',
                            'type' => 'number',
                            'value' =>$resource->boxes_count,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-2">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Good Value',
                            'name' => 'goods_value',
                            'value' =>$resource->goods_value
                        ]) @endcomponent
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Original Track Id',
                            'name' => 'original_track_id',
                            'value' =>$resource->original_track_id,
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-3">
                        @component('gwc.components.editSelectBox', [
                            'label' => 'Package Type',
                            'title' => 'name',
                            'value' => 'name',
                            'SelectedValue' => 'name',
                            'name' => 'package_type',
                            'resources' => $packagesTypes,
                            'foreign_key' => $resource->package_type,
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-3">
                        @component('gwc.components.editSelectBox', [
                            'label' => 'Shipping Method',
                            'title' => 'name',
                            'value' => 'name',
                            'SelectedValue' => 'name',
                            'name' => 'shipping_method',
                            'resources' => $shippingMethod,
                            'foreign_key' => $resource->shipping_method,
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-3">
                        @component('gwc.components.editSelectBox', [
                            'label' => 'Order Status',
                            'title' => 'name',
                            'value' => 'name',
                            'SelectedValue' => 'name',
                            'name' => 'order_status',
                            'resources' => $orderStatus,
                            'foreign_key' => $resource->order_status,
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
                            'label' => 'Description (en)',
                            'name' => 'description_en',
                            'value' => $resource->description_en,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTinyMce', [
                            'label' => 'Description (ar)',
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
                        @php $label = "Main image (Package image)"; @endphp
                        @php $field = 'image'; @endphp
                        @component('gwc.components.createImageUpload', [
                            'label' => $label,
                            'name' => $field,
                        ]) @endcomponent
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('/uploads/packages/'.$resource->image)}}" width="80" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="needsclick dropzone" style="height: 165px" id="document-dropzone"></div>
            </div>

            @if($resource->images)
                <ul class="pic pt-2">
                    @foreach(explode(',', $resource->images) as $image)
                        <li data-e="{{$image}}">
                            <button type="button" class="close text-danger p-1" onclick="DeletePic('{{$image}}')">
                                ×
                            </button>
                            <img width="150" src="{{asset("/uploads/packages/". $image)}}" alt="">
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent
    </form>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select2-dropdown').select2({
                ajax: {
                    url: '{{ route('ajax-get-user-isocode') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                placeholder: 'Select an option',
                minimumInputLength: 1
            });
        });
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

        function DeletePic(name) {
            $.ajax({
                url: '{{ route('dropzone.image.delete') }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                method: 'POST',
                data: {name: name, id: '{{$resource->id}}', model: 'package'},
                success: function (data) {
                    $('li[data-e="' + data + '"]').fadeOut();
                }
            });
        }
    </script>
@endsection