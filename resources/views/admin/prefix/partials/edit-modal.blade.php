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
                    <div class="mb-3">
                        <label class="form-label">ชื่อคำนำหน้าชื่อ (ภาษาไทย)</label>
                        <input class="form-control form-control-sm" name="ename_th" id="ename_th" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อคำนำหน้าชื่อ (ภาษาอังกฤษ)</label>
                        <input class="form-control form-control-sm" name="ename_en" id="ename_en" />
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
