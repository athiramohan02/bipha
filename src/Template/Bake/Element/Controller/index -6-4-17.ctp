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
%>

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

    if (!empty($this->request->data)){
            if(isset($this->request->data['data']['<%= $currentModelName %>']['limit'])){
                $limit = $this->request->data['data']['<%= $currentModelName %>']['limit'];
                $this->request->Session()->write('default_limit', $limit);
            }
        }else{ 
                if($this->request->Session()->check('default_limit'))
                    $limit = $this->request->Session()->read('default_limit');  // pr($limit);exit;
                else
                    $limit = $this->request->default_limit;
            }

<% $belongsTo = $this->Bake->aliasExtractor($modelObj, 'BelongsTo'); %>
<% if ($belongsTo): %>  
  $this->paginate = [
            'contain' => [<%= $this->Bake->stringifyList($belongsTo, ['indent' => false]) %>]
        ]; 
$search_conditions = array();
        $conditions = array();
        $this->set("search_string", "");
        if(isset($this->request->query['search'])){
            $this->set("search_string", $this->request->query['search']);
            $conditions = array('OR' => array(
            '<%= $currentModelName %>.email LIKE "%'.trim(addslashes($this->request->query['search'])).'%"')); 
        }
 $this->paginate = [  
            'limit' => $limit,        
            'conditions' => [
               array_merge($conditions,$search_conditions)
            ],
        ];


<% endif; %>
        $<%= $pluralName %> = $this->paginate($this-><%= $currentModelName %>);

        $this->set(compact('<%= $pluralName %>'));
        $this->set('_serialize', ['<%= $pluralName %>']);
        $this->set(compact('limit','default_limit_dropdown'));
    }




