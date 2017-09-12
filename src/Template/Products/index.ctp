<ul class="page-breadcrumb breadcrumb">
	<li>
		<i class="fa fa-home">
		</i>
		Home
		<i class="fa fa-angle-right">
		</i>
	</li>
	<li>
		<a href="<?php echo $this->request->webroot.'adminmodule/products'; ?>">
			Products</a>
	</li>
</ul>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe">
					</i>Product Listing
				</div>

				<div class="actions">
					<div class="btn-group">
						<a class="btn default" href="#" data-toggle="dropdown">
							<i class="fa fa-cogs">
							</i> Tools
							<i class="fa fa-angle-down">
							</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>

							</li>
							<li>
								<a href="<?php echo $this->request->webroot.'adminmodule/products/export'?>">
									Export to CSV
								</a>
							</li>

							<li>
								<a href="#advancedsearch" data-toggle="modal">
									Advanced Search
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
						<?php echo $this->Form->create('product', array('type'=> 'get','role'=> 'form')); ?>
						<div class="row">
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="input-group input-medium" >
									<input type="text" class="form-control" placeholder="Search here" name="search">
									<span class="input-group-btn">
										<button class="btn green" type="submit">
											Search
											<i class="fa fa-search">
											</i>
										</button>
									</span>
								</div>
								<!-- /input-group -->
							</div>
							<!-- /.col-md-6 -->
						</div>
						<!-- /.row -->
						</form>
					</div>

					<div class="btn-group pull-right">
						<div class="btn-group" style="padding-right:15px;">

							<?php echo $this->Html->link(__('Add New Product <i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn green','escape' => FALSE]) ?>


						</div>
					</div>
				</div></br>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
														<th>
								<?php echo $this->Paginator->sort('id') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('category_id') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('product_code') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('product_name') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('price') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('tags') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('main_image') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('status') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('stock_status') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('created') ?>
							</th>
														<th>
								<?php echo $this->Paginator->sort('modified') ?>
							</th>
														<th>
								View
							</th>
							<th>
								Edit
							</th>
							<th>
								Delete
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($products) && sizeof($products) > 0)
						{
							?>
							<?php
							foreach($products as $product): ?>
							<tr>
																<td>
									<?php echo $this->Number->format($product->id) ?>
								</td>

																<td>
									<?php echo $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?>
								</td>
																<td>
									<?php echo h($product->product_code) ?>
								</td>
																<td>
									<?php echo h($product->product_name) ?>
								</td>
																<td>
									<?php echo $this->Number->format($product->price) ?>
								</td>

																<td>
									<?php echo h($product->tags) ?>
								</td>
																<td>
									<?php echo h($product->main_image) ?>
								</td>
																<td>
									<?php echo h($product->status) ?>
								</td>
																<td>
									<?php echo h($product->stock_status) ?>
								</td>
																<td>
									<?php echo h($product->created) ?>
								</td>
																<td>
									<?php echo h($product->modified) ?>
								</td>
								
								<td class="actions">
								<?php echo $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
								<td class="actions">
								<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
								<td class="actions">
									<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete this product?', $product->id)]) ?>
								</td>
							</tr>
							<?php endforeach; ?>
							<?php
						}
						else
						{
							?>
							<tr>
								<td colspan='15' align='center'>
									No Records Found.
								</td>
							</tr>
							<?php
						}?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-5 col-sm-12" style="margin-top:10px;">
						<div id="sample_1_length" class="dataTables_length">
							<?php echo $this->Form->create('', array('url' => array('controller'=> strtolower('Products'),'action'    => 'index'))); ?>
							<label>
								Show
								<?php echo $this->Form->input('limit', array('name'       => 'data[Products][limit]','type'       => 'select','class'      => 'form-control input-xsmall','label'      => false,'required'   => false,'hiddenField'=> false,'style'      => 'display:inline-block !important; padding-right:0px','onchange'   => 'this.form.submit()','options'    =>$default_limit_dropdown,'default'    => $limit,'div'        => false));?>
							</label>
							<?php echo $this->Form->end(); ?>
						</div>
					</div>
					<div class="col-md-7 col-sm-12">
						<div class="dataTables_paginate paging_bootstrap">
							<ul class="pagination">
								<?php echo $this->Paginator->prev('< ' . __('')) ?>
								<?php echo $this->Paginator->numbers() ?>
								<?php echo $this->Paginator->next(__('') . ' >', array(), null, array('class'=> 'next')) ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>

