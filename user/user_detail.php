<?php
$sql = "SELECT * FROM order_detail ";
$result = $f->getAll($sql);

?>


<div class="well">
    <div class="row-px-5">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item"><a class="btn text-dark " href=""> Cập nhập tài khoản </a></li>
                <li class=" list-group-item active"><a class="btn text-dark" href="<?= PATH ?>page=user_detail"> Quản lý đơn hàng </a></li>
                <li class="list-group-item"><a class="btn text-dark" href=""> Blog </a></li>
            </ul>
        </div>
    </div>
</div>
<h1>Đơn hàng đã đặt</h1>
<style>
    h1 {

        color: green;
    }
</style>
<br>

<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Thời gian đặt hàng</th>

    </tr>
    <?php
    $i = 1;
    foreach ($result as $value) :
    ?>
        <tr>
            <td><?= $i ?> </td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['address'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><?= $value['phone'] ?></td>
            <td><?= $value['order_date'] ?></td>


        <?php
        $i++;
    endforeach;
        ?>
</table>