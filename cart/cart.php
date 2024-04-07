      <div class="row content">
         <?php
            if (!isset($_SESSION['user'])) {
                echo "<p> Vui lòng đăng nhập trước khi xem giỏ hàng</p>";
                exit();
            }
            if (!isset($_SESSION['cart']) || $_SESSION['number_of_item'] == 0) {
                echo "<p> Chưa có sản phẩm trong giỏ hàng </p>";
            } else {



            ?>
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
                 <?php
                }
                    ?>
                 <div class="p-2 text-end">
                     <p>
                         <button type="submit" class="btn btn-success"> Cập nhập </button>
                         <a href="<?= PATH ?>page=removeCart"> <button type="button" class="btn btn-success"> Hủy giỏ hàng </button></a>
                         <a href="<?= PATH ?>page=buyCart"> <button type="button" class="btn btn-success"> Thanh toán </button></a>
                 </div>
                 </p>

                 </form>
             </div>
     </div>



      