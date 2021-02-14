<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-13 21:19:32
  from 'E:\Programy\xampp\htdocs\zadanie4\app\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602834543e9d67_14132549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b8cf6524ee387ec6f320307737e30111be87929' => 
    array (
      0 => 'E:\\Programy\\xampp\\htdocs\\zadanie4\\app\\calc.tpl',
      1 => 1613247366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602834543e9d67_14132549 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_127419133602834543e1d22_73051864', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.tpl");
}
/* {block 'content'} */
class Block_127419133602834543e1d22_73051864 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_127419133602834543e1d22_73051864',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<section id="footer">
		<div class="inner">
			<h2 class="major">Kalkulator</h2>

		<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_root']->value;?>
/app/calc.php" method="POST">
			<d>
				<div class="fields">
				<div class="field">
			<label for="id_kwota">Kwota kredytu</label>
			<input id="id_kwota" type="text" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['kwota']->value;?>
"/>
				</div>
				<div>
			<label for="id_lata">Na ile lat:</label>
			<input id="id_lata" type="text" name="lata" value="<?php echo $_smarty_tpl->tpl_vars['lata']->value;?>
"/>
				</div>
					<div class="field">
			<label for="id_procent">Oprocentowanie:</label>
			<input id="id_procent" type="text" name="procent" value="<?php echo $_smarty_tpl->tpl_vars['procent']->value;?>
"/>
				</div>
			<input id="oblicz" type="submit" value="Oblicz" />
				</div>
		</div>

	<div class="messages">

	<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
		<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
			<h4>Wystąpiły błędy: </h4>
			<ol class="err">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
					<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ol>
		<?php }?>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['result']->value)) {?>
		<h4>Wynik</h4>
		<p class="res">
			<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

		</p>
	<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
