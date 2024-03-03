@extends('adminlte::page')
@php $pagename = 'เบิกอุปกรณ์'; @endphp
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

                <table id="table" class="table table-hover dataTable no-footer nowrap" style="width: 100%;">
                    <thead class="bg-custom">
                        <tr>
                            <th class="text-center" style="width: 10%">ลำดับ</th>
                            <th class="text-center">รหัสการเบิก</th>
                            <th class="text-center">วันที่เบิก</th>
                            <th class="text-center">รหัสพนักงาน</th>
                            <th class="text-center">ชื่อพนักงาน</th>
                            <th class="text-center">หมายเหตุ</th>
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
                            targets: [0, 2, 6, 7]
                        },
                        {
                            orderable: false,
                            targets: [1, 2, 3, 4, 5, 6, 7]
                        },
                    ],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'id'
                        },
                        {
                            data: 'disbursement_code'
                        },
                        {
                            data: 'date'
                        },
                        {
                            data: 'employee_code'
                        },
                        {
                            data: 'employee_name'
                        },
                        {
                            data: 'remark'
                        },
                        {
                            data: 'status'
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

            // function อนุมัติการเบิก
            function approveDisbursement(url) {
                Swal.fire({
                    title: 'ยืนยันการอนุมัติใช่หรือไม่',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: url,
                            success: function(response) {
                                if (response.status === true) {
                                    Swal.fire({
                                        position: 'top-right',
                                        title: response.msg,
                                        icon: 'success',
                                        timer: 2000,
                                        toast: true,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                    table.ajax.reload();
                                } else {
                                    Swal.fire({
                                        position: 'top-right',
                                        title: response.msg,
                                        icon: 'error',
                                        timer: 2000,
                                        toast: true,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                }
                            }
                        });
                    }
                });
            };

            // function ไม่อนุมัติการเบิก
            function rejectDisbursement(url) {
                Swal.fire({
                    title: 'ยืนยันการอนุมัติใช่หรือไม่',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: url,
                            success: function(response) {
                                if (response.status === true) {
                                    Swal.fire({
                                        position: 'top-right',
                                        title: response.msg,
                                        icon: 'success',
                                        timer: 2000,
                                        toast: true,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                    table.ajax.reload();
                                } else {
                                    Swal.fire({
                                        position: 'top-right',
                                        title: response.msg,
                                        icon: 'error',
                                        timer: 2000,
                                        toast: true,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                }
                            }
                        });
                    }
                });
            }
        </script>
    @endpush
@endsection
