### Seeders
```
Username: 09139999999
Password: password
```

### Sweet Alert Samples
#### Confirm
```
Swal.fire({
    title: "اخطار",
    text: "آیا از حذف این فایل اطمینان دارید؟",
    icon: "warning",
    showDenyButton: true,
    confirmButtonText: "بله",
    denyButtonText: "خیر"
}).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        form.submit();
        Swal.fire("عملیات موفق", "فایل با موفقیت حذف شد.", "success");
    } else if (result.isDenied) {
        //
    }
});
```
#### Alert
```
Swal.fire("Title", "Text", "success");
```

### Sessions Data

```
auth()->id();
auth()->user()->account->id;
```

<hr>

### Site Engine
#### Make Instance of SiteEngine Model
```
$siteEngine = new SiteEngine;
```

#### Get Post Items of Components
```
$siteEngine->getPosts($componentName = null, $limit = null)
```

###### Input
Parameter | Data Type  | Details
--- | --- | ---
componentName | `string` | `news`, `events`, `gallery`, etc.
limit | `integer`  | Number of Items to Return.

###### Output
```
Collection of Model
```

#### Get Data of Post Item in Single
```
$siteEngine->getPost($slug)
```


#### Get Single URL of Post, Page and Product Item
```
$model->showUrl()
```

### Get Image URL of Post, Page and Product
```
$model->imageUrl()
```
