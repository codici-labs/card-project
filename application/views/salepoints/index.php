<div class="ui secondary menu">
  <a href="<?=base_url($pagename.'/add')?>" class="ui button">Agregar nuevo</a>  
</div>
<div class="ui segment">
	<h2>Puntos de venta</h2>
  <div class="ui search">
    <div class="ui icon input" style="width:100%;">
      <input class="prompt" type="text" placeholder="Filtro...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
</div>

<div class="ui segment" id="loader">
  <div class="ui active loader"></div>
</div>

<div id="salepoints-container"></div>


<div class="ui mini modal">
  <div class="header">Header</div>
  <div class="content">
    <p></p>
  </div>
  <div class="actions">
    <div class="ui approve button">Approve</div>
    <div class="ui button">Neutral</div>
    <div class="ui cancel button">Cancel</div>
  </div>
</div>




<!-- Templates -->
<script id="template-salepoints" type="x-tmpl-mustache">
  <table class="ui selectable sortable table crud-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Punto de venta</th>
        <th>Ubicación</th>
        <th class="no-sort"><i class="configure icon"></i></th>
      </tr>
    </thead>
    <tbody>
      {{#data}}
      <tr data-delete-id="{{id}}">
        <td>{{id}}</td>
        <td>{{name}}</td>
        <td>{{l_name}}</td>
        <td>
			<a href="<?=base_url($pagename)?>/edit/{{id}}" data-tooltip="Editar" data-position="top right">
				<i class="write icon"></i>
			</a>
			<a href="javascript:void(0);" class="delete-registry" data-delete="{{id}}" data-tooltip="Eliminar" data-position="top right">
				<i class="remove icon"></i>
			</a>
        </td>        
      </tr>
      {{/data}}
    </tbody>
  </table> 
</script>

<script id="template-delete" type="x-tmpl-mustache">
  <div class="ui mini test modal">
    <div class="header">
      Eliminar punto de venta
    </div>
    <div class="content">
      <pre>{{details}}</pre>
    </div>
    <div class="actions">
      <div class="ui negative button">
        No
      </div>
      <div class="ui positive right labeled icon button">
        Sí
        <i class="checkmark icon"></i>
      </div>
    </div>	
  </div>
</script>



<script type="text/javascript">

(function (){
	$('#loader').show();
	$.ajax({
		url: url('salepoints/get'),
		method: 'post',
		success: function(data){
			var template = $('#template-salepoints').html();
			var rendered = Mustache.render(template, {data:data});
			$('#salepoints-container').html(rendered);
			$('table.crud-table').tablesort();
			$('#loader').hide();
		}
	});
})();

    
$('.ui.search').search({
	apiSettings: {
		url: url('salepoints/get/{query}')
	},
	fields: {
		results : 'dummy',
		title   : 'name',
		url     : 'html_url'
	},
	minCharacters : 1,
	onSelect: function(result, response){
		window.location.href = url('salepoints/edit/' + result.id);            
	}
});



// Delete
$(document).on('click', '.delete-registry', function(){

	var $table = $(this).parents('table.crud-table'),
	template = $('#template-delete').html(),
	id = $(this).parents('tr').data('delete-id'),
	details = '';

	for(var i = 0; i < $table.find('thead th').length - 1; i++)
		details += $table.find('thead th')[i].innerText + ': ' +
		$('tr[data-delete-id="' + id + '"] td')[i].innerText + '\n';

	$( Mustache.render(template, {details:details}) )
	.modal({
		onApprove: function() {
			$.post(url('salepoints/delete/'+id), function(response){
				snackbar.add(response.message, response.status);
				if(response.status){
					$('tr[data-delete-id="' + id + '"]').slideUp('fast',function(){
						$(this).remove();
					})
				}
			});
		}
	})
	.modal('show');

});

</script>