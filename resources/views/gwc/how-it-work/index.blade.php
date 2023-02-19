@extends('gwc.template.HowItWorkindexTemplate')

@section('indexContent')
    <table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
        <thead>
        <tr>
            <th>Description (en) 1</th>
            <th>Description (en) 2</th>
            <th>Description (en) 3</th>
            <th>Description (en) 4</th>
            <th>Description (en) 5</th>
            <th>Image Top</th>
            <th>Image Middle</th>
            <th>Image Buttom</th>
            <th>Image Buttom</th>
            <th width="10">{{__('adminMessage.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(count($resources))
            
            @foreach($resources as $resource)
                <tr class="search-body">
                  
                    <td>
                        {!! \Illuminate\Support\Str::limit($resource->description_en_1, 50) !!}
                    </td>
                    <td>
                        {!! \Illuminate\Support\Str::limit($resource->description_en_2, 50) !!}
                    </td>
                    <td>
                        {!! \Illuminate\Support\Str::limit($resource->description_en_3, 50) !!}
                    </td>
                    <td>
                        {!! \Illuminate\Support\Str::limit($resource->description_en_3, 50) !!}
                    </td>
                    <td>
                        {!! \Illuminate\Support\Str::limit($resource->description_en_4, 50) !!}
                    </td>
                    <td>
                        {!! \Illuminate\Support\Str::limit($resource->description_en_5, 50) !!}
                    </td>
                 
                    <td>
                        <img src="{!! asset('uploads/how-it-work/' . $resource->image_top) !!}" width="40">
                    </td>
                    <td>
                        <img src="{!! asset('uploads/how-it-work/' . $resource->image_middle) !!}" width="40">
                    </td>
                    <td>
                        <img src="{!! asset('uploads/how-it-work/' . $resource->image_buttom) !!}" width="40">
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