<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-30 18:38:49
  from 'D:\XAMPP2\htdocs\playadice\templates\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efb6a99ae9ce7_23213469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6f8996e8a76732dc4124210a7ad3f82a71201df' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\playadice\\templates\\navbar.tpl',
      1 => 1593534567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efb6a99ae9ce7_23213469 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
                <ul class="navbar-nav">
                        <ul class="navbar-nav">
                                <a class="nav-link" href=""> &nbsp;Benvenuto <?php echo $_smarty_tpl->tpl_vars['Username']->value;?>
 </a>
                                <a class="nav-link space" href=""> &nbsp;Spazio43</a>
                                <a class="nav-link" href="mainviewant.php"> &nbsp;Eventi</a>
                                <a class="nav-link" href="#download"> &nbsp;Giochi</a>
                                <a class="nav-link" href="#../main.php"> &nbsp;AreaTWG</a>
                        </ul>
                </ul>
        </div>
        <div class="container">
        </div>

        <li><a href="/playadice/user/login"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>

        <a class="btn navbar-btn ml-md-2 btn-light text-dark">Login/Logout</a>

        <a href="" class="nav-link space"> &nbsp;Spazio</a>
        <ul class="navbar-nav flex-row justify-content-center mt-2 mt-md-0">
                <li class="nav-item mx-3 mx-md-1">
                        <a class="nav-link" href="https://www.facebook.com/Playadice/?epa=SEARCH_BOX" data-placement="bottom" data-toggle="tooltip" title="Like us on Facebook">
                                <i class="fa fa-fw fa-facebook-official fa-2x"></i>
                        </a>
                </li>
                <li class="nav-item ml-1">
                        <a class="nav-link" href="https://www.instagram.com/playadiceofficial/?hl=it" data-placement="bottom" data-toggle="tooltip" title="Follow us on Instagram">
                                <i class="fa fa-fw fa-instagram fa-2x"></i>
                        </a>
                </li>
        </ul>
</nav><?php }
}
