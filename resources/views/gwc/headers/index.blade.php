@extends('gwc.template.HowItWorkindexTemplate')

@section('indexContent')
    <table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
        <thead>
        <tr>
            <th>title shipping cost en</th>
            <th>title how it work en</th>
            <th>title services en</th>
            <th>title services details en</th>
            <th>title aboutus en</th>
            <th>title faq en</th>
            <th>title blog en</th>
            <th>title blog details en</th>
            <th>title contactus en</th>
            <th>title login en</th>
            <th>title register en</th>
            <th>image header shipping</th>
            <th>image header how it work</th>
            <th>image header services</th>
            <th>image header aboutus</th>
            <th>image header faq</th>
            <th>image header blog</th>
            <th>image header contactus</th>
            <th>mage header login</th>
            <th>image header register</th>
          
            
            <th width="10">{{__('adminMessage.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(count($resources))

            @foreach($resources as $resource)
                <tr class="search-body">

                    <td>
                        {!! $resource->title_shipping_cost_en !!}
                    </td>
                    <td>
                        {!! $resource->title_how_it_work_en !!}
                    </td>
                    <td>
                        {!! $resource->title_services_en !!}
                    </td>
                    <td>
                        {!! $resource->title_services_details_en !!}
                    </td>
                    <td>
                        {!! $resource->title_aboutus_en !!}
                    </td>
                    <td>
                        {!! $resource->title_faq_en !!}
                    </td>
                    <td>
                        {!! $resource->title_blog_en !!}
                    </td>
                    <td>
                        {!! $resource->title_blog_details_en !!}
                    </td>
                    <td>
                        {!! $resource->title_contactus_en !!}
                    </td>
                    <td>
                        {!! $resource->title_login_en !!}
                    </td>
                    <td>
                        {!! $resource->title_register_en !!}
                    </td>
              
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_shipping) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_how_it_work) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_services) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_aboutus) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_faq) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_blog) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_contactus) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_login) }}" width="40">
                    </td>
                    <td>
                        <img src="{{ asset('uploads/headers/' . $resource->image_header_register) }}" width="40">
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