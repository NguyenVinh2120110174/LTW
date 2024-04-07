<?php
$sql = "SELECT * FROM PRODUCT ";
$result = $f->getAll($sql);

?>

    <br>
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Mổ tả</th>
            <th>Giảm Giá</th>
        </tr>
        <?php
        $i = 1;
        foreach ($result as $value) :
        ?>
            <tr>
                <td><?= $i ?> </td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['image'] ?></td>
                <td><?= $value['price'] ?></td>
                <td><?= $value['description'] ?></td>
                <td><?= $value['sale_price'] ?></td>


            <?php
            $i++;
        endforeach;
            ?>
    </table>
    <ul class="pagination pagination pagination-m" ; style="float: right;">
        <li class="page-item"><a class="page-link" href="#">
                <= </a>
        </li>
        <li class="page-item"><a class="page-link" href="#"> 1 </a></li>
        <li class="page-item"><a class="page-link" href="#"> 2 </a></li>
        <li class="page-item"><a class="page-link" href="#"> 3 </a></li>
    </ul>

    