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

                        </span>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>

                                        <th width="">{{__("Technical Inspection Expire")}}</th>
                                        <th width="">{{__("Register Expire")}}</th>
                                        <th width="">{{__("Yellow Book Expire")}}</th>
                                        <th width="">{{__("Insurance Expire")}}</th>
                                        <th width="">{{__("Tax Road Date")}}</th>
                                        <th width="">{{__("Driver Name ")}}</th>
                                        <th width="">{{__("Remark")}}</th>
                                        <th width="">{{__("Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$document->technical_inspection_expire}}</td>
                                        <td>{{$document->register_expire}}</td>
                                        <td>{{$document->yellowbook_expire}}</td>
                                        <td>{{$document->insurance_exp}}</td>
                                        <td>{{$document->tax_road_date}}</td>
                                        <td>
                                            @if(session('locale') === 'en')
                                            {{$document->driverID->fullname_eng}}
                                            @elseif(session('locale') === 'la')
                                            {{$document->driverID->fullname_la}}
                                            @endif
                                        </td>
                                        <td>{{$document->remark}}</td>
                                        <td>
                                            <a class='btn btn-primary' href="{{route('documentcar.edit',$row->id)}}">
                                                {{__("Edit")}}
                                            </a>
                                        </td>
                                    </tr>
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