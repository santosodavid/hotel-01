<?php include('header.php'); ?>
<h2>
	<?php echo lang('recent_orders') ?>
</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="gc_cell_left"><?php echo lang('order_number') ?></th>
			<th><?php echo lang('bill_to') ?></th>
			<th><?php echo lang('ship_to') ?></th>
			<th><?php echo lang('ordered_on') ?></th>
			<th><?php echo lang('status') ?></th>
			<th class="gc_cell_right"><?php echo lang('notes') ?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($orders as $order): ?>
		<tr>
			<td class="gc_cell_left"><a
				href="<?php echo site_url($this->config->item('admin_folder') . '/orders/view/' . $order->id); ?>"><?php echo $order->order_number; ?>
			</a></td>
			<td><?php echo $order->bill_lastname . ', ' . $order->bill_firstname; ?>
			</td>
			<td><?php echo $order->ship_lastname . ', ' . $order->ship_firstname; ?>
			</td>
			<td><?php echo format_date($order->ordered_on); ?></td>
			<td style="width: 150px;"><?php echo $order->status ?>
			</td>
			<td class="gc_cell_right"><div class="MainTableNotes">
					<?php echo $order->notes; ?>
				</div></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="row">
	<div class="span12" style="text-align: center;">
		<a class="btn btn-large" href="<?php echo $admin_url; ?>orders"><?php echo lang('view_all_orders'); ?>
		</a>
	</div>
</div>


<?php
include('footer.php');