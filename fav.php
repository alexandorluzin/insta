<?php
  require_once __DIR__ . '/classes/User.php';
  require_once __DIR__ . '/classes/Favorite.php';

  $user = new User();

  // Получаем данные об авторизованном пользователе
  $user1 = $user->getUser($_COOKIE['id']);


  // Проверяем сходятся ли id и hash
  $check = $user->checkUser($user1);

  // Получаем всех пользователей для таблицы
  $favs = new Favorite();
  $favs = $favs->getfavs($_COOKIE['id']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    require_once __DIR__ . "/blocks/head.php";
  ?>

  <!-- Data table CSS -->
	<link href="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/>


	<!-- Custom CSS -->
	<link href="https://ratatuiperm.ru/ratatuiadmin/dist/css/style.css" rel="stylesheet" type="text/css">

  <!-- Дополниельный CSS -->
	<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

  <?php

    require_once __DIR__ . "/blocks/header.php";
    require_once __DIR__ . "/blocks/leftsidemenu.php";

  ?>

		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

        <!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Избранные пользователи - Insta</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="">
                      <!-- <button class="btn btn-danger btn-anim btn-sm pull-right p-5" id="delete"><i class="fa fa-trash-o"></i><span class="btn-text">удалить объявление</span></button> -->
											<table id="example" class="table table-hover display pb-30">
												<thead>
													<tr>
                            <th>Закладки</th>
														<th>ID</th>
														<th>ФИО</th>
														<th>Телефон</th>




													</tr>
												</thead>

												<tbody>

                          <?php
                            foreach ($favs as $fav) {
                              $fav_user = $user->getUser($fav->fav_id);
                              ?>
                            <tr id="row">
                              <td>
                                <div id="fav" data_user_id="<?=$fav->fav_id;?>" >
                                  <i class="fa fa-star mr-20 active-fav" style="cursor: pointer"></i>
                                </div>
                              </td>
                              <td><?=$fav->fav_id;?></td>
                              <td><?=$fav_user->firstName;?> <?=$fav_user->lastName;?></td>
                              <td><a href="tel:<?=$fav_user->tel;?>"><?=$fav_user->tel;?></a></td>

                            </tr>

                        <?php } ?>

												</tbody>
											</table>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->








        </div>

        <?php

          require_once __DIR__ . "/blocks/footer.php";

        ?>
			</div>
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

	<!-- JavaScript -->

  <!-- jQuery -->
  <script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Data table JavaScript -->
	<script src="https://ratatuiperm.ru/ratatuiadmin/dist/js/dataTables-data.js"></script>

  <!-- Data table JavaScript -->
	<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="https://ratatuiperm.ru/ratatuiadmin/dist/js/responsive-datatable-data.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="https://ratatuiperm.ru/ratatuiadmin/dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="https://ratatuiperm.ru/ratatuiadmin/vendors/bower_components/switchery/dist/switchery.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="https://ratatuiperm.ru/ratatuiadmin/dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="https://ratatuiperm.ru/ratatuiadmin/dist/js/init.js"></script>

  <script src="https://yandex.st/jquery/cookie/1.0/jquery.cookie.js"></script>
  <!-- <script src="vendors/carhartl-jquery-cookie-v1.4.1-0-g7f88a4e.zip"></script> -->



  <script>
      $(document).ready(function () {

        $('div #fav').click(function() {
          // Находим id пользователя, которого хотим добавить в закладки
          var fav_id = $(this).attr('data_user_id');
          var row = $(this);
          $.ajax({
            url: 'ajax/fav.php',
            type: 'POST',
            cache: false,
            data: {'fav_id' : fav_id},
            dataType: 'html',
            success: function (data) {

              row.closest('tr').remove();
            }
          });
        });



        $('#example').dataTable( {
          "order": [[ 1, "asc" ]],
          "iDisplayLength": 10,
          "aLengthMenu": [[ 10, 20, 50, 100 ,-1],[10,20,50,100,"все"]]
        });

      });
  </script>

</body>

</html>
