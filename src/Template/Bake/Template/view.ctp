<%
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.1.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
->map(function($field) use ($immediateAssociations) {
foreach ($immediateAssociations as $alias => $details) {
if ($field === $details['foreignKey']) {
return [$field => $details];
}
}
})
->filter()
->reduce(function($fields, $value) {
return $fields + $value;
}, []);

$groupedFields = collection($fields)
->filter(function($field) use ($schema) {
return $schema->columnType($field) !== 'binary';
})
->groupBy(function($field) use ($schema, $associationFields) {
$type = $schema->columnType($field);
if (isset($associationFields[$field])) {
return 'string';
}
if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
return 'number';
}
if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
return 'date';
}
return in_array($type, ['text', 'boolean']) ? $type : 'string';
})
->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>

<ul class="page-breadcrumb breadcrumb">
	<li>
		<i class="fa fa-home">
		</i>
			Home
		<i class="fa fa-angle-right">
		</i>
	</li>
	<li>
		<a href="<?php echo $this->request->webroot.'adminmodule/<%= strtolower($pluralHumanName) %>'; ?>">
			<%= $pluralHumanName %></a>
		<i class="fa fa-angle-right">
		</i>
			View
	</li>
</ul>

<div style='padding-bottom:10px;'>
	<?php echo $this->Flash->render(); ?>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tab-content">
			<div class="tab-pane active" id="tab_0">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder">
							</i>View <?= __('<%= $singularHumanName %>') ?>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body form users">
						<div class="alert alert-danger display-hide">
							<button data-close="alert" class="close">
							</button>
							You have some form errors. Please check below.
						</div>
						<!-- BEGIN FORM-->
						<?php echo $this->Form->create('District', array('class'=> 'form-horizontal')); ?>
						<div class="form-body">
							<!--
							<div class='form-group'>
							<?php echo $this->Form->label('pincode:' ,null, array('class' => 'col-md-3 control-label')); ?>
							<div class='col-md-4'>
							<p class="form-control-static"><?php echo h($pincode->district->name);?></p>
							</div>
							</div> -->

							<% if ($groupedFields['string']) : %>
							<% foreach ($groupedFields['string'] as $field) : %>
							<% if (isset($associationFields[$field])) :
							$details = $associationFields[$field];
							%>
							<div class='form-group'>
								<?php echo $this->Form->label('<%= Inflector::humanize($details['property']) %>:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($<%= $singularVar %>-><%= $field %>) ?>
								</div>
							</div>
							<% else : %>
							<div class='form-group'>
								<?php echo $this->Form->label('<%= Inflector::humanize($field) %>:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($<%= $singularVar %>-><%= $field %>) ?>
								</div>
							</div>

							<% endif; %>
							<% endforeach; %>
							<% endif; %>

							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="button" class="btn blue" onclick="window.location='<?php echo $this->request->webroot.'adminmodule/<%= strtolower($pluralHumanName) %>'; ?>'">
										Go Back
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