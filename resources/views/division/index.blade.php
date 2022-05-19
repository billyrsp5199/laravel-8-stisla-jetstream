<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Division') }}</h1>

        <div class="section-header-breadcrumb">
            <!-- <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Edit User</a></div> -->
        </div>
    </x-slot>

    <form action="{{route('division.store')}}" method="post">
        @csrf @method('POST')
        <div class="row">
            <!-- <label for="division" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('New')}} {{__('Division')}}</label> -->
            <div class="col-4">
                <input type="text" name="division_la" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('New Division')}} ({{__('Lao')}})">
            </div>
            <div class="col-4">
                <input type="text" name="division_eng" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('New Division')}} ({{__('English')}})">
            </div>
            <div class="col-4">
                <input type="submit" value="{{__('Add')}}" class="btn btn-primary">
            </div>
        </div>
    </form>
    <br>
    <div class="table-responsive">
        <table class="display" id="dataTable">
            <thead>
                <tr>
                    <th width="10%">{{__("No.")}}</th>
                    <th width="">{{__("Division")}}</th>
                    <th width="">{{__("Action")}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($d as $dv)
                <tr>
                    <td>{{$no++}}</td>
                    <td>
                        @if(session('locale') === 'en')
                        {{$dv->division_eng}}
                        @elseif(session('locale') === 'la')
                        {{$dv->division_la}}
                        @endif
                    </td>
                    <td>
                        <button>
                            <form action="{{route('division.destroy',$dv->id)}}" method="post">
                            @csrf @method('DELETE')
                            <input type="submit" value='{{__("Remove")}}' class="btn btn-danger">
                            </form>
                        </button>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>


<link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#dataTable').DataTable({
            "language": {
                            "paginate": {
                                "previous": '<i class="fas fa-chevron-left"></i>',
                                "next": '<i class="fas fa-chevron-right"></i>',
                                "first": "@lang('First Page')",
                                'last': "@lang('Last Page')"
                            },
                            "search": "@lang('Search')",
                            "lengthMenu": "@lang('Show') _MENU_ @lang('Item')",
                            "zeroRecords": "@lang('No Content Found')",
                            "info": "@lang('Show') _PAGE_ @lang('From') _PAGES_",
                            "infoEmpty": "[@lang('No Content Found')]",
                            "infoFiltered": "(@lang('Filter From') _MAX_ @lang('Item'))",
                            "processing": '<span style=""><i class="fa fa-spinner fa-spin fa-2x"></i><br><span style="font-size:20px">@lang('LoadingRecords')</span></span>'
            }
        });

            // $('#dataTable').DataTable({
            // "lengthMenu": [
            //   [10,50, 75, 100],
            //   [10,50, 75, 100]
            // ],
            // "responsive": {
            //         "details": {
            //             "display": $.fn.dataTable.Responsive.display.modal( {
            //                 "header": function ( row ) {
            //                     var data = row.data();

            //                     return "@lang('Details') "+data.title;
            //                 }
            //             } ),
            //             "renderer": $.fn.dataTable.Responsive.renderer.tableAll( {
            //                 "tableClass": 'table'
            //             } )
            //         }
            //     },
            // "language": {
            //                 "paginate": {
            //                     "previous": '<i class="fas fa-chevron-left"></i>',
            //                     "next": '<i class="fas fa-chevron-right"></i>',
            //                     "first": "@lang('First Page')",
            //                     'last': "@lang('Last Page')"
            //                 },
            //                 "search": "@lang('Search')",
            //                 "searchPlaceholder": "@lang('Search')...",
            //                 "lengthMenu": "@lang('Show') _MENU_ @lang('Item')",
            //                 "zeroRecords": "@lang('No Content Found')",
            //                 "info": "@lang('Show') _PAGE_ @lang('From') _PAGES_",
            //                 "infoEmpty": "[@lang('No Content Found')]",
            //                 "infoFiltered": "(@lang('Filter From') _MAX_ @lang('Item'))",
            //                 "processing": '<span style=""><i class="fa fa-spinner fa-spin fa-2x"></i><br><span style="font-size:20px">@lang('LoadingRecords')</span></span>'
            // },
            // "processing": true,
            // "serverSide": true,
            // "searchDelay": 2000,
        //     "ajax": {
        //       "url": "{{ route('divisions.render') }}",
        //       "dataType": "json",
        //       "type": "POST",
        //       "data": function(data){
        //         data.order[0].dir= data.order[0].dir == 'asc' && data.order[0].dir != 'desc' ? 'desc' : 'asc';
        //       },
        //     },
        //     "columns": [
        //       {"data": "id"},
        //       {"data": "division_la"},
        //       {"data": "division_eng"},
        //     ]
        //   });

    });
</script>