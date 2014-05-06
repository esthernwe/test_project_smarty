<?php /* Smarty version Smarty-3.1.18, created on 2014-04-10 04:03:26
         compiled from "templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19619534610924e0ff9-47739054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fb2c3fe24618efeb731f58f64fe299feac5dec7' => 
    array (
      0 => 'templates\\test.tpl',
      1 => 1397102600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19619534610924e0ff9-47739054',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53461092621112_10913002',
  'variables' => 
  array (
    'rows' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53461092621112_10913002')) {function content_53461092621112_10913002($_smarty_tpl) {?><html>
<head>
<meta charset="UTF-8" />
<title>Php table sort</title>
<link rel="stylesheet" type="text/css" href="table.css" />
<script src="table.js" type="text/javascript"></script>
</head>
<form method="POST" name="submitted">
	<select id="cmbMake" name="Make"
		onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
		<option value="0" selected="selected">ALL</option>
		<option value="1">NAME</option>
		<option value="2">EMAIL</option>
		<option value="3">PROVIDER</option>
	</select> <input type="textbox" name="keyword" id="keyword" value="" />
	<input type="submit" name="search" value="Search" />
</form>
<div id="content">
	<div id="blog">
		<div id="articles" style="width: 692px; padding: 0;">
			<table width="250" border="1"
				class="example table-autosort table-autofilter table-autopage:10 table-stripeclass:alternate table-page-number:t1page table-page-count:t1pages table-filtered-rowcount:t1filtercount table-rowcount:t1allcount"
				id="t1">
				<thead>
					<tr style="height: 35px">
						<th
							class="table-sortable:default table-sortable table-sorted-desc">Name</th>
						<th class="table-sortable:default table-sortable  "
							title="Click to sort">Email</th>
						<th
							class="table-sortable:default table-sortable:default table-sortable"
							title="Click to sort">Provider</th>
					</tr>
				</thead>
				<tbody>
  						 <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
  						 
  						<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value[1];?>
</td>
						<td> <?php echo $_smarty_tpl->tpl_vars['row']->value[2];?>
</td>
						<td> <?php echo $_smarty_tpl->tpl_vars['row']->value[4];?>
</td>
						</tr>
 						<?php } ?>
				
				</tbody>
				<tfoot>

					<tr>
						<td style="cursor: pointer;" class="table-page:previous">&lt; &lt;
							Previous</td>
						<td style="text-align: center;" colspan="1">Page <span id="t1page">1</span>&nbsp;of
							<span id="t1pages">11</span></td>
						<td style="cursor: pointer;" class="table-page:next">Next &gt;
							&gt;</td>
					</tr>
					<tr>
						<td colspan="3"><span id="t1filtercount">105</span>&nbsp;of <span
							id="t1allcount">105</span>&nbsp;rows match filter(s)</td>
					</tr>
				</tfoot>
			</table><?php }} ?>
