@extends('gwc.template.viewTemplate')

@section('viewContent')

    <div class="kt-widget kt-widget--user-profile-3">
        <div class="kt-widget__top">
            <div class="kt-widget__content">
                <div class="kt-widget__head">
                    <div class="kt-widget__user">
                        <h2>{{$resource->name}}</h2>
                    </div>
                </div>
                <div class="kt-widget__subhead">
                    <a href="javascript:;"><i class="flaticon2-new-email"></i>{{$resource->email}}</a>
                    <a href="javascript:;"><i class="flaticon2-phone"></i>{{$resource->website}}</a>
                    <a href="javascript:;"><i class="flaticon2-edit"></i>{{$resource->subject}}</a>
                </div>
                <div class="kt-widget__info">
                    <div class="kt-widget__desc">
                        {!!$resource->message!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection