@extends('gwc.template.editTemplate')

@section('editContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="{{route($data['updateRoute'], $resource->id)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method('PUT')
        <div class="kt-portlet__body">

            <!-- name -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Civil Id',
                            'name' => 'civil_id',
                            'value'=>$resource->civil_id,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'First Name',
                            'name' => 'first_name',
                            'value'=>$resource->first_name,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Last Name',
                            'name' => 'last_name',
                            'value'=>$resource->last_name,
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Company Name',
                            'name' => 'company_name',
                            'value'=>$resource->company_name,
                        ]) @endcomponent
                    </div>
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                            'label' => 'phone',
                            'name' => 'phone',
                            'value'=>$resource->phone,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Mobile',
                            'name' => 'mobile',
                            'value'=>$resource->mobile,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-3">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Lux Box Number (LUX-1234)',
                            'name' => 'luxboxnum',
                            'value'=>$resource->luxboxnum,
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Twitter',
                            'name' => 'twitter',
                            'value'=> $resource->twitter,
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Instagram',
                            'name' => 'instagram',
                            'value'=> $resource->instagram,
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Snapchat',
                            'name' => 'snapchat',
                            'value'=> $resource->snapchat,
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'TikTok',
                            'name' => 'tiktok',
                            'value'=> $resource->tiktok,
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Account Type</label>
                        <select name="account_type"  class="form-control" required>
                            @foreach($accountTypes as $type)
                                <option value="{{$type->id}}" @if($type->id==$resource->account_type) selected  @endif>{{$type->type_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Choose Your Language</label>
                        <select name="language_id"  class="form-control" required>
                            @foreach($languages as $language)
                                <option value="{{$language->id}}" @if($language->id==$resource->language_id) selected  @endif>{{$language->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Referral Code',
                            'name' => 'referral_code',
                            'value'=>$resource->referral_code
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Country</label>
                        <select name="country" onchange="getCities(this.value)" id=""  class="form-control" required>
                            <option value="">None</option>
                            @foreach($countries as $r)
                                <option value="{{ $r->id }}" @if($r->id==$resource->country_id) selected @endif>{{ $r->title_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>State</label>
                        <select name="city" id="city-list" onchange="getAreas(this.value)"  class="form-control" required>
                            <option value="">None</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Area</label>
                        <select name="area" id="area-list"  class="form-control" required>
                            <option value="">None</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Block',
                            'name' => 'block',
                            'value'=>$resource->block,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Street',
                            'name' => 'street',
                            'value'=>$resource->street,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Jaddeh',
                            'name' => 'avenue',
                            'value'=>$resource->avenue
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Home PACI',
                            'name' => 'home_paci',
                            'value'=>$resource->home_paci,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Building number',
                            'name' => 'building_number',
                            'value'=>$resource->building_number,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Floor',
                            'name' => 'floor',
                            'value'=>$resource->floor
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.editTextInput', [
                            'label' => 'apartment/office number',
                            'name' => 'apartment_office_number',
                            'value'=>$resource->apartment_office_number
                        ]) @endcomponent
                    </div>

                </div>
            </div>

            <!-- email -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'phone',
                            'name' => 'phone',
                            'value'=>$resource->phone,
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Mobile',
                            'name' => 'mobile',
                            'value'=>$resource->mobile,
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <!-- auth -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.editTextInput', [
                            'label' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
                            'value'=>$resource->email,
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Password',
                            'name' => 'password',
                            'type' => 'password'
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <!-- is active? -->
                <label class="col-3 col-form-label">{{__('adminMessage.isactive')}}</label>
                <div class="col-3">
                    @component('gwc.components.createIsActive') @endcomponent
                </div>

                <div class="col-md-4">
                    <label>Account Status</label>
                    <select name="is_approved"  class="form-control" required>
                        <option value="approved" @if("approved"==$resource->is_approved) selected  @endif>Approved</option>
                        <option value="reject" @if("reject"==$resource->is_approved) selected  @endif>Reject</option>
                    </select>
                </div>
            </div>

        </div>

        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities-edit",
                data: {country_id: '{{$resource->country_id}}', id: '{{$resource->city_id}}'},
                beforeSend: function () {
                    $("#city-list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list").html(data);
                    $("#city-list").prop('disabled', false);
                    $("#city-list").removeClass("loader");
                    document.getElementById('city-list').value='{{$resource->city_id}}';
                    $.ajax({
                        type: "POST",
                        url: "/gwc/get-city-areas",
                        data: 'city_id={{$resource->city_id}}',
                        beforeSend: function () {
                            $("#area-list").addClass("loader");
                        },
                        success: function (data) {
                            $("#area-list").html(data);
                            $("#area-list").prop('disabled', false);
                            $("#area-list").removeClass("loader");
                            document.getElementById('area-list').value='{{$resource->area_id}}';
                        }
                    });
                }
            });
        });


        function getUsCities(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#city-list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list").html(data);
                    $("#city-list").prop('disabled', false);
                    $("#city-list").removeClass("loader");
                }
            });
        }

        function getUsAreas(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#area-list").addClass("loader");
                },
                success: function (data) {
                    $("#area-list").html(data);
                    $("#area-list").prop('disabled', false);
                    $("#area-list").removeClass("loader");
                }
            });
        }

        function getCities(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#city-list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list").html(data);
                    $("#city-list").prop('disabled', false);
                    $("#city-list").removeClass("loader");
                }
            });
        }

        function getAreas(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#area-list").addClass("loader");
                },
                success: function (data) {
                    $("#area-list").html(data);
                    $("#area-list").prop('disabled', false);
                    $("#area-list").removeClass("loader");
                }
            });
        }
    </script>

@endsection