<style>
    .well {
        width: 350 px;
        min-height: 1px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 3px solid #e3e3e3;
        border-radius: 4px;
    }
</style>

<div class="well">
    <h2>ĐIỀN THÔNG TIN LIÊN HỆ</h2>
    <form action="http://localhost/nguyenvinh/index.php?page=contact" method="get">
        <div class="control-group">
            <label for="masv" class="form-label">Mã khách hàng </label>
            <div>
                <input type="text" class="form-control" id="masv" placeholder=" Mã kh" name="userid">
            </div>
        </div>
        <div class="control-group">
            <label for="hoten" class="form-label">Họ Tên </label>
            <div>
                <input type="text" class="form-control" id="hoten" placeholder=" Họ tên" name="fullname">
            </div>
        </div>

        <div class="control-group">
            <label for="lop" class="form-label">Địa chỉ </label>
            <div>
                <input type="text" class="form-control" id="lop" placeholder=" Địa chỉ" name="Address">
            </div>
        </div>

        <div class="control-group">
            <label for="email" class="form-label">Email </label>
            <div>
                <input type="email" class="form-control" id="email" placeholder=" Email" name="email">
            </div>
        </div>

        <div class="control-group">
            <label for="comment" class="control-label">Nội dung liên hệ </label>
            <div class="controls ">
                <textarea class="form-control" id="comment" rows="5" name="comment"></textarea>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input style="background-color:#04AA6D; color:#f5f5f5;" type="submit" name="submitAccount" value="Lấy thông tin" class="shopBtn exclusive">
            </div>
        </div>
    </form>
</div>