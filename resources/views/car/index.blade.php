<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Car Management')}}</h1>

        <div class="section-header-breadcrumb">
            <!-- <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Edit User</a></div> -->
        </div>
    </x-slot>
    <div class="container-fluid mt-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <span style="float: right;">
                            <a class='btn btn-primary' href='{{route("documentcar.create")}}'>
                                <i class='fas fa-folder-open'></i> {{__("Car Document")}}
                            </a>
                            <a class='btn btn-primary' href='{{route("car.create")}}'>
                                <i class='fas fa-car'></i> {{__("Add Car Information")}}
                            </a>
                        </span>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="10%">{{__("No.")}}</th>
                                        <th width="">{{__("Model")}}</th>
                                        <th width="">{{__("Plate Number")}}</th>
                                        <th width="">{{__("Serial Number")}}</th>
                                        <th width="">{{__("Engine Number")}}</th>
                                        <th width="">{{__("Power CC")}}</th>
                                        <th width="">{{__("Date Start Usage")}}</th>
                                        <th width="">{{__("Use by Division")}}</th>
                                        <th width="">{{__("Assign to")}}</th>
                                        <th width="">{{__("Condition")}}</th>
                                        <th width="">{{__("Last Update")}}</th>
                                        <th width="">{{__("Document")}}</th>
                                        <th width="">{{__("Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($car as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->model}}</td>
                                        <td>{{$row->vehicle}}</td>
                                        <td>{{$row->serial_number}}</td>
                                        <td>{{$row->engine_number}}</td>
                                        <td>{{$row->power_cc}}</td>
                                        <td>{{$row->date_start_usage}}</td>
                                        <td>
                                            @if(session('locale') === 'en')
                                            {{$row->divisionID->division_eng}}
                                            @elseif(session('locale') === 'la')
                                            {{$row->divisionID->division_la}}
                                            @endif
                                        </td>
                                        <td>
                                            @if(session('locale') === 'en')
                                            {{$row->assignID->fullname_eng}}
                                            @elseif(session('locale') === 'la')
                                            {{$row->assignID->fullname_la}}
                                            @endif
                                        </td>
                                        <td>{{$row->condition}}</td>
                                        <td>{{$row->updated_at}}</td>
                                        <td>
                                            <a class='btn btn-primary' href="{{route('documentcar.show',$row->id)}}">
                                                {{__("Document")}}
                                            </a>
                                        </td>
                                        <td>
                                            <a class='btn btn-primary' href="{{route('car.edit',$row->id)}}">
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



