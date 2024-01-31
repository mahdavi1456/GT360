<div class="row " id="image-part">
    <div class="col-12">
        <table class="table table-borderd px-3">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>تصویر</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td>{{ $image['key'] }}</td>
                        <td>
                            <img style="max-width: 200px" src="{{ asset(ert('tsp') . $image['value']) }}"
                                class="object-fit-contain w-100">
                        </td>
                        <td> <button class="btn btn-danger" onclick="destroyImage('{{$image['key']}}')"> <i class=" fa fa-trash"></i></button> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div class="col-12">
</div>
