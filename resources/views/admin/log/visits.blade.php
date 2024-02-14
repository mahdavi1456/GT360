@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('بازدید صفحات - ' . fa_number($visits->total())) }}

        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>ip</label>
                                            <input type="text" name="ip" value="{{ $request->ip }}"
                                                class="form-control form-control-sm" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>url</label>
                                            <input type="text" name="url" value="{{ $request->url }}"
                                                class="form-control form-control-sm" />
                                        </div>
                                        @php

                                        @endphp
                                        <div class="col-md-2 form-group">
                                            <label>browser</label>
                                            <select class="form-control select2" multiple name="browser[]">
                                                {{-- <option value="">همه</option> --}}
                                                <option value="Chrome"
                                                    {{ in_array('Chrome',$request->browser??[]) ? 'selected' : '' }}>Chrome
                                                </option>
                                                <option value="Firefox"
                                                    {{ in_array('Firefox',$request->browser??[]) ? 'selected' : '' }}>Firefox
                                                </option>
                                                <option value="Safari"
                                                    {{ in_array('Safari',$request->browser??[]) ? 'selected' : '' }}>Safari
                                                </option>
                                                <option value="Edge" {{ in_array('Edge',$request->browser??[]) ?'selected' : '' }}>
                                                    Edge
                                                </option>
                                                <option value="Opera" {{ in_array('Opera',$request->browser??[]) ? 'selected' : '' }}>
                                                    Opera
                                                </option>

                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>device</label>
                                            <select class="form-control select2" multiple name="device[]">
                                                {{-- <option value="" >همه
                                                </option> --}}
                                                <option value="Windows"
                                                    {{  in_array('Windows',$request->device??[])? 'selected' : '' }}>Windows
                                                </option>
                                                <option value="Android"
                                                    {{  in_array('Android',$request->device??[]) ? 'selected' : '' }}>Android
                                                </option>
                                                <option value="Linux" {{  in_array('Linux',$request->device??[]) ? 'selected' : '' }}>
                                                    Linux
                                                </option>
                                                <option value="iOS" {{  in_array('iOS',$request->device??[])? 'selected' : '' }}>
                                                    iOS
                                                </option>
                                                <option value="BlackBerry OS"
                                                    {{ in_array('BlackBerry OS',$request->device??[])? 'selected' : '' }}>BlackBerry
                                                    OS
                                                </option>
                                                <option value="Windows Phone"
                                                    {{ in_array('Windows Phone',$request->device??[]) ? 'selected' : '' }}>Windows
                                                    Phone
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>از تاریخ</label>
                                            <input type="text" name="from" id="from" placeholder="از..."
                                                value="{{ $request->from }}"
                                                class="datePicker form-control form-control-sm" autocomplete="off" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>تا تاریخ</label>
                                            <input type="text" name="to" id="to" value="{{ $request->to }}"
                                                placeholder="تا..." class="datePicker form-control form-control-sm"
                                                autocomplete="off" />
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-info mr-auto check-validity"><i
                                                    class="fa fa-filter"></i>فیلتر</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                @if (count($visits) > 0)
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>ip</th>
                                            <th>url</th>
                                            <th>route</th>
                                            <th>browser</th>
                                            <th>device</th>
                                            <th>date</th>
                                        </tr>
                                        @foreach ($visits as $key => $visit)
                                            <tr>
                                                <td>{{ $visits->firstItem() + $key }}</td>
                                                <td>{{ $visit->ip }}</td>
                                                <td>{{ $visit->url }}</td>
                                                <td>{{ $visit->route }}</td>
                                                <td>{{ $visit->browser }}</td>
                                                <td>{{ $visit->device }}</td>
                                                <td>{{ zaman($visit->created_at) }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست. </div>
                                @endif
                            </div>
                            <div class="">
                                {!! $visits->withQueryString()->links() !!}
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
    <script type="text/javascript">
        $(function() {
            $("#from, #to").persianDatepicker({
                initialValue: false,
                obsever: true,
                format: 'YYYY/MM/DD',
                autoClose: true
            });
        });
    </script>
@endsection
