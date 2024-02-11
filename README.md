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
