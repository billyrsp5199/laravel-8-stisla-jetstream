<div class="container-fluid mt-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <span style="float: right;">
                        <a class='btn btn-primary' href='{{route("maintenance.create")}}'>
                            <i class='fas fa-address-card'></i> {{__("New Maintenance")}}
                        </a>
                    </span>

                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="10%">{{__("ID")}}</th>
                                    <th>{{__("Vehicle")}}</th>
                                    <th width="">{{__("ODO Meter")}}</th>
                                    <th width="">{{__("Report by")}}</th>
                                    <th width="">{{__("Maintenance Date")}}</th>
                                    <th width="">{{__("Problem Details")}}</th>
                                    <th width="">{{__("Maintenance Type")}}</th>
                                    <th width="">{{__("Detail")}}</th>
                                    <th width="">{{__("Action")}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($main as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->carID->vehicle}}</td>
                                    <td>{{$row->odo_meter}}</td>
                                    <td>
                                        @if(session('locale') === 'en')
                                        {{$row->userID->fullname_eng}}
                                        @elseif(session('locale') === 'la')
                                        {{$row->userID->fullname_la}}
                                        @endif
                                    </td>
                                    <td>{{$row->maintenance_date}}</td>
                                    <td>{{$row->problem_detail}}</td>

                                    <td>{{__($row->maintenance_type)}}</td>
                                    <td><a href="#" class="btn btn-primary">{{__('Detail')}}</a></td>
                                    <td><a wire:click.prevent="edit({{(int)$row->id}})" href="#" class="btn btn-primary">{{__('Edit')}}</a></td>
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

@livewire('maintenance.edit-component')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js')}}/cancelconfirm.js"></script>

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

@endpush