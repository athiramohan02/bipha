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
			Products		</a>
		<i class="fa fa-angle-right">
		</i>
	</li>
	<li>
		Edit	</li>
</ul>

<div style='padding-bottom:10px;'>
	<?php echo $this->Flash->render(); ?>
</div>
<script type="text/javascript">
	$(document).ready(function()
		{
			var error1 = $('.alert-danger');
			$('#EditProductForm').validate(
				{
					errorElement: 'span', //default input error message container
					errorClass: 'help-block', // default input error message class
					focusInvalid: false, // do not focus the last invalid input
					ignore: "",
					rules:
					{

						"id" : {required : true},
"category_id" : {required : true},
"product_code" : {required : true},
"product_name" : {required : true},
"description" : {required : true},
"price" : {required : true},
"tags" : {required : true},
"main_image" : {required : true},
"status" : {required : true},
"stock_status" : {required : true},

					},
					messages:
					{

						"id" : {required :"Please enter id."},
"category_id" : {required :"Please enter category_id."},
"product_code" : {required :"Please enter product_code."},
"product_name" : {required :"Please enter product_name."},
"description" : {required :"Please enter description."},
"price" : {required :"Please enter price."},
"tags" : {required :"Please enter tags."},
"main_image" : {required :"Please enter main_image."},
"status" : {required :"Please enter status."},
"stock_status" : {required :"Please enter stock_status."},
					},

					invalidHandler: function (event, validator)
					{
						//display error alert on form submit
						//success1.hide();
						error1.show();
						//App.scrollTo(error1, -200);
					},

					highlight: function (element)
					{
						// hightlight error inputs
						$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
					},

					unhighlight: function (element)
					{
						// revert the change done by hightlight
						$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
					},

					success: function (label)
					{
						label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
						label
						.closest('.form-group').removeClass('error');
					},
				});
		});

</script>


<div class="row">
	<div class="col-md-12">
		<div class="tab-content">
			<div class="tab-pane active" id="tab_0">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder">
							</i><?php echo __('Edit Product') ?>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body form locations">
						<div class="alert alert-danger display-hide">
							<button data-close="alert" class="close">
							</button>
							You have some form errors. Please check below.
						</div>
						<?php echo $this->Form->create($product,array('class'=> 'form-horizontal','id'   =>'EditProductForm')) ?>
						<div class="form-body">

							<?php
																	echo $this->Form->input('category_id', ['options' => $categories]);
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('product_code' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('product_code',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('product_name' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('product_name',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('description' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('description',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('price' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('price',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('tags' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('tags',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('main_image' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('main_image',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('status' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('status',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('stock_status' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('stock_status',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
																	?>

							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn blue">
										Submit
									</button>
									<button type="button" class="btn default" onclick="window.location='<?php echo $this->request->webroot.'adminmodule/products'; ?>'">
										Cancel
									</button>
								</div>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
						<!-- END FORM-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
