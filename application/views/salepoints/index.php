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


<!-- Template: Sale points -->
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

  // $.post( url('salepoints/get') );

  (function (){
      // $('#loader').show();
      // $('#salepoints-container').html('');
      $.ajax({
        url: url('salepoints/get'),
        method: 'post',
        success: function(data){
  			console.log(data);
          // var parsedData = JSON.parse(data);
          var template = $('#template-salepoints').html();
          var rendered = Mustache.render(template, {data:data});
          $('#salepoints-container').html(rendered);
         	$('table.crud-table').tablesort();
          // $('#loader').hide();
          
        }
      });  
    })();

  $(document).ready(function(){
    // getProducts();

    $('.ui.search')
        .search({
          apiSettings: {
            url: url('salepoints/get/{query}')
          },
          fields: {
            results : 'items',
            title   : 'name',
            url     : 'html_url'
          },
          minCharacters : 1,
          onSelect: function(result, response){
          	console.log(result, response);
            /*$('.content').hide();
            $('#prduct-detail').html('');
            $('.selected-product-container').fadeIn();
            $('#loader').fadeIn();*/
          
           /*var product_id = result.id;
            $.ajax({
              url: '<?=base_url();?>products/showProductDetails/'+product_id,
              method: 'get',
              success: function(template){
                  $('#loader').fadeOut('100', function(){
                    $('#prduct-detail').html(template);
                    $('#selected-product').fadeIn();
                    $('.content').show();
                   
                  });
                  
              }
            });*/
          }
        })
      ;
  });

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
            // $.post('', {}, function(){

            // })
        }
    })
    .modal('show');
   });

 //  function myFunction() {
	//   // Declare variables 
	//   var input, filter, table, tr, td, i, j;
	//   input = document.getElementById("myInput");
	//   filter = input.value.toUpperCase();
	//   table = document.getElementById("myTable");
	//   tr = table.getElementsByTagName("tr");

	//   // Loop through all table rows, and hide those who don't match the search query
	//   for (i = 0; i < tr.length; i++) {

	//   	// for (j = 0; j < )

	//     td = tr[i].getElementsByTagName("td")[0];
	//     if (td) {
	//       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	//         tr[i].style.display = "";
	//       } else {
	//         tr[i].style.display = "none";
	//       }
	//     } 
	//   }
	// }
</script>