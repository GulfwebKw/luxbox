@extends('gwc.template.createTemplate')

@section('createContent')
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="{{route($data['storeRoute'])}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="kt-portlet__body">

            <!-- name -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Civil Id',
                            'name' => 'civil_id',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'First Name',
                            'name' => 'first_name',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Last Name',
                            'name' => 'last_name',
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Company Name',
                            'name' => 'company_name',
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'phone',
                            'name' => 'phone',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Mobile',
                            'name' => 'mobile',
                            'required' => true
                        ]) @endcomponent
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Twitter',
                            'name' => 'twitter',
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Instagram',
                            'name' => 'instagram',
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Snapchat',
                            'name' => 'snapchat',
                        ]) @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'TikTok',
                            'name' => 'tiktok',
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
                            <option value="{{$type->id}}">{{$type->type_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Choose Your Language</label>
                        <select name="language_id"  class="form-control" required>
                            @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Referral Code',
                            'name' => 'referral_code'
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
                            @foreach($countries as $resource)
                                <option value="{{ $resource->title_en }}">{{ $resource->title_en }}</option>
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
                        @component('gwc.components.createTextInput', [
                            'label' => 'Block',
                            'name' => 'block',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Street',
                            'name' => 'street',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Jaddeh',
                            'name' => 'avenue'
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Home PACI',
                            'name' => 'home_paci',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Building number',
                            'name' => 'building_number',
                            'required' => true
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Floor',
                            'name' => 'floor'
                        ]) @endcomponent
                    </div>
                    <div class="col-md-4">
                        @component('gwc.components.createTextInput', [
                            'label' => 'apartment/office number',
                            'name' => 'apartment_office_number'
                        ]) @endcomponent
                    </div>

                </div>
            </div>

            <!-- auth -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
                            'required' => true
                        ]) @endcomponent
                    </div>

                    <div class="col-md-6">
                        @component('gwc.components.createTextInput', [
                            'label' => 'Password',
                            'name' => 'password',
                            'type' => 'password',
                            'required' => true
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
            </div>

        </div>

        @component('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]) @endcomponent

    </form>

    <script>
        function getUsCities(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#us_city-list").addClass("loader");
                },
                success: function (data) {
                    $("#us_city-list").html(data);
                    $("#us_city-list").prop('disabled', false);
                    $("#us_city-list").removeClass("loader");
                }
            });
        }

        function getUsAreas(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#us_area-list").addClass("loader");
                },
                success: function (data) {
                    $("#us_area-list").html(data);
                    $("#us_area-list").prop('disabled', false);
                    $("#us_area-list").removeClass("loader");
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