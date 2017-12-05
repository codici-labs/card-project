<div class="ui secondary menu">
  <a href="<?=base_url($pagename)?>" class="ui button">
    <i class="left arrow icon"></i> Volver
  </a>
  <div class="right menu">
   
  </div>
</div>
<div class="ui segment">
	<h2>Agregar punto de venta</h2>
  
  <form class="ui form" action="<?=base_url('salepoints/add')?>" method="POST">
    <div class="two fields">
      <div class="field">
        <label>Nombre</label>
        <input type="text" name="sale-point-name">
      </div>
      <div class="field">
        <label>Ubicación</label>
        <div class="ui selection dropdown">
          <input type="hidden" name="location">
          <i class="dropdown icon"></i>
          <div class="default text">Seleccionar</div>
          <div class="menu">
              <?php foreach ($locations as $location) {
                echo '<div class="item" data-value="'.$location->id.'">'.$location->name.'</div>';
              } ?>
          </div>
      </div>
      </div>
    </div>
    <button id="" class="ui button" tabindex="0">Agregar</button>
    <div id="errorContainer" class="ui error message">
      <ul class="list"></ul>
    </div>
  </form>
</div>

<script type="text/javascript">
  $form = $('.ui.form');

  var validator = $form.validate({
    errorContainer: '#errorContainer',
    errorLabelContainer: '#errorContainer>.list',
    wrapper: "li",
    ignore: "",
    rules: {
      'sale-point-name': {
        required: true,
        remote: {
          url: baseUrl + 'dashboard/unique',
          type: "post",
          data: {
            type: 'salepoint',
            'sale-point-name': function() {
              return $('[name="sale-point-name"]').val()              
            },
            'location': function() {
              return $('[name="location"]').val()
            }
          }
        }
      },
      'location': {
        required: true,
      }
    },
    messages: {
      'sale-point-name': {
        required: "<?=lang('sale_point_name_required')?>",
        remote: "<?=lang('sale_point_name_unique')?>"
      },
      'location': {
        required: "<?=lang('location_id_required')?>"
      }
    },
    highlight: function(element, errorClass) {
      $(element).parents('.field').addClass('error');
    },
    unhighlight: function(element, errorClass) {
      $(element).parents('.field').removeClass('error');
    },
    submitHandler: function (form) {
      form.submit();
    }
  });

  $(document).on('input change', '.form .field.error input[type="hidden"]', function(){
    $(this).valid();
  });


</script>