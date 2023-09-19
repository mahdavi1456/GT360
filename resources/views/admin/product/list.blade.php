<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | فرم پیشرفته</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Persian Data Picker -->
  <link rel="stylesheet" href="../../dist/css/persian-datepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="../../dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="../../dist/css/custom-style.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include("admin.partial.nav")

    @include("admin.partial.aside")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @include("admin.partial.breadcrumb")

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">کتابخانه Select2</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>معمولی</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">مازندران</option>
                    <option>شیراز</option>
                    <option>گلستان</option>
                    <option>اردبیل</option>
                    <option>خوزستان</option>
                    <option>سیستان و بلوچستان</option>
                    <option>مشهد</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>غیرفعال</label>
                  <select class="form-control select2" disabled="disabled" style="width: 100%;">
                    <option selected="selected">مازندران</option>
                    <option>شیراز</option>
                    <option>گلستان</option>
                    <option>اردبیل</option>
                    <option>خوزستان</option>
                    <option>سیستان و بلوچستان</option>
                    <option>مشهد</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>چند انتخابی</label>
                  <select class="form-control select2"  multiple="multiple" data-placeholder="یک استان انتخاب کنید"
                          style="width: 100%;text-align: right">
                    <option>مازندران</option>
                    <option>شیراز</option>
                    <option>گلستان</option>
                    <option>اردبیل</option>
                    <option>خوزستان</option>
                    <option>سیستان و بلوچستان</option>
                    <option>مشهد</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>نتیجه غیرفعال</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">مازندران</option>
                    <option>شیراز</option>
                    <option disabled="disabled">گلستان (غیرفعال)</option>
                    <option>اردبیل</option>
                    <option>خوزستان</option>
                    <option>سیستان و بلوچستان</option>
                    <option>مشهد</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            برای کسب اطلاعات بیشتر و استفاده از راهنمای این کتابخانه به <a href="https://select2.github.io/">مستندات</a> مراجعه کنید
          </div>
        </div>
        <!-- /.card -->

        <div class="row">
          <div class="col-md-6">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">قالب آماده ورودی</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>قالب تاریخ :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control ltr" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control ltr" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>قالب شماره تلفن:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control ltr" data-inputmask='"mask": "99-9999-9999"' data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>قالب شماره همراه:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control"
                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- IP mask -->
                <div class="form-group">
                  <label>قالب آی پی:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-laptop"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">رنگ و زمان</h3>
              </div>
              <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                  <label>انتخاب رنگ :</label>
                  <input type="text" class="form-control my-colorpicker1">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                  <label>انتخاب رنگ با دکمه :</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-square"></i></span>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- time Picker -->
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>انتخاب زمان :</label>

                    <div class="input-group">
                      <input type="text" class="form-control timepicker">

                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">انتخاب تاریخ </h3>
              </div>
              <div class="card-body">
                <!-- Date range -->
                <div class="form-group">
                  <label>انتخاب تاریخ:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input class="normal-example form-control" />
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <p>استفاده از کتابخانه باباخانی، برای تغییرات <a href="http://babakhani.github.io/PersianWebToolkit/doc/datepicker/">مستندات این کتابخانه</a> را مشاهده کنید </p>
              </div>
            </div>
            <!-- /.card -->

            <!-- iCheck -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">iCheck - چک‌باکس و رادیو</h3>
              </div>
              <div class="card-body">
                <!-- Minimal style -->

                <!-- checkbox -->
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal" checked>
                  </label>
                  <label>
                    <input type="checkbox" class="minimal">
                  </label>
                  <label>
                    <input type="checkbox" class="minimal" disabled>
                    نمونه چک باکس
                  </label>
                </div>

                <!-- radio -->
                <div class="form-group">
                  <label>
                    <input type="radio" name="r1" class="minimal" checked>
                  </label>
                  <label>
                    <input type="radio" name="r1" class="minimal">
                  </label>
                  <label>
                    <input type="radio" name="r1" class="minimal" disabled>
                    نمونه رادیو
                  </label>
                </div>

                <!-- Minimal red style -->

                <!-- checkbox -->
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal-red" checked>
                  </label>
                  <label>
                    <input type="checkbox" class="minimal-red">
                  </label>
                  <label>
                    <input type="checkbox" class="minimal-red" disabled>
                    قالب قرمز چک باکس
                  </label>
                </div>

                <!-- radio -->
                <div class="form-group">
                  <label>
                    <input type="radio" name="r2" class="minimal-red" checked>
                  </label>
                  <label>
                    <input type="radio" name="r2" class="minimal-red">
                  </label>
                  <label>
                    <input type="radio" name="r2" class="minimal-red" disabled>
                    قالب قرمز رادیو
                  </label>
                </div>

                <!-- Minimal red style -->

                <!-- checkbox -->
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="flat-red" checked>
                  </label>
                  <label>
                    <input type="checkbox" class="flat-red">
                  </label>
                  <label>
                    <input type="checkbox" class="flat-red" disabled>
                    قالب فلت سبز چک باکس
                  </label>
                </div>

                <!-- radio -->
                <div class="form-group">
                  <label>
                    <input type="radio" name="r3" class="flat-red" checked>
                  </label>
                  <label>
                    <input type="radio" name="r3" class="flat-red">
                  </label>
                  <label>
                    <input type="radio" name="r3" class="flat-red" disabled>
                    قالب فلت سبز رادیو
                  </label>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                و چندین رنگ و مدل دیگر <a href="http://fronteed.com/iCheck/">مستندات کتاب خانه</a>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- Persian Data Picker -->
<script src="../../dist/js/persian-date.min.js"></script>
<script src="../../dist/js/persian-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()


    $('.normal-example').persianDatepicker();




  })
</script>

</body>
</html>
