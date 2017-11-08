<div class="ui secondary menu">
  <a href="<?=base_url('products')?>" class="ui button">
    <i class="left arrow icon"></i> Volver
  </a>
  <div class="right menu">
   
  </div>
</div>
<div class="ui segment">
	<h2>Agregar producto</h2>
  
  <form class="ui form" action="<?=base_url('products/add')?>" method="POST">
    <div class="two fields">
      <div class="field">
        <label>Código de barras</label>
        <input type="text" name="barcode">
      </div>
      <div class="field">
        <label>Nombre de producto</label>
        <input type="text" name="product-name">
      </div>
    </div>
    <button type="submit" class="ui button" tabindex="0">Agregar</button>
    <div class="ui error message"></div>
  </form>
</div>


<!-- Modal para agregar nuevo producto desde aqui -->
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Agregar producto
  </div>
  <div class="content">
    
    <div class="description">
      <div class="ui header">Complete los detalles del producto</div>
      <div class="ui form">
        <div class="fields">
          <div class="field">
            <label>Nombre</label>
            <input type="text">
          </div>
          <div class="field">
            <label>Código de barras</label>
            <input type="number">
          </div>
          <div class="field">
            <label>Precio de venta</label>
            <input type="text">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Cancelar
    </div>
    <div class="ui positive right labeled icon button">
      Guardar
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>
<!-- / Modal -->
<script type="text/javascript">
  // $(document).ready(function(){
  //   $('.ui.search')
  //       .search({
  //         apiSettings: {
  //           url: '<?=base_url();?>products/getJson/{query}'
  //         },
  //         fields: {
  //           results : 'items',
  //           title   : 'descripcion',
  //           url     : 'html_url'
  //         },
  //         minCharacters : 3,
  //         onSelect: function(result, response){
  //           $('.content').hide();
  //           $('#prduct-detail').html('');
  //           $('.selected-product-container').fadeIn();
  //           $('#loader').fadeIn();
          
  //           var product_id = result.id;
  //           $.ajax({
  //             url: '<?=base_url();?>products/showProductDetails/'+product_id,
  //             method: 'get',
  //             success: function(template){
  //                 $('#loader').fadeOut('100', function(){
  //                   $('#prduct-detail').html(template);
  //                   $('#selected-product').fadeIn();
  //                   $('.content').show();
                   
  //                 });
                  
  //             }
  //           });
  //         }
  //       })
  //     ;

  //     $('.add-product').click(function(){
  //       $('.ui.modal').modal('show');
  //     });

  $('.ui.form')
  .form({
    fields: {
      name: {
        identifier: 'product-name',
        rules: [
          {
            type   : 'empty',
            prompt : 'Debe ingresar un nombre de producto.'
          }
        ]
      },
      username: {
        identifier: 'barcode',
        rules: [
          {
            type   : 'regExp',
            prompt : 'El código de barras debe estar formado por 13 dígitos.',
            value : /^\d{13}$/
          }
        ]
      }
    }
  });

  <?php if(isset($_POST)){ ?>
    (function(){
      $('input[name="barcode"]').val('<?=$_POST["barcode"]?>');
      $('input[name="product-name"]').val('<?=$_POST["product-name"]?>');
      $('form').submit();
    })();
  <?php } ?>
</script>