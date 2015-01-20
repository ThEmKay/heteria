<script>
$(function(){ 
    $('#hilfe').on('shown.bs.modal', function(e){
        $('.modal-open').css('overflow-y', 'scroll');  
        $('.modal-open').css('padding-right', 0);
    });          
});
</script>
<div style="position:fixed;top:200px;left:-10px;z-index:99999">
    <img src="./gfx/Help-icon.png" style="width:50px" data-toggle="modal" data-target="#hilfe" />
</div>
<div class="modal" id="hilfe" role="dialog" aria-labelledby="" aria-hidden="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-weight:bold">{titel}</h4>
      </div>
      <div class="modal-body">
        {inhalt}
      </div>
    </div>
  </div>
</div>