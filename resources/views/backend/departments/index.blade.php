@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Departments </h2>
            </div>
            
            
        </div>
        <div class="flex flex-wrap items-center">
            <a href="{{ route('department.create') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                <span class="ml-2 text-xs font-semibold">Departments</span>
            </a>
        </div>




        </div>
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-3/12 px-4 py-3">Department Name</div>
                <div class="w-3/12 px-4 py-3">Department id </div>
                <div class="w-2/12 px-4 py-3">No of staff </div>
                
                <div class="w-2/12 px-4 py-3 text-right">Action</div>
            </div>
            @foreach ($departments as $department)
                <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                    <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $department->department_name }}</div>
                    <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $department->department_id }}</div>
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                        @foreach ($department->children as $children)
                            <span class="bg-gray-200 text-xs font-normal px-2 py-px border rounded-full inline-flex my-px">
                                {{ $children->user->name }}
                            </span>
                        @endforeach
                    </div>
                    
                    < 
            @endforeach
        </div>
        <div class="mt-8">
            {{ $departments->links() }}
        </div>

        @include('backend.modals.delete',['name' => 'department'])
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $( ".deletebtn" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
            var url = $(this).attr('data-url');
            $(".remove-record").attr("action", url);
        })        
        
        $( "#deletemodelclose" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
        })
    })
</script>
@endpush