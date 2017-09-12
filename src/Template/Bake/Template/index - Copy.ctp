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

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

%>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i><%= $singularHumanName %>
                            </div>

                            <div class="actions">                 
                  <div class="btn-group">
                    <a class="btn default" href="#" data-toggle="dropdown">
                    <i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                      <li>
                        
                      </li>
                        <li>
                        <a href="<?php echo $this->request->webroot.'admin/members/export'?>">Export to CSV</a>
                      </li>

                      <li>
                        <a href="#advancedsearch" data-toggle="modal">Advanced Search</a>
                      </li>
                    </ul>
                  </div>                
              </div>
       </div>

  <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="btn-group"> 
        <?php echo $this->Form->create('<%= $singularVar %>', array('type' => 'get','role' => 'form')); ?>                                
                                <div class="row">
                            <!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="input-group input-medium" >
                                        <input type="text" class="form-control" placeholder="Search here" name="search">
                                        <span class="input-group-btn">
                                            <button class="btn green" type="submit">Search <i class="fa fa-search"></i></button>
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

                            <a href="<%= $pluralHumanName %>/add">  <button class="btn green" type="button" > Add New <%= $singularHumanName %> <i class="fa fa-plus"></i></button></a>
                        </div>
                    </div>
            </div></br>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                  <% foreach ($fields as $field): %>
                                                    <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
                                  <% endforeach; %>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
            <tr>
<%        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
%>
     <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
<%
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
%>
     <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
<%
                } else {
%>
        <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
<%
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
%>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', <%= $pk %>]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>


                            </tbody>
                            </table>


                             <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
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
                    <i class="fa fa-reorder"></i>Advanced Search
                  </div>
                </div>
             
               <div class="portlet-body form investments"> 

               <?php  echo $this->Form->create('Search', array('url' => array('controller' => 'members','action' => 'admin_index'),'type'=>'GET','id' => 'UserSearchForm','class' => 'form-horizontal')); ?>


                <div class="modal-body">
                   <div class="scroller" style="height:380px" data-always-visible="1" data-rail-visible1="1">


                <!--  <?php echo $this->Form->create('Search', array('id' => 'UserSearchForm','type' => 'GET', 'autocomplete' => 'off', 'class' => 'form-horizontal','action'=>'admin_index')); ?>  -->
            
                <div class="form-body">

                     <div class="form-group">
                      <label class="col-md-4 control-label">Code</label>
                        <div class="col-md-8">
                          <?php echo $this->Form->input('name', array('class' => 'form-control', 'div' => false, 'label' => false,  'required' => false,'hiddenField' => false, 'value' => (isset($search['name']) && !empty($search['name']))?$search['name']:''));?>
                        </div>
                    </div>

                     <div class="form-group">
                      <label class="col-md-4 control-label">Title</label>
                        <div class="col-md-8">
                          <?php echo $this->Form->input('emailname', array('class' => 'form-control', 'div' => false, 'label' => false,  'required' => false,'hiddenField' => false, 'value' => (isset($search['emailname']) && !empty($search['emailname']))?$search['emailname']:''));?>
                        </div>
                    </div>

                      <div class="form-group">
                      <label class="col-md-4 control-label">Brand</label>
                        <div class="col-md-8">
                          <?php echo $this->Form->input('emailname', array('class' => 'form-control', 'div' => false, 'label' => false,  'required' => false,'hiddenField' => false, 'value' => (isset($search['emailname']) && !empty($search['emailname']))?$search['emailname']:''));?>
                        </div>
                    </div>  

                       <div class="form-group">
                                    <label class="col-md-4 control-label">Actual price Between</label>
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
                                    <label class="col-md-4 control-label">Selling price Between</label>
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
                      <label class="col-md-4 control-label">Keywords</label>
                        <div class="col-md-8">
                          <?php echo $this->Form->input('firstname', array('class' => 'form-control', 'div' => false, 'label' => false,  'required' => false,'hiddenField' => false, 'value' => (isset($search['firstname']) && !empty($search['firstname']))?$search['firstname']:''));?>
                        </div>
                    </div>


                        
                    </div>
                  </div>
                </div>
              
              <div class="modal-footer">
                   <button type="button" data-dismiss="modal" class="btn blue">Close</button>
                   <button type="button" class="btn red reset">Reset</button>
                  <!--  <button type="submit" class="btn green">Search</button>  -->
                   <a href="#" class="btn green"></i>Search</a>

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
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title popupLabel">Modal Title</h4>
                    </div>
                    <div class="modal-body" id="popupContent">                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
    </div>










