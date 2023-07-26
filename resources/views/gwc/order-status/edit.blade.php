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
                            'label' => 'name',
                            'name' => 'name',
                            'value'=>$resource->name,
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>User Can Edit Good Value</label>
                        <select name="can_edit_good_value"  class="form-control" required>
                            <option value="1" @if($resource->can_edit_good_value) selected  @endif>Yes</option>
                            <option value="0" @if(! $resource->can_edit_good_value) selected  @endif>No</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Show In Shiped Package</label>
                        <select name="show_in_shiped_package"  class="form-control" required>
                            <option value="1" @if($resource->show_in_shiped_package) selected  @endif>Yes</option>
                            <option value="0" @if(! $resource->show_in_shiped_package) selected  @endif>No</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Show In Received Package</label>
                        <select name="show_in_received_package"  class="form-control" required>
                            <option value="1" @if($resource->show_in_received_package) selected  @endif>Yes</option>
                            <option value="0" @if(! $resource->show_in_received_package) selected  @endif>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
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
