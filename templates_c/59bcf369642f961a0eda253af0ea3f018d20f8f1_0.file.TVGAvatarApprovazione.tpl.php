<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-09 13:06:23
  from 'D:\XAMPP2\htdocs\playadice\templates\TVGAvatarApprovazione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f06fa2f6c9c83_25125764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59bcf369642f961a0eda253af0ea3f018d20f8f1' => 
    array (
      0 => 'D:\\XAMPP2\\htdocs\\playadice\\templates\\TVGAvatarApprovazione.tpl',
      1 => 1594292780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5f06fa2f6c9c83_25125764 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
  <link rel="stylesheet" href="../Pld/now-ui-kit.css" type="text/css">
  <link rel="stylesheet" href="../Pld/assets/css/nucleo-icons.css" type="text/css">
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">

    <style>
        .grid-container-4 {
            display: grid;
            grid-template-columns: auto auto auto auto;
            padding: 5px;
        }
        .grid-container-1 {
            display: grid;
            grid-template-columns: auto;
            padding: 5px;
        }
        .grid-item {
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 10px;
            font-size: 20px;
            text-align: justify-all;
        }
    </style>

</head>

<body class="">

<?php $_smarty_tpl->assign('Username',$_smarty_tpl->smarty->registered_objects['user'][0]->getUsername(array(),$_smarty_tpl));?>


<!-- Navbar here -->
<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <!-- Sezione Proposta -->
<div style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
  <br>
  <?php if ($_smarty_tpl->tpl_vars['proposta']->value->getTipoProposta() == "Creazione") {?>

    <div class="" style="Text-align:center">
      <p style="color:White;">Proposta di Creazione di questo Avatar: </p>
    </div>
    <div class="" style="Text-align:center">
      <p style="color:White;"> Proprietario : <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->GetProprietario()->GetUsername();?>
 </p>
    </div>

      <div class="grid-container-1">

    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getNome();?>
 </p>
    </div>
    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getClasse();?>
 </p>
    </div>
    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getRazza();?>
 </p>
    </div>
    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getLivello();?>
 </p>
    </div>

      </div>

  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['proposta']->value->getTipoProposta() == "Modifica") {?>

      <div class="" style="Text-align:center">
          <p style="color:White;">Proposta di Modifica di questo Avatar: </p>
      </div>

      <div class="" style="Text-align:center">
          <p style="color:White;">Proprietario : <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->GetProprietario()->GetUsername();?>
</p>
      </div>

      <br>

      <div class="grid-container-4" align="center">
          <div>
            <div class="grid-item" style="Text-align:center">
              <p style="color:White;">Vecchio nome:</p>
            </div>
            <div class="grid-item" style="Text-align:center">
              <p style="color:White;">Vecchia classe:</p>
            </div>
            <div class="grid-item" style="Text-align:center">
              <p style="color:White;">Vecchia razza:</p>
            </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;">Vecchio livello:</p>
              </div>
          </div>
          <div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getNome();?>
</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getClasse();?>
</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getRazza();?>
</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getLivello();?>
</p>
              </div>
          </div>
          <div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;">Nuovo nome:</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;">Nuova classe:</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;">Nuova razza:</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;">Nuovo livello:</p>
              </div>
          </div>
          <div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getNome();?>
</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getClasse();?>
</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getRazza();?>
</p>
              </div>
              <div class="grid-item" style="Text-align:center">
                  <p style="color:White;"><?php echo $_smarty_tpl->tpl_vars['proposta']->value->getProposto()->getLivello();?>
</p>
              </div>
          </div>
      </div>

  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['proposta']->value->getTipoProposta() == "Cancellazione") {?>

    <div class="" style="Text-align:center">
      <p style="color:White;">Proposta di Cancellazione di questo Avatar: </p>
    </div>
    <div class="" style="Text-align:center">
      <p style="color:White;"> Proprietario : <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->GetProprietario()->GetUsername();?>
 </p>
    </div>
    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getNome();?>
 </p>
    </div>
    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getClasse();?>
 </p>
    </div>
    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getRazza();?>
 </p>
    </div>
    <div class="grid-item" style="Text-align:center">
      <p style="color:White;"> <?php echo $_smarty_tpl->tpl_vars['proposta']->value->getModificato()->getLivello();?>
 </p>
    </div>

  <?php }?>

    <br>

    <div class="justify-content-around" style="text-align: center"  >
      <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/proposta/approva?<?php echo $_smarty_tpl->tpl_vars['proposta']->value->getId();?>
" style="width: 30%; margin-left: 20px;margin-right: 20px;"> Approva </a>
      <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/proposta/rifiuta?<?php echo $_smarty_tpl->tpl_vars['proposta']->value->getId();?>
" style="width: 30%; margin-left: 20px;margin-right: 20px;"> Rifiuta </a>
    </div>

    <br>
    <br>


</div>
<!-- Sezione Our Team -->
</body>

</html><?php }
}
