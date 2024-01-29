<div class="row " id="image-part">
    <table class="table table-borderd">
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
                    <td >{{ $image->key }}</td>
                    <td>
                        <img style="max-width: 200px" src="{{ asset(ert('tsp') . $image->value) }}" class="object-fit-contain w-100">
                    </td>
                    <td> <a href="#" class="btn btn-danger"> <i class=" fa fa-trash"></i></a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
