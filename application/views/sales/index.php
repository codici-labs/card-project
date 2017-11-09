<div class="ui segment">
	
	<h2>Ventas</h2>
  <div class="ui search">
    <div class="ui icon input" style="width:100%;">
      <input class="prompt" type="text" placeholder="Alumno...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
</div>

<div class="ui segment" id="loader">
  <div class="ui active loader"></div>
</div>
<div id="ventas-container"></div>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Detalle de venta
  </div>

  <div class="content">
   
    <div class="description">
      
      <div id="detalle-venta-container"></div>
    </div>
  </div>
  <div class="actions">
    <!-- <div class="ui black deny button">
      Nope
    </div> -->
    <div class="ui positive right labeled icon button">
      Yep, that's me
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>


<!-- Template: Ventas -->
<script id="template-ventas" type="x-tmpl-mustache">
  <table class="ui fixed single line celled table">
    <thead>
      <tr>
        <th>Alumno</th>
        <th>Fecha</th>
        <th>Total</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      {{#data.venta}}
      <tr>
        <td>{{nombre}} {{apellido}}</td>
        <td>{{fecha}}</td>
        <td>$ {{total}}</td>
        <td><a href="javascript:void(0);" class="ver-detalle" data-id="{{id}}"><i class="search icon"></i> Detalles</a></td>
      </tr>
      {{/data.venta}}
    </tbody>
  </table>
 
</script>

<!-- Template: Detalle venta -->
<script id="template-detalle-venta" type="x-tmpl-mustache">
  <div class="ui header">Venta #<span id="venta-id">{{id}}</span>&nbsp;-&nbsp;{{student}}</div>
  <table class="ui fixed single line celled table">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Costo</th>
        <th>Precio de venta</th>
      </tr>
    </thead>
    <tbody>
      {{#data}}
      <tr>
        <td>{{descripcion}}</td>
        <td>{{cantidad}}</td>
        <td>$ {{costo}}</td>
        <td>$ {{precio_venta}}</td>
      {{/data}}
    </tbody>
  </table>
 
</script>


<script type="text/javascript">
  //**************************/
  // Get Ventas
  //**************************/
  function getVentas(filter){
    $('#loader').show();
    $('#ventas-container').html('');
    $.ajax({
      url: '<?=base_url();?>sales/get',
      data: {filter: filter},
      success: function(data){
        var parsedData = JSON.parse(data);

        var template = $('#template-ventas').html();
        var rendered = Mustache.render(template, {data: parsedData});
        $('#ventas-container').html(rendered);
       
        $('#loader').hide();
        
      },
      method: 'post'
    });

  }

  //**************************/
  // Get Details
  //**************************/
  function getDetails(id){
   
    $('.ui.modal').modal('show');
   
    $('#detalle-venta-container').html('');

    $.ajax({
      url: '<?=base_url();?>sales/getDetails',
      data: {id: id},
      success: function(data){
        console.log(data);
        var parsedData = JSON.parse(data);
        var id = parsedData[0].id_venta;
        var student = parsedData[0].nombre + ' ' + parsedData[0].apellido;

        var template = $('#template-detalle-venta').html();
        var rendered = Mustache.render(template, {data : parsedData, id : id, student : student});
        $('#detalle-venta-container').html(rendered);
       
        //$('#loader').hide();
        
      },
      method: 'post'
    });

  }

  $(document).ready(function(){
    getVentas();

    $('.ui.search')
        .search({
          apiSettings: {
            url: '<?=base_url();?>products/getJson/{query}'
          },
          fields: {
            results : 'items',
            title   : 'descripcion',
            url     : 'html_url'
          },
          minCharacters : 3,
          onSelect: function(result, response){
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

      $('#ventas-container').on('click', '.ver-detalle', function(){
        var id = $(this).data('id');

        getDetails(id);
      });
  });
</script>