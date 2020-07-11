<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-11 22:10:09
  from 'C:\xampp\htdocs\playadice\templates\PLDupload.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0a1ca1a482c0_65120137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4881aaa3adfa8cfc9472e3945e79f27800d569f2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\playadice\\templates\\PLDupload.tpl',
      1 => 1594498206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0a1ca1a482c0_65120137 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<body>

<form action="../upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
<?php }
}
