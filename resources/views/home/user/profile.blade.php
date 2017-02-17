<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改头像</title>
    <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="/homes/bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
    <script src="/homes/bootstrap/js/holder.js"></script>
    <style type="text/css">
        .content {
             overflow: auto;
        }
        .form_table {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px 0 0;
        }
        .form_table th {
            color: #545454;
            text-align: right;
        }
        .form_table td {
            height: 30px;
            padding: 6px 0 5px 10px;
        }
        .t_r {
            text-align: right;
        }
        .pop_win {
            background-color: #fffcf3;
            border: 1px solid #fde4c7;
            max-height: 430px;
            overflow: auto;
            position: relative;
            width: 100%;
        }
        .pop_win table.form_table td {
            padding: 5px;
        }
        .pop_win table.form_table td.t_r {
            text-align: right;
        }
        .pop_win .form_table {
            margin-top: 10px;
        }
        .pop_win .form_table td {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            vertical-align: middle;
        }
    </style>
</head>
<body>
   <div style="width:400px;height:150px;">
   <div class="pop_win">
    <div class="content">
        <form enctype="multipart/form-data" method="post" action="/user/profile">
            <table class="form_table">
                <colgroup>
                    <col width="120px">
                    <col>
                </colgroup>
                <tbody>
                <tr>
                    <td class="t_r">选择图片文件：</td>
                    <td><input type="file" name="profile" class="file"></td>
                </tr>
            </tbody></table>
        </form>
    </div>
</div>
    </div>
</body>
</html>
