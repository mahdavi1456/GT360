@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{ breadcrumb('تنظیمات فروشگاه') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header d-flex p-0">
                              <h3 class="card-title p-3">تب‌ها</h3>
                              <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">تب 1</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">تب 2</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">تب 3</a></li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                    آبشاری <span class="caret"></span>
                                  </a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" tabindex="-1" href="#">منو ۱</a>
                                    <a class="dropdown-item" tabindex="-1" href="#">منو ۲</a>
                                    <a class="dropdown-item" tabindex="-1" href="#">منو ۳</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" tabindex="-1" href="#">لینک</a>
                                  </div>
                                </li>
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                  لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                  لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                  لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                </div>
                                <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                          </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    @if ($products->count() > 0)
        @foreach ($products as $product)
            <script>
                $('#confirmdelete{{ $product->id }}').click(function(event) {
                    var form = $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    Swal.fire({
                            title: `آیا مطمئنید؟`,
                            text: "این مورد برای همیشه حذف خواهد شد.",
                            icon: "warning",
                            showCancelButton: true,
                            cancelButtonText: 'انصراف',
                            confirmButtonText: 'تایید',
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                });
            </script>
        @endforeach
    @endif

@endsection
