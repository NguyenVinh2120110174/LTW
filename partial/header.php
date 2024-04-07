<!DOCTYPE html>
<html>

<head>
    <title>TitanShop</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="asset/css/style.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Blaka Ink' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>

</head>

<body>
    <div class="container-fluid border-warning">
        <div class="row bg-white">
            <div class="col-md-4">
                <a href="<?= PATH ?>page=home" class="text-decoration-none">
                    <div class="logo py-2"><img src="asset/images/logo.png" /></div>
                </a>

            </div>
            <div class="col-md-4 pt-3">
                <form action="<?= PATH ?>page=timkiem" method="POST">
                    <div class="input-group">
                        <input type="hidden" name="tukhoa" value="search">
                        <input type="text1" class="form-control" placeholder="Search products" name="tukhoa">
                        <input type="submit" class="btn btn-success" name="timkiem">
                    </div>
                </form>
            </div>

            <div class="col-md-4 text-end pt-3">
                <?php
                if (!isset($_SESSION['user'])) {
                    echo "<a href='' class='btn border'>
                    <i class='fas fa-heart text-success'></i>
                    <span class='badge text-black'></span>
                </a>";
                } else {
                    echo "<a href='" . PATH . "page=account&id=" . $_SESSION['userId'] . "' class='btn border'>
                    <i class='fa-solid fa-user-secret text-success'></i>
                    <span class='badge text-black'>" . $_SESSION['user'] . "</span>
                </a>";
                }

                ?>



                <a href="<?= PATH ?>page=cart" class="btn border">
                    <i class="fas fa-shopping-cart text-success"></i>
                    <span class="badge text-black"><?= isset($_SESSION['cart']) ? $_SESSION['number_of_item'] : 0 ?></span>
                </a>
            </div>
        </div>
        <div class="row header">

            <div class="col-md-12">
                <ul>
                    <li class="active"><a href="<?= PATH ?>page=home">Trang chủ</a></li>
                    <li><a href="<?= PATH ?>page=product">Shop</a>
                        <ul>
                            <?php
                            $sql = " SELECT * FROM category";
                            $result = $f->getAll($sql);
                            foreach ($result as $c) :
                            ?>
                                <li><a href="<?= PATH ?>page=catProduct&id=<?= $c['id'] ?>"> <?= $c['category_name'] ?> </a></li>

                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </li>

                    <li><a href="<?= PATH ?>page=contact">Liên hệ</a></li>
                    <?php if (!isset($_SESSION['userId'])) : ?>
                        <li><a href="<?= PATH ?>page=registration">Đăng ký</a></li>
                        <li><a href="<?= PATH ?>page=login">Đăng nhập</a></li>
                        <!-- <li><a href="<?= PATH ?>page=account">Tài khoản</a></li> -->
                    <?php else : ?>
                        <li><a href=" <?= PATH ?>page=logout">Đăng xuất</a></li>
                        <!-- <li><a href="<?= PATH ?>page=account">Tài khoản</a></li> -->
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class=" row">
            <div class="col-md-12 banner">
                <img src="asset/images/banner.jpg" />
                <br></br>
            </div>
        </div>

    </div>