@extends('admin.master')
@section('title', 'مشترکین')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('مشترکین') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('accounts.search') }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">نام</label>
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="نام...">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="family">نام خانوادگی</label>
                                                <input type="text" class="form-control" name="family"
                                                       placeholder="نام خانوادگی...">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="company">نام شرکت</label>
                                                <input type="text" class="form-control" name="company"
                                                       placeholder="نام شرکت...">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">جستجو</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-0">
                                @if (count($accounts) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center">
                                            <tr class="table-warning">
                                                <th class="px-4">#</th>
                                                <th class="px-4">نوع اکانت</th>
                                                <th class="px-4">نام</th>
                                                <th class="px-4">نام خانوادگی</th>
                                                <th class="px-4">موبایل</th>
                                                <th class="px-4">وضعیت اکانت</th>
                                                <th class="px-4">دلیل غیرفعال سازی</th>
                                                <th class="px-4">عملیات</th>
                                            </tr>
                                            <tbody>
                                                @foreach ($accounts as $account)
                                                    <tr>
                                                        <td>{{ fa_number($loop->index + 1) }}</td>
                                                        <td>{{ $account->account_type }}</td>
                                                        <td>{{ $account->name }}</td>
                                                        <td>{{ $account->family }}</td>
                                                        <td>{{ fa_number($account->mobile) }}</td>
                                                        <td>
                                                            @if ($account->account_status == 'active')
                                                                <span class="badge bg-success" style="font-size: 17px;color: #FFF !important;">فعال</span>
                                                            @elseif ($account->account_status == 'waiting')
                                                                <span class="badge bg-warning" style="font-size: 17px;color: #FFF !important;">درانتظار تایید</span>
                                                            @elseif ($account->account_status == 'deActive')
                                                                <span class="badge bg-danger" style="font-size: 17px;color: #FFF !important;">غیرفعال</span>
                                                            @endif
                                                        </td>
                                                        @if ($account->deactivation_reason)
                                                            <td>{{ $account->deactivation_reason }}</td>
                                                        @else
                                                            <td class="w-auto text-center">------</td>
                                                        @endif
                                                        <td class="d-flex">
                                                            <a href="{{ route('user.showUsers', ['accountId' => $account->id]) }}"
                                                                class="btn btn-primary btn-sm mx-1">مشاهده کاربران</a>
                                                            <a href="{{ route('account.edit', $account->id) }}"
                                                                class="btn btn-warning btn-sm mx-1"><i class="fa fa-edit"></i></a>
                                                                <form action="{{ route('account.destroy', $account->id) }}"
                                                                    method="POST" style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                                            id="confirmdelete{{ $account->id }}"><i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                                @if ($account->account_status == 'active')
                                                                    <button type="button" name="active"
                                                                            class="btn btn-danger btn-sm Deactive-button"
                                                                            data-toggle="modal" data-target="#exampleModal"
                                                                            id="{{ $account->id }}" value="deActive"
                                                                            style="height: 39px; margin-top: 4px;">غیرفعال
                                                                        سازی
                                                                    </button>
                                                                @elseif ($account->account_status == 'deActive')
                                                                    <form action="{{ route('account.activation') }}"
                                                                        class="mt-1  m-1" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="id"
                                                                               value="{{ $account->id }}">
                                                                        <button type="submit" name="active"
                                                                                class="btn btn-success btn-sm" value="active">
                                                                            فعال سازی
                                                                        </button>
                                                                    </form>
                                                                @elseif ($account->account_status == 'waiting')
                                                                    <button type="button" name="active"
                                                                            class="btn btn-danger btn-sm Deactive-button"
                                                                            data-toggle="modal" data-target="#exampleModal"
                                                                            id="{{ $account->id }}" value="deActive"
                                                                            style="height: 39px; margin-top: 4px;">غیرفعال
                                                                        سازی
                                                                    </button>
                                                                    <form action="{{ route('account.activation') }}"
                                                                          class="mt-1  m-1" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="id"
                                                                               value="{{ $account->id }}">
                                                                        <button type="submit" name="active"
                                                                                class="btn btn-success btn-sm" value="active">
                                                                            فعال سازی
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">دلیل غیرفعال سازی</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('account.activation') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="user_id" name="id" value="">
                        <input type="hidden" id="user_id" name="active" value="deActive">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">پیام <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="message-text" name="reseaon" required
                                      oninvalid="this.setCustomValidity('.لطفا پیام را وارد کنید')"
                                      oninput="this.setCustomValidity('')"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if ($accounts->count() > 0)
        @foreach ($accounts as $account)
            <script>
                $('#confirmdelete{{ $account->id }}').click(function (event) {
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
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            </script>
        @endforeach
    @endif
    <script>
        $(document).ready(function () {
            $('.Deactive-button[data-toggle="modal"]').each(function () {
                $(this).click(function () {
                    var userId = $(this).attr("id");
                    $('#user_id').val(userId);
                });
            });
        });
    </script>
@endsection
