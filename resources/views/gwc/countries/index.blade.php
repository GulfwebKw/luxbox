@extends('gwc.template.indexTemplate')

@section('indexContent')
    <table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
        <thead>
        <tr>
            <th width="10">#</th>
            <th>{{__('adminMessage.title_en')}}</th>
            <th>{{__('adminMessage.title_ar')}}</th>
            <th>ISO Code</th>
            <th width="100">{{__('adminMessage.image')}}</th>
            <th width="10">{{__('adminMessage.status')}}</th>
            <th width="100">{{__('adminMessage.createdat')}}</th>
            <th width="10">{{__('adminMessage.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(count($resources))
            @php $p=1; @endphp
            @foreach($resources as $resource)
                <tr class="search-body">
                    <td>
                        {{$p}}
                    </td>
                    <td>
                        {!! $resource->title_en !!}
                    </td>
                    <td>
                        {!! $resource->title_ar !!}
                    </td>
                    <td>
                        {!! strtoupper($resource->iso_code) !!}
                    </td>
                    <td>
                        @if($resource->image)
                            <img src="{!! asset($data['imageFolder'] . '/thumb/' . $resource->image) !!}" width="40">
                        @endif
                    </td>
                    <td>
                        <span class="kt-switch">
                            <label>
                                <input type="checkbox" id="{{ $data['path'] }}" class="change_status"
                                       value="{{$resource->id}}" {{!empty($resource->is_active)?'checked':''}}>
                                <span></span>
                            </label>
                        </span>
                    </td>
                    <td>
                        {!! $resource->created_at !!}
                    </td>
                    <td class="kt-datatable__cell">
                        <span style="overflow: visible; position: relative; width: 80px;">
                            <div class="dropdown">
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            @php
                                            $cities = $resource->cities;
                                            if($cities){
                                                $count = count($cities);
                                            }
                                            else{
                                                $count = 0;
                                            }
                                            @endphp
                                            <a href="{{url('/gwc/countries/' . $resource->id . '/cities')}}" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                <span class="kt-nav__link-text">
                                                    {{__('adminMessage.cities') . ' (' . $count . ')' }}
                                                </span>
                                            </a>
                                        </li>
                                        @if(auth()->guard('admin')->user()->can($data['editPermission']))
                                            <li class="kt-nav__item">
                                                <a href="{{url($data['url'] . $resource->id . '/edit')}}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                    <span class="kt-nav__link-text">{{__('adminMessage.edit')}}</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(auth()->guard('admin')->user()->can($data['deletePermission']))
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" data-toggle="modal" data-target="#kt_modal_{{$resource->id}}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                    <span class="kt-nav__link-text">{{__('adminMessage.delete')}}</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </span>

                        <!--Delete modal -->
                        @component('gwc.templateIncludes.deleteModal', [
							'url' => $data['url'],
							'object' => $resource
						]) @endcomponent
                    </td>
                </tr>
                @php $p++; @endphp
            @endforeach
            <tr>
                <td colspan="8" class="text-center">{{ $resources->links() }}</td>
            </tr>
        @else
            <tr>
                <td colspan="8"
                    class="text-center">{{__('adminMessage.recordnotfound')}}</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection