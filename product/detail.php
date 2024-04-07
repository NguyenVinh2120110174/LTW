<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&ampdisplay=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="http://localhost:80/nguyenvinh/asset/css/style1.css" rel="stylesheet">
<!-- Shop Detail Start -->

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id = $id";
$result = $f->getOne($sql);

$sql_views = "UPDATE product SET views = views+1 WHERE id= $id";
$f->setQuery($sql_views);
// $smtm = $f->conn->prepare($sql);
// $smtm->bind_param("i",$id);
// $smtm->excecute();
?>


<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="asset/images/<?= $result['image'] ?>" alt="Image">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3><?= $result['name'] ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>

                </div>
                <h3 class="font-weight-semi-bold mb-4"><?= $result['price'] ?></h3>
                <p class="mb-4"><?= $result['description'] ?></p>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class=" input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <span class="text-decoration-line-through"></span><br><a href="<?= PATH ?>page=addToCart&id=<?= $result['id'] ?>"><button type="button" class="btn btn-primary px-3">Thêm vào giỏ hàng</button></a>
                    <!-- <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"><a href="<?= PATH ?>page=addToCart&id=<?= $value['id'] ?>"></i> Thêm vào giỏ hàng</button></a> -->
                </div>

            </div>
        </div>
    </div>

</div>