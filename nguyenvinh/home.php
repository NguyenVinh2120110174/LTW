<h1> Sản phẩm Mới Nhất</h1>
<?php
$sql_new = "SELECT * FROM  product ORDER BY created_at DESC LIMIT 0,4";
$result = $f->getAll($sql_new);

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

<h1> Sản phẩm được khuyến mãi</h1>
<?php
$sql_sale = "SELECT * FROM  product WHERE is_on_sale = 1 LIMIT 0,4";
$result = $f->getAll($sql_sale);
?>
<div class="row px-5">
    <?php
    foreach ($result as $value) :
    ?>


        <div class="col-md-3">

            <img class="card-img-top" src="asset/images/<?= $value['image'] ?>" alt="Card image">
            <h4 class="card-title"><?= $value['name'] ?></h4>
            <span class="text-decoration-line-through md-3 text-end "><?= $value['price'] ?></span>
            <h5 class="text-danger"> <?= $value['sale_price'] ?></h5>

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




<h1> Sản phẩm nhiều lượt xem nhất</h1>
<?php
$sql_view = "SELECT * FROM  product ORDER BY views DESC LIMIT 0,4";
$result = $f->setQuery($sql_view);
?>
<!-- <div class="row px-5">
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
</div> -->


<div class="row px-5 products">
    <?php
    foreach ($result as $value) :
    ?>
        <div class="col-md-3">
            <img src="asset/images/<?= $value['image'] ?>" class="card-img-top" alt="sản phẩm">
            <h5 class="card-title"><?= $value['name'] ?></h5>
            <div class="d-flex justify-content-between mb-3">
                <?php if ($value['is_on_sale'] == 1) : ?>
                    <div class="p-2">
                        <p>
                            <span class="fw-bold text-danger "><?= $value['sale_price'] ?>đ</span> <br>
                            <a href="<?= PATH ?>page=addToCart&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Thêm vào giỏ</button>
                        </p>
                    </div>
                    <div class="p-2 text-end">
                        <p>
                            <span class="text-muted text-decoration-line-through "><?= $value['price'] ?>đ</span> <br>
                            <a href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Chi tiết</button></a>
                        </p>
                    </div>
                <?php else : ?>
                    <div class="p-2">
                        <p>
                            <span class="fw-bold text-danger "><?= $value['price'] ?>đ</span> <br>
                            <a href="<?= PATH ?>page=addToCart&id=<?= $value['id'] ?>"><button type="button" class="btn btn-success">Thêm vào giỏ</button>
                        </p>
                    </div>
                    <div class="p-2 text-end">
                        <p>
                            </br><a href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>">
                                <button type="button" class="btn btn-success">Chi tiết</button></a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>