{{-- Krajee --}}
{{-- @php
    $config = [
        'browseOnZoneClick' => true,
        'overwriteInitial' => true,
        'theme' => 'fa5',
        'language' => 'th',
        'showUpload' => false,
        'allowedFileExtensions' => ["jpg", "jpeg", "gif", "png"],
    ];
@endphp --}}

<form action="{{ route('disbursement.store') }}" method="post" enctype="multipart/form-data" id="form">
    @csrf

    <div class="modal fade" id="modal-create" data-backdrop="static" data-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">เพิ่มข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card {{ env('CARD_THEME') }} card-outline">
                                <div class="card-header" style="font-size: 20px;">
                                    รายการรอบันทึก
                                </div>
                                <div class="card-body">
                                    <table id="table_item"
                                        class="table table-striped table-bordered table-hover table-sm dataTable no-footer dtr-inline nowrap"style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 5%">#</th>
                                                <th class="text-center" style="width: 10%">รายการที่เบิก</th>
                                                <th class="text-center" style="width: 10%">จำนวน</th>
                                                <th class="text-center" style="width: 10%">หน่วยนับ</th>
                                                <th class="text-center" style="width: 10%">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card {{ env('CARD_THEME') }} card-outline">
                                <div class="card-header" style="font-size: 20px;">
                                    {{ $pagename }}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">รายการอุปกรณ์</label>
                                                        <select class="form-control sel2" style="width: 100%;"
                                                            id="product">
                                                            <option value="" selected disabled>-- เลือก --
                                                            </option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="mb-3">
                                                        <label class="form-label">จำนวน</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            id="qty">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">หน่วยนับ</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            readonly id="unit">
                                                        <input type="text" class="form-control form-control-sm"
                                                            hidden id="price">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">หมายเหตุ</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="remark" id="remark">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="float-right">
                                        <a class="btn {{ env('BTN_THEME') }}"
                                            href="{{ route('product.index') }}">เพิ่มอุปกรณ์</a>
                                        <a class="btn {{ env('BTN_THEME') }}" id="additem">เพิ่มเข้ารายการ</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">

                    <a class="btn {{ env('BTN_THEME') }}" id="confirm">บันทึก</a>
                </div>
            </div>
        </div>
    </div>
</form>


@push('js')
    <script>
        $('#confirm').on('click', function() {

            Swal.fire({
                title: 'ต้องการเพิ่มข้อมูลใช่หรือไม่',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form').submit();
                }
            })

        })

        $('#modal-create').on('shown.bs.modal', function() {
            $('#table_item').DataTable().draw();
        })

        $(document).ready(function() {
            var i = 1;
            var table_item = $('#table_item').DataTable({
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(1),td:nth-child(2),td:nth-child(3),td:nth-child(4),td:nth-child(5),td:nth-child(6),td:nth-child(7)'
                },
                processing: true,
                scrollX: true,
                scrollCollapse: true,
                language: {
                    url: "{{ asset('plugins/DataTables/th.json') }}",
                },
                columnDefs: [{
                        className: 'text-center',
                        targets: [1, 3, 4]
                    },
                    {
                        className: 'text-right',
                        targets: [2]
                    },
                    {
                        orderable: false,
                        targets: [1, 2, 3, 4]
                    },
                    {
                        visible: false,
                        targets: 0
                    }
                ],
            });

            $('#additem').on('click', function() {
                product = $('#product option:selected').text() +
                    '<input name="product[]" type="hidden" value="' + $('#product option:selected').val() +
                    '"></input>' + '<input name="price[]" type="hidden" value="' + $('#price').val() +
                    '"></input>';
                qty = $('#qty').val() + '<input name="qty[]" type="hidden" value="' + $('#qty').val() +
                    '"></input>';
                unit = $('#unit').val();

                btnDel =
                    '<a class="btn btn-danger removeitem"><i class="fas fa-trash-alt"></i></a>'
                table_item.row.add([i, product, qty, unit, btnDel]).draw(false);
                i++;
            });

            $('#table_item tbody').on('click', '.removeitem', function() {
                table_item.row($(this).parents('tr')).remove().draw();
            })

            $('#product').on('change', function() {
                url = '{{ route('disbursement.get.data.product', ['id' => ':id']) }}';
                url = url.replace(':id', $('#product option:selected').val());
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        console.log(response)
                        $('#unit').val(response.data.unit);
                        $('#price').val(response.data.price);
                    }
                });
            })

            $('#qty').on('change', function() {
                url = '{{ route('disbursement.get.data.product', ['id' => ':id']) }}';
                url = url.replace(':id', $('#product option:selected').val());
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {

                        if ($('#qty').val() > response.data.limit) {
                            toastr.error('สามารถเบิกได้ไม่เกินจำนวนที่กำหนดได้');
                            return false;
                            $('#qty').val(0);
                        }
                    }
                });
            })
        });
    </script>
@endpush
