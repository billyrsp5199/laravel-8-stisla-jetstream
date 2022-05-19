<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Driver Management')}}</h1>

        <div class="section-header-breadcrumb">
        </div>
    </x-slot>
    <div class="container-fluid mt-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <span style="float: right;">
                            <a class='btn btn-primary' href='{{route("driver.create")}}'>
                                <i class='fas fa-address-card'></i> {{__("Add New Driver")}}
                            </a>
                        </span>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="10%">{{__("No.")}}</th>
                                        <th width="">{{__("Driver Name")}}</th>
                                        <th width="">{{__("License Issue Date")}}</th>
                                        <th width="">{{__("License Expire Date")}}</th>
                                        <th width="">{{__("Attached")}}</th>
                                        <th width="">{{__("Division")}}</th>
                                        <th width="">{{__("Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($driver as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            @if(session('locale') === 'en')
                                            {{$row->driverID->fullname_eng}}
                                            @elseif(session('locale') === 'la')
                                            {{$row->driverID->fullname_la}}
                                            @endif
                                        </td>
                                        <td>{{$row->license_issue_date}}</td>
                                        <td>{{$row->license_expire_date}}</td>
                                        <td>{{$row->attached}}</td>
                                        <td>
                                            @if(session('locale') === 'en')
                                            {{$row->divisionID->division_eng}}
                                            @elseif(session('locale') === 'la')
                                            {{$row->divisionID->division_la}}
                                            @endif
                                        </td>
                                        <td>{{$row->date_start_usage}}</td>
                                        <td>
                                            @if(session('locale') === 'en')
                                            {{$row->divisionID->division_eng}}
                                            @elseif(session('locale') === 'la')
                                            {{$row->divisionID->division_la}}
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <a class='btn btn-primary' href="{{route('driver.edit',$row->id)}}">
                                                {{__("Edit")}}
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    "infoFiltered": "(@lang('Filter From') _MAX_ @lang('Item'))"
                }
            });

        });
    </script>



