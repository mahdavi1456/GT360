@extends('admin.master')
@section('title', 'Component List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('بخش ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <div class="row">
                                @if ($components->count() > 0)
                                    @foreach ($components as $component)
                                        <div class="col-3">
                                            <div class="card text-center">
                                                <div class="card-header">{{ $component->label }}</div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $component->slogan }}</h5>
                                                    <p class="card-text">{{ $component->details }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="{{ route('post.index', ['component_id' => $component->id]) }}" class="btn btn-info">لیست محتوا</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger m-2 text-center">
                                        موردی جهت نمایش موجود نیست.
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')

    @if ($components->count() > 0)
        @foreach ($components as $component)
            <script>
                $('#confirmdelete{{ $component->id }}').click(function(event) {
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
