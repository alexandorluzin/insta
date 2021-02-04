<!-- Footer -->
<footer class="footer container-fluid pl-30 pr-30">
  <div class="row">
    <div class="col-sm-12">
      <p>2021 &copy; Insta. Разработал Лузин</p>
    </div>
  </div>
</footer>
<!-- /Footer -->

<!--  Ajax Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Кнопка выход в шапке -->
<script>
  // Обработка формы через Ajax
  $('#logout').click(function () {
    $.ajax({
      url: 'ajax/logout.php',
      type: 'POST',
      cache: false,
      data: {},
      dataType: 'html',
      success: function (data) {
        document.location.href = "login.php";
      }
    });
  });

 </script>
