@extends('adminlte::page')
@php $pagename = 'รายละเอียดการเบิกอุปกรณ์'; @endphp
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
                <div class="row">
                    <div class="col-sm-3">
                        <label class="form-label">รหัสการเบิก</label>
                        <input type="text" class="form-control form-control-sm" name="disbursement_code" id="disbursement_code" value="{{ $disbursement->disbursement_code }}" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label">วันที่เบิก</label>
                        <input type="text" class="form-control form-control-sm" name="created_at" value="{{ $disbursement->created_at }}"  id="created_at" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label">ราคารวม</label>
                        <input type="text" class="form-control form-control-sm" name="total_price" value="{{ $disbursement->total_price }}"  id="total_price" readonly>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <table id="table_item_show" class="table table-striped table-bordered table-hover table-sm dataTable no-footer dtr-inline nowrap"style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%">#</th>
                                    <th class="text-center" style="width: 10%">รายการที่เบิก</th>
                                    <th class="text-center" style="width: 10%">จำนวน</th>
                                    <th class="text-center" style="width: 10%">ราคาต่อหน่วย</th>
                                    <th class="text-center" style="width: 10%">ราคารวม</th>
                                    <th class="text-center" style="width: 10%">หน่วยนับ</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $disbursement_items as $key => $item )
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->product->price }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->product->unit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])

    @push('js')
        <script>
            // $('input[name="iswColor"]').bootstrapSwitch('state', true, true);

            var table;
            $(document).ready(function() {
                table_item_show = $('#table_item_show').DataTable({
                    pageLength: 10,
                    responsive: true,
                    processing: true,
                    scrollX: true,
                    scrollCollapse: true,
                    language: {
                        url: "{{ asset('plugins/datatable-th.json') }}",
                    },

                    columnDefs: [{
                            className: 'text-center',
                            targets: [0, 3]
                        },
                        {
                            orderable: false,
                            targets: [1, 3]
                        },
                    ],

                    "dom": 'rtip',

                });

            });


        </script>
    @endpush


@endsection
