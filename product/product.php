<?php
$sql = "SELECT * FROM product";
$result = $f->getAll($sql);


?>


<div class="row px-5">
    <?php
    foreach ($result as $value) :
    ?>
        <div class="col-md-3">

            <img class="card-img-top" src="asset/images/<?= $value['image'] ?>" alt="Card image">
            <h4 class="card-title"><?= $value['name'] ?></h4>
            <h5 class="text-danger"><?= $value['price'] ?> </h5>
            <span class="text-decoration-line-through md-3 text-end "><?= $value['sale_price'] ?></span>

            <div class="d-flex justify-content-between mb-3">
                <div class="p-2">
                    <p><span class="text-danger"></span><br><a href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Chi tiết</button></a></p>



                </div>
                <div class="p-2 text-end">
                    <p><span class="text-decoration-line-through"></span><br><a href="<?= PATH ?>page=addToCart&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Thêm vào giỏ hàng</button></a></p>
                </div>

            </div>
        </div>
    <?php endforeach ?>
</div>