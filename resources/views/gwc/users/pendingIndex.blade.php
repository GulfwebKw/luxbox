@extends('gwc.template.indexTemplate')

@section('indexContent')
    <table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
        <thead>
        <tr>
            <th width="10">#</th>
            <th>{{__('adminMessage.firstname')}}</th>
            <th>{{__('adminMessage.lastname')}}</th>
            <th>{{__('adminMessage.mobile')}}</th>
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
                        {{ $resource->getISOCODE()  }}
                    </td>
                
                    <td>
                        {!! $resource->first_name !!}
                    </td>
                    <td>
                        {!! $resource->last_name !!}
                    </td>
                    <td>
                        {!! $resource->mobile !!}
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
                                        @if(auth()->guard('admin')->user()->can($data['editPermission']))
                                            <li class="kt-nav__item">
                                                <a href="{{url($data['url'] . $resource->id . '/edit')}}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                    <span class="kt-nav__link-text">{{__('adminMessage.edit')}}</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(auth()->guard('admin')->user()->can('users-approved'))
                                            <li class="kt-nav__item">
                                                <a href="/gwc/pending-users/approved/{{$resource->id }}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-check-mark text-success"></i>
                                                    <span class="kt-nav__link-text text-success">Approved</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="/gwc/pending-users/reject/{{$resource->id }}" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-trash text-danger"></i>
                                                    <span class="kt-nav__link-text text-danger">Reject</span>
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