<div id="advancedsearch" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder">
							</i>Advanced Search
						</div>
					</div>

					<div class="portlet-body form investments">
						<?php  echo $this->Form->create('Search', array('url'   => array('controller'=> 'members','action'    => 'index'),'type' =>'GET','id'   => 'UserSearchForm','class'=> 'form-horizontal')); ?>
						<div class="modal-body">
							<div class="scroller" style="height:380px" data-always-visible="1" data-rail-visible1="1">

								<!--  <?php echo $this->Form->create('Search', array('id' => 'UserSearchForm','type' => 'GET', 'autocomplete' => 'off', 'class' => 'form-horizontal','action'=>'index')); ?>  -->
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-4 control-label">
											Code
										</label>
										<div class="col-md-8">
											<?php echo $this->Form->input('name', array('class'      => 'form-control','div'        => false,'label'      => false,'required'   => false,'hiddenField'=> false,'value'      => (isset($search['name']) && !empty($search['name']))?$search['name']:''));?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">
											Title
										</label>
										<div class="col-md-8">
											<?php echo $this->Form->input('emailname', array('class'      => 'form-control','div'        => false,'label'      => false,'required'   => false,'hiddenField'=> false,'value'      => (isset($search['emailname']) && !empty($search['emailname']))?$search['emailname']:''));?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">
											Brand
										</label>
										<div class="col-md-8">
											<?php echo $this->Form->input('emailname', array('class'      => 'form-control','div'        => false,'label'      => false,'required'   => false,'hiddenField'=> false,'value'      => (isset($search['emailname']) && !empty($search['emailname']))?$search['emailname']:''));?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">
											Actual price Between
										</label>
										<div class="col-md-8">
											<div class="input-group input-daterange" data-date="" data-date-format="dd-mm-yyyy">
												<input type="text" class="form-control" name="from"  value =<?php echo (isset($search['from']) && !empty($search['from']))?$search['from']:'' ?>>
												<span class="input-group-addon">
													to
												</span>
												<input type="text" class="form-control" name="to" value =<?php echo (isset($search['to']) && !empty($search['to']))?$search['to']:'' ?>>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">
											Selling price Between
										</label>
										<div class="col-md-8">
											<div class="input-group   input-daterange" data-date="" data-date-format="dd-mm-yyyy">
												<input type="text" class="form-control" name="from"  value =<?php echo (isset($search['from']) && !empty($search['from']))?$search['from']:'' ?>>
												<span class="input-group-addon">
													to
												</span>
												<input type="text" class="form-control" name="to" value =<?php echo (isset($search['to']) && !empty($search['to']))?$search['to']:'' ?>>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">
											Keywords
										</label>
										<div class="col-md-8">
											<?php echo $this->Form->input('firstname', array('class'      => 'form-control','div'        => false,'label'      => false,'required'   => false,'hiddenField'=> false,'value'      => (isset($search['firstname']) && !empty($search['firstname']))?$search['firstname']:''));?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn blue">
								Close
							</button>
							<button type="button" class="btn red reset">
								Reset
							</button>
							<!--  <button type="submit" class="btn green">Search</button>  -->
							<a href="#" class="btn green">
								Search
							</a>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>


<div class="modal fade" id="popupmodel" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				</button>
				<h4 class="modal-title popupLabel">
					Modal Title
				</h4>
			</div>
			<div class="modal-body" id="popupContent">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

