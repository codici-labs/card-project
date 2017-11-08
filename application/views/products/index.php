<div class="ui secondary menu">
  <a href="<?=base_url('products/add')?>" class="ui button">Agregar nuevo</a>
  
</div>
<div class="ui segment">
	
	<h2>Productos</h2>
  <div class="ui search">
    <div class="ui icon input" style="width:100%;">
      <input class="prompt" type="text" placeholder="Producto...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
</div>

<div class="ui segment" id="loader">
  <div class="ui active loader"></div>
</div>
<div id="products-container"></div>

<!-- Template: Products -->
<script id="template-products" type="x-tmpl-mustache">
  <table class="ui fixed single line celled table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Código</th>
        <th>Precio de venta</th>
      </tr>
    </thead>
    <tbody>
      {{#data}}
      <tr>
        <td>{{descripcion}}</td>
        <td>{{codigo}}</td>
        <td>$ {{costo}}</td>
      </tr>
      {{/data}}
    </tbody>
  </table>
 
</script>


<script type="text/javascript">
  //**************************/
  // Get contracts
  //**************************/
  function getProducts(filter){
    $('#loader').show();
    $('#products-container').html('');
    $.ajax({
      url: '<?=base_url();?>products/get',
      data: {filter: filter},
      success: function(data){
        var parsedData = JSON.parse(data);
        var template = $('#template-products').html();
        var rendered = Mustache.render(template, {data: parsedData});
        $('#products-container').html(rendered);
       
        $('#loader').hide();
        
      },
      method: 'post'
    });

  }

  $(document).ready(function(){
    getProducts();

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
  });
</script>