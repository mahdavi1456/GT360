@extends('admin.master')
@section('title', 'Account')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb("کاربران مرتبط با اکانت: $account->name") }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <a href="{{ route('users.create', ['accountId' => $account->id]) }}"
                                        class="pull-left btn btn-primary text-white mt-2 ml-2">ایجاد کاربر</a>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                @if (count($users) > 0)
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="px-4">نام</th>
                                                <th class="px-4">نام خانوادگی</th>
                                                <th class="px-4">موبایل</th>
                                                <th class="px-4">وضعیت کاربر</th>
                                                <th class="px-4">دلیل غیرفعال سازی</th>
                                                <th class="px-4">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->family }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td>
                                                        @if ($user->user_status == 'Active')
                                                            <span class="badge bg-success" style="font-size: 17px;color: #FFF !important;">فعال</span>
                                                        @else
                                                            <span class="badge bg-danger" style="font-size: 17px;color: #FFF !important;">غیرفعال</span>
                                                        @endif

                                                    </td>
                                                    @if($user->deactivation_reason)
                                                    <td>{{ $user->deactivation_reason }}</td>
                                                    @else
                                                    <td>  ---- </td>
                                                    @endif
                                                    <td class="d-flex"><a
                                                            href="{{ route('user.editUser', ['accountId' => $account->id, 'userId' => $user->id]) }}"
                                                            class="btn btn-warning  m-1">ویرایش</a>
                                                        <form
                                                            action="{{ route('account.users.destroy', ['accountId' => $account->id, 'userId' => $user->id]) }}"
                                                            class="mt-1  m-1" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" id="confirmdelete{{ $user->id }}">حذف کاربر</button>
                                                        </form>
                                                        @if ($user->user_status == 'Active')
                                                            <button type="button" name="active"
                                                                class="btn btn-danger Deactive-button" data-toggle="modal"
                                                                data-target="#exampleModal" id="{{ $user->id }}"
                                                                value="DeActive" style="height: 39px;margin-top: 4px;">غیرفعال سازی کاربر</button>
                                                        @elseif ($user->user_status == 'DeActive')
                                                            <form action="{{ route('account.users.activation') }}"
                                                                class="mt-1  m-1" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $user->id }}">
                                                                <button type="submit" name="active"
                                                                    class="btn btn-success" value="Active">فعال سازی
                                                                    کاربر</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست. </div>
                                @endif
                            </div>
                        </div>
                    </div>
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
                    <form action="{{ route('account.users.activation') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="user_id" name="id" value="">
                        <input type="hidden" id="user_id" name="active" value="DeActive">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">پیام <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message-text" name="reseaon" required  oninvalid="this.setCustomValidity('.لطفا پیام را وارد کنید')"
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
    <script>
        $(document).ready(function() {
            $('.Deactive-button[data-toggle="modal"]').each(function() {
                $(this).click(function() {
                    var userId = $(this).attr("id");
                    $('#user_id').val(userId);
                });
            });
        });
    </script>

@if ($users->count() > 0)
@foreach ($users as $user)
<script>
    $('#confirmdelete{{ $user->id }}').click(function(event) {
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
