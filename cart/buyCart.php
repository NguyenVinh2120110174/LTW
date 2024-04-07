<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_detail = array(

        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],

    );
    $f->addRecord("order_detail", $order_detail);
}
?> -->


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?page=checkout" method="post" enctype="multipart/form-data" id="formLogin">
    <div class="container">
        <h1> Thanh toán </h1>
        <label for="email"><b>Họ và tên</b></label>
        <input type="text" placeholder="Họ và tên" name="name" required>

        <label for="text"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Địa chỉ" id="pwd" name="address" required>

        <label for="text"><b>Email</b></label>
        <input type="email" placeholder="Địa chỉ" id="email" name="email" required>

        <label for="text"><b>Số điện thoại</b></label>
        <input type="number" placeholder="0123456789" id="pwd" name="phone" required>
        </from>
        <a href=" <?= PATH ?>page=checkout"><button type="submit">Xác nhận</button></a>
        <a href="<?= PATH ?>page=cart"> <button type="button" class="btn btn-success"> Quay lại giỏ hàng </button></a>
    </div>




    <h1> Giỏ hàng </h1>
    <div class="col-sm-12">
        <form action="<?= PATH ?>page=cart" method="post">
            <table class="table table-hover table-bordered js-copytextarea dataTable no-footer" cellpadding="0" cellspacing="0" border="0" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                <thead>
                    <tr role="row">
                        <th width="10" class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 70px;"><input type="checkbox" id="all"></th>
                        <th width="300" class="text-center" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 2px;">Hình ảnh</th>
                        <th width="300" class="text-center" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Tên sản phẩm: activate to sort column ascending" style="width: 200px;">Tên sản phẩm</th>
                        <th class="text-center" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Ngày sinh: activate to sort column ascending" style="width: 100px;">Đơn giá</th>
                        <th class="text-center" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Giới tính: activate to sort column ascending" style="width: 100px;">Số lượng</th>
                        <th class="text-center" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="SĐT: activate to sort column ascending" style="width: 100px;">Thành tiền</th>
                        <th width="100" class="text-center" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Tính năng: activate to sort column ascending" style="width: 110px;">Hành động</th>
                        <th width="100" class="text-center" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Tính năng: activate to sort column ascending" style="width: 100px;">ID</th>
                    </tr>
                    <?php
                    $cart = $_SESSION['cart'];
                    $a = $_SESSION['amount'];
                    $n = count($cart);
                    $txt = "(";
                    for ($i = 0; $i < $n; $i++) {
                        $txt .= $cart[$i];
                        if ($i < $n - 1) {
                            $txt .= ",";
                        }
                    }
                    $txt .= ")";
                    $sql = "SELECT * FROM product WHERE id IN " . $txt;




                    $result = $f->getAll($sql);
                    $i = 0;
                    $s = 0;
                    foreach ($result as $c) :
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $q = $_POST['amount' . $i];
                            $_SESSION['amount'][$i] = $q;
                        } else {
                            $q = $a[$i];
                        }

                    ?>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td width="10" class="sorting_1"><input type="checkbox" name="check1" value="1"></td>
                        <td class="text-center"><img class="img-card-person" src="asset/images/<?= $c['image'] ?>" style="width: 80px" alt=""></td>
                        <td class="text-center"><?= $c['name'] ?></td>
                        <td class="text-center"><?= $c['price'] ?></td>
                        <td class="text-center"><input class="text-center" type=number name="amount<?= $i ?>" value="<?= $q; ?>" min="1" max="10"></td>
                        <td class="text-center"><?= $c['price'] * $q ?></td>
                        <td class="text-center">
                            <a href="<?= PATH ?>page=removeItemCart&id=<?= $c['id'] ?>"><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                                <!-- <button class="btn btn-success" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                 <button class="btn btn-warning" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fa-solid fa-eye"></i></button>
                                 <button class="btn btn-danger" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fa-solid fa-envelope"></i></button> -->
                        </td>

                        <td class="text-center"><?= $c['id'] ?></td>
                    </tr>
                <?php
                        $s += $c['price'] * $q;
                        $i++;
                    endforeach;
                ?>
                <th colspan="7">Tổng cộng</th>
                <th colspan="3"><?= $s; ?></th>




                </tbody>
            </table>



        </form>
    </div>
    </div>

    <style>
        /* Bordered form */


        h1 {
            text-align: center;
            color: green;
        }


        /* Full-width inputs */
        input[type=text],
        input[type=password],
        input[type=email],
        input[type=number] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }






        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        /* Avatar image */
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The " Forgot password" text */
        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>