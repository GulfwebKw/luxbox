@extends('gwc.template.indexTemplate')

@section('indexContent')
    <table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
        <thead>
        <tr>
            <th width="10">#</th>
            <th>{{__('adminMessage.user_name')}}</th>
            <th>{{__('adminMessage.order')}}</th>
            <th>{{__('adminMessage.package_type')}}</th>
            <th>{{__('adminMessage.shipping_method')}}</th>
            <th>{{__('adminMessage.weight')}}</th>
            <th>{{__('adminMessage.good_value')}}</th>
            <th width="100">{{__('adminMessage.original_track_id')}}</th>
            <th width="10">{{__('adminMessage.box_count')}}</th>
            <th width="100">{{__('adminMessage.order_status')}}</th>
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
                        {!! $resource['member'] ? $resource['member']->fullname : "Member deleted!"  !!}
                        {!! $resource['member'] ? '<br>'.$resource['member']->getISOCODE() : ""  !!}
                    </td>
                    <td>
                        {!! '#' .$resource->order !!}
                    </td>
                    <td>
                        {!! $resource->package_type !!}
                    </td>
                    <td>
                        {{ $resource->shipping_method }}
                    </td>
                    <td>
                        {{ $resource->weight . ' '. $resource->weight_type}}
                    </td>
                    <td>
                        {!! $resource->goods_value !!}
                    </td>
                    <td>
                        {!! $resource->original_track_id !!}
                    </td>
                    <td>
                        {!! $resource->boxes_count !!}
                    </td>
                    <td>
                        <b>{!! $resource->order_status !!}</b>

                    </td>
{{--                    <td>--}}
{{--                        <span class="kt-switch">--}}
{{--                            <label>--}}
{{--                                <input type="checkbox" id="{{ $data['path'] }}" class="change_status"--}}
{{--                                       value="{{$resource->id}}" {{!empty($resource->is_active)?'checked':''}}>--}}
{{--                                <span></span>--}}
{{--                            </label>--}}
{{--                        </span>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        {!! $resource->created_at !!}--}}
{{--                    </td>--}}
                    <td class="kt-datatable__cell">
                        <span style="display:inline-block;overflow: visible; position: relative; width: 80px;">
                            <div class="dropdown">
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        @if(auth()->guard('admin')->user()->can($data['editPermission']))
                                            <li class="kt-nav__item">
                                                <a href="{{url($data['url'] . $resource->id . '/edit')}}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                    <span class="kt-nav__link-text">{{__('adminMessage.edit')}}</span>
                                                </a>
                                            </li>
                                        @endif
                                           <li class="kt-nav__item">
                                                <a href="javascript:;" data-toggle="modal" data-target="#kt_modal_change_status_{{$resource->id}}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon-refresh"></i>
                                                    <span class="kt-nav__link-text">Change Status</span>
                                                </a>
                                            </li>
                                        @if(!$resource->invoice)
                                               <li class="kt-nav__item">
                                                <a href="{{url('/gwc/package-invoice/create?package_order='.$resource->order)}}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon-price-tag"></i>
                                                    <span class="kt-nav__link-text">Make Invoice</span>
                                                </a>
                                            </li>
                                            @else
                                                <li class="kt-nav__item">
                                                <a href="{{url('/gwc/package-invoice/'.$resource->invoice->id . '/edit?package_order='.$resource->order)}}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon-price-tag"></i>
                                                    <span class="kt-nav__link-text">Edit Invoice</span>
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

                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
                             id="kt_modal_change_status_{{$resource->id}}"
                        >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Order Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="{{route('package.change-status', $resource->id)}}">
                                        @csrf
                                    <div class="modal-body">
                                            @component('gwc.components.editSelectBox', [
                                                'label' => 'Change Order Status',
                                                'title' => 'name',
                                                'value' => 'name',
                                                'SelectedValue' => 'name',
                                                'none' => 'false',
                                                'name' => 'order_status',
                                                'resources' => $orderStatus,
                                                'foreign_key' => $resource->order_status,
                                                'required' => true
                                            ]) @endcomponent
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('adminMessage.no')}}</button>
                                        <button type="submit" class="btn btn-danger">
                                            {{__('adminMessage.yes')}}
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


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