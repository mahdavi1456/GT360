## Seeder

```
Username: 09139999999
Password: password
```

## Sweet Alert Samples

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

```
Swal.fire("Title", "Text", "success");
```

## Sessions Data

```
auth()->id();
auth()->user()->account->id;
```

## work with site engine

### all below functions exists in post,page,product 

#### on siteEngine model

##### getPosts($componentName = null, $limit = null)

$componentName: we can get post of a specific component. default null: latest post. 
$limit: A number that specifies the number of posts we want. default null: it bring all of theme.
note:for page and product we have not componentName so: getpages($limit = null)
##### getPost($slug)

get post by slug

#### on post model

##### show_url()

example: $post->show_url() // it generate a link to single of post,place it in href attribute

##### image_url()

example: $post->image_url() // it generate a link to image of post,place it in src attribute

