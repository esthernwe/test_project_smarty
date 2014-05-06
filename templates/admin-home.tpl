<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Home page</title>
<link rel="stylesheet" type="text/css" href="table.css" />
<script src="table.js" type="text/javascript"></script>
</head>
<body>
	<div id='fg_membersite_content'>
		<h2>Administrator Home Page</h2>
		Welcome back {$userfullname}.</br>
				{$role}
				<p>
			<a href='logout.php'>Logout</a>
		</p>
		
	</div>
	<form method="post" name="submitted">
	<select id="cmbMake" name="Make"
		onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
		<option value="0" selected="selected">ALL</option>		
		<option value="2">EMAIL</option>
		<option value="1">NAME</option>
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
							class="table-sortable:default table-sortable table-sorted-desc">Email</th>
						<th 
							class="table-sortable:default table-sortable  "	title="Click to sort">Name</th>
						<th
							class="table-sortable:default table-sortable:default table-sortable"
							title="Click to sort">Provider</th>
						<th
							class="table-sortable:default table-sortable:default table-sortable"
							title="Click to sort">DATE</th>
					</tr>
				</thead>
				<tbody>
  						 {foreach from=$rows item=row}
  						  						
  						<tr>
						<td>{$row[1]}</td>
						<td>{$row[2]}</td>
						<td>{$row[4]}</td>
						<td>{$row[6]}</td>
						</tr>						
						
 						{/foreach}
				
				</tbody>
				<tfoot>

					<tr>
						<td style="cursor: pointer;" class="table-page:previous">&lt; &lt;
							Previous</td>
						<td style="text-align: center;" colspan="1">Page <span id="t1page">1</span>&nbsp;of
							<span id="t1pages">11</span></td>
						<td ></td>
						<td style="cursor: pointer;" class="table-page:next">Next &gt;
							&gt;</td>
					</tr>
					<tr>
						<td colspan="4"><span id="t1filtercount">105</span>&nbsp;of <span
							id="t1allcount">105</span>&nbsp;rows match filter(s)</td>
					</tr>
				</tfoot>
			</table>
	