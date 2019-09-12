<?php
    if (!empty($_FILES)) {
        //Xem $_FILES có gì
//        var_dump($_FILES);
//        die();

        //lấy tên file
        $file_name = basename($_FILES["hinh"]["name"]);

        //lưu tại vị trí
        $target = 'hinh/' . $file_name;

        /***
         * lấy target insert xuống database
         * ví dụ: $obj_user = new users(); $obj_user->insert($target)
         * Đã trình bày rõ trong file excel, xem lại và làm tương tự
         * không trình bày phần insert ở đây
         */

        //lưu file
        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target);

    }
?>
<html>
    <head>

    </head>

    <body>

        <form enctype="multipart/form-data" method="POST">

            File <input type='file' name='hinh'>
            <input type='submit'>

        </form>

    </body>
</html>