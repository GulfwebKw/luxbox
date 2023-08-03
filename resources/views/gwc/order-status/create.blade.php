@extends('gwc.template.createTemplate')

@section('createContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="{{route($data['storeRoute'])}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="kt-portlet__body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Name',
                            'name' => 'name',
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
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Show In Shiped Package</label>
                        <select name="show_in_shiped_package"  class="form-control" required>
                            <option value="1" >Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Show In Received Package</label>
                        <select name="show_in_received_package"  class="form-control" required>
                            <option value="1" selected >Yes</option>
                            <option value="0" selected >No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <!-- is active? -->
                            <label class="col-3 col-form-label pr-2">{{__('adminMessage.isactive')}}</label>
                            <div class="col-3">
                                @component('gwc.components.createIsActive') @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>
@endsection