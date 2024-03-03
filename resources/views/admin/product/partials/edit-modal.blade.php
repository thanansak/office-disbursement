<form id="form">
    <div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="eid">
                    <div class="row">
                        <div class="col-sm-8 mb-3">
                            <label class="form-label">ชื่ออุปกรณ์</label>
                            <input class="form-control form-control-sm" type="text" name="ename" id="ename" />
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label class="form-label">ประเภทอุปกรณ์</label>
                            <select class="form-control form-control-sm" name="eproduct_type_id" id="eproduct_type_id">
                                @foreach ( $product_types as $product_type )
                                    <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">รายละเอียด</label>
                            <textarea name="edescription" class="form-control" id="edescription" cols="30" rows="3"></textarea>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label class="form-label">ราคาอุปกรณ์</label>
                            <input class="form-control form-control-sm" type="text" name="eprice" id="eprice" />
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label class="form-label">หน่วยนับ</label>
                            <input class="form-control form-control-sm" type="text" name="eunit" id="eunit" />
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label class="form-label">จำนวนเบิกสูงสุด</label>
                            <input class="form-control form-control-sm" type="number" name="elimit" id="elimit" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="reset" class="btn btn-danger">ล้างข้อมูล</button>
                    <a class="btn {{ env('BTN_THEME') }}" onclick="updateData()">บันทึก</a>
                </div>
            </div>
        </div>
    </div>
</form>


@push('js')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
