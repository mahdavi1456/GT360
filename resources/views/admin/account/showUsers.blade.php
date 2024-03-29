@extends('admin.master')
@section('title', 'کاربران')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('کاربران مرتبط با مشترک: ' . ($account->account_type == 'حقیقی' ? $account->name . ' ' . $account->family : $account->company)) }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if ($actions)
                            <div class="card-header">
                                <a href="{{ route('users.create', ['accountId' => $account->id]) }}" class="pull-left btn btn-primary">ایجاد کاربر</a>
                            </div>
                            @endif
                            <div class="card-body p-0 table-responsive">
                                @if (count($users) > 0)
                                    <table class="table table-hover table-striped table-bordered text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>نام</th>
                                            <th>نام خانوادگی</th>
                                            <th>موبایل</th>
                                            <th>نقش</th>
                                            <th>وضعیت کاربر</th>
                                            <th>دلیل غیرفعال سازی</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->family }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    @if ($user->user_status == 'Active')
                                                        <span class="badge bg-success">فعال</span>
                                                    @else
                                                        <span class="badge bg-danger">غیرفعال</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->deactivation_reason)
                                                        {{ $user->deactivation_reason }}
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    @if ($actions)


                                                    <a href="{{ route('user.editUser', ['accountId' => $account->id, 'userId' => $user->id]) }}"
                                                        class="btn btn-warning btn-sm m-1">ویرایش</a>
                                                    @if ($user->user_type !='admin')
                                                        <form
                                                            action="{{ route('account.users.destroy', ['accountId' => $account->id, 'userId' => $user->id]) }}"
                                                            class="mt-1  m-1" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    id="confirmdelete{{ $user->id }}">حذف کاربر
                                                            </button>
                                                        </form>
                                                        @if ($user->user_status == 'Active')
                                                            <button type="button" name="active"
                                                                    class="btn btn-danger btn-sm Deactive-button"
                                                                    data-toggle="modal" data-target="#exampleModal"
                                                                    id="{{ $user->id }}" value="DeActive"
                                                                    style="height: 39px;margin-top: 4px;">غیرفعال سازی
                                                                کاربر
                                                            </button>
                                                        @elseif ($user->user_status == 'DeActive')
                                                            <form action="{{ route('account.users.activation') }}"
                                                                  class="mt-1  m-1" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id"
                                                                       value="{{ $user->id }}">
                                                                <button type="submit" name="active"
                                                                        class="btn btn-success btn-sm" value="Active">فعال سازی
                                                                    کاربر
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
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
                <form action="{{ route('account.users.activation') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="user_id" name="id" value="">
                        <input type="hidden" id="user_id" name="active" value="DeActive">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.Deactive-button[data-toggle="modal"]').each(function () {
                $(this).click(function () {
                    var userId = $(this).attr("id");
                    $('#user_id').val(userId);
                });
            });
        });
    </script>
    @if ($users->count() > 0)
        @foreach ($users as $user)
            <script>
                $('#confirmdelete{{ $user->id }}').click(function (event) {
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
@endsection
