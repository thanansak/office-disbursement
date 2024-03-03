@extends('adminlte::page')
@php $pagename = 'จัดการประเภทสินค้า'; @endphp
@section('title', setting('title') . ' | ' . $pagename)
@section('content')
    <div class="pt-3">
        <div class="col-sm-12 ml-1 text-bold mb-1" style="font-size: 20px;">
            <i class="far fa-pen text-muted mr-2"></i> {{ $pagename }}
        </div>

        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent;">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}" class="{{ env('TEXT_THEME') }}"><i
                                class="fa fa-home fa-fw" aria-hidden="true"></i> หน้าแรก</a></li>
                    <li class="breadcrumb-item active">{{ $pagename }}</li>
                </ol>
            </nav>
        </div>

        <div class="card {{ env('CARD_THEME') }} shadow-custom">
            {{-- <div class="card-header" style="font-size: 20px;">
                {{ $pagename }}
            </div> --}}
            <div class="card-body">
                <div class="float-left mb-2">
                    <div class="group">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path
                                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                </path>
                            </g>
                        </svg>
                        <input type="search" id="custom-search-input" class="form-control form-control-sm input-search"
                            placeholder="ค้นหา">
                    </div>
                </div>

                @if (Auth::user()->hasAnyPermission(['*', 'all product_type', 'create product_type']))
                    <div class="text-right">
                        <a href="" class="btn {{ env('BTN_OUTLINE_THEME') }} mb-2" data-toggle="modal"
                            data-target="#modal-create"><i class="fas fa-plus mr-2"></i> เพิ่มข้อมูล</a>
                    </div>
                @endif

                <table id="table" class="table table-hover dataTable no-footer nowrap" style="width: 100%;">
                    <thead class="bg-custom">
                        <tr>
                            <th class="text-center" style="width: 10%">ลำดับ</th>
                            <th class="text-center" style="width: 10%">ชื่อ</th>
                            <th class="text-center" style="width: 10%">รายละเอียด</th>
                            <th class="text-center" style="width: 10%">สถานะ</th>
                            <th class="text-center" style="width: 10%">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])

    @push('js')
        <script>
            // $('input[name="iswColor"]').bootstrapSwitch('state', true, true);

            var table;
            $(document).ready(function() {
                table = $('#table').DataTable({
                    pageLength: 10,
                    responsive: true,
                    processing: true,
                    scrollX: true,
                    scrollCollapse: true,
                    language: {
                        url: "{{ asset('plugins/datatable-th.json') }}",
                    },
                    serverSide: true,
                    ajax: "",
                    columnDefs: [{
                            className: 'text-center',
                            targets: [0, 3, 4]
                        },
                        {
                            orderable: false,
                            targets: [1, 3]
                        },
                    ],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'description'
                        },
                        {
                            data: 'publish'
                        },
                        {
                            data: 'btn'
                        },
                    ],
                    "dom": 'rtip',

                });
            });

            //custom search datatable

            $('#custom-search-input').keyup(function() {
                table.search($(this).val()).draw();
            })


            $('#modal-create').on('hidden.bs.modal', function(event) {
                $("#form")[0].reset();
            })

            $('#modal-edit').on('hidden.bs.modal', function(event) {
                $("#form")[0].reset();
            })

            //storeData
            function storeData(url) {
                if ($('#name').val() == null || $('#name').val() == "") {
                    toastr.error('กรุณากรอกชื่อ');
                    return false;
                }

                url = "{{ route('product_type.store') }}";

                formdata = new FormData();
                formdata.append('_token', '{{ csrf_token() }}');
                formdata.append('name', $('#name').val());
                formdata.append('description', $('#description').val());

                submitData(url, formdata);
            }

            //requestData
            function requestData(response) {
                $('#eid').val(response.product_type.id);
                $('#ename').val(response.product_type.name);
                $('#edescription').val(response.product_type.description);

                $('#modal-edit').modal('show');
            }


            //updateData
            function updateData() {
                if ($('#ename').val() == null || $('#ename').val() == "") {
                    toastr.error('กรุณากรอกชื่อ');
                    return false;
                }

                id = $('#eid').val();
                // url = '{{ route('prefix.update', ['prefix' => ':id']) }}';
                // url = url.replace(':id', id);
                url = '{{ route('product_type.update') }}';

                eformdata = new FormData();
                eformdata.append('_token', '{{ csrf_token() }}');
                eformdata.append('name', $('#ename').val());
                eformdata.append('description', $('#edescription').val());
                eformdata.append('id', id);

                submitData(url, eformdata);
            }
        </script>
    @endpush

    @include('admin.product_type.partials.create-modal')
    @include('admin.product_type.partials.edit-modal')
@endsection
