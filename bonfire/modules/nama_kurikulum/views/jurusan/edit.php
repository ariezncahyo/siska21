<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/chosen.css" />
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($nama_kurikulum) ) {
    $nama_kurikulum = (array)$nama_kurikulum;
}
$id = isset($nama_kurikulum['kode_nama_kurikulum']) ? $nama_kurikulum['kode_nama_kurikulum'] : '';
?>
<div class="well">
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('nama_kurikulum_nama_kurikulum') ? 'error' : ''; ?>">
            <?php echo form_label('Nama Kurikulum'. lang('bf_form_label_required'), 'nama_kurikulum_nama_kurikulum', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="nama_kurikulum_nama_kurikulum" type="text" name="nama_kurikulum_nama_kurikulum" maxlength="4" value="<?php echo set_value('nama_kurikulum_nama_kurikulum', isset($nama_kurikulum['nama_kurikulum']) ? $nama_kurikulum['nama_kurikulum'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('nama_kurikulum_nama_kurikulum'); ?></span>
        </div>
        </div>
        <?php $kosong = array(
                        '' => 'Data Jurusan Kosong',
        ); ?>
        <?php echo form_dropdown('nama_kurikulum_kode_nama_jurusan', $options, set_value('nama_kurikulum_kode_nama_jurusan', isset($nama_kurikulum['kode_nama_jurusan']) ? $nama_kurikulum['kode_nama_jurusan'] : ''), 'Nama Jurusan'. lang('bf_form_label_required'),'class="chzn-select"')?>       
         <div class="control-group <?php echo form_error('nama_kurikulum_status_kurikulum') ? 'error' : ''; ?>">
            <?php echo form_label('Status Kurikulum'. lang('bf_form_label_required'), 'nama_kurikulum_status_kurikulum', array('class' => "control-label") ); ?>
            <div class='controls'>
        <label class="radio">
            <input id="nama_kurikulum_status_kurikulum" name="nama_kurikulum_status_kurikulum" type="radio" class="" value="A" <?php echo set_radio('nama_kurikulum_status_kurikulum', 'A', isset($nama_kurikulum['status_kurikulum']) && $nama_kurikulum['status_kurikulum'] == 'A'  ? TRUE : FALSE ); ?> />
            <label for="nama_kurikulum_status_kurikulum">Aktif</label>
        </label>
        <label class="radio">    
            <input id="nama_kurikulum_status_kurikulum" name="nama_kurikulum_status_kurikulum" type="radio" class="" value="N" <?php echo set_radio('nama_kurikulum_status_kurikulum', 'N', isset($nama_kurikulum['status_kurikulum']) && $nama_kurikulum['status_kurikulum'] == 'N'  ? TRUE : FALSE ); ?> />
            <label for="nama_kurikulum_status_kurikulum">Non Aktif</label>
            <span class="help-inline"><?php echo form_error('nama_kurikulum_status_kurikulum'); ?></span>
            </label>
        </div>
        </div>
        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Nama Kurikulum" />
            or <?php echo anchor(SITE_AREA .'/jurusan/nama_kurikulum', lang('nama_kurikulum_cancel'), 'class="btn btn-warning"'); ?>
    <?php if ($this->auth->has_permission('Nama_Kurikulum.Jurusan.Delete')) : ?>
            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('nama_kurikulum_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('nama_kurikulum_delete_record'); ?>
            </button>
    <?php endif; ?>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
 <script src="<?php echo base_url() ?>/assets/js/chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".chzn-select").chosen({allow_single_deselect: true});  </script>
