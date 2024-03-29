<!-- ./end -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>Home">
                        Home</a>
                    </li>
                    <li class="breadcrumb-item active capital">
                        <?= $this->uri->segment(1); ?>
                    </li>
                    <li class="breadcrumb-item active capital">
                        <?php $uri_Bcrumb = $this->uri->segment(2);
                        $cek = substr($uri_Bcrumb, 0, 2);
                        if ($cek == 'C_') {
                            echo "data " . substr($uri_Bcrumb, 2, 15) . "";
                        } ?>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <!-- side bar menu  -->
            <div class="col-2 ">
                <?php $this->load->view('template/_sidebar'); ?>
            </div>
            <!--  end ./side bar menu  -->
            <div class="col-md-10">
                <div class="card data-tables">
                    <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                        <div class="col-md-5 align-self-left">
                            <h3 class="text-themecolor"><?= $title ?></h3>
                        </div>
                        <div class="toolbar marg-top">
                            <!-- modal button -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah-Icons">Add New</button>  
                            <!--Here you can write extra buttons/actions -->
                        </div>
                        <div class="fresh-datatables marg-top">
                            <!-- notif -->
                            <?php $msg = $this->session->flashdata('msg_sukses');
                            if ((isset($msg)) && (!empty($msg)))
                            { 
                                ?>
                                <div class="alert alert-success">
                                    <?php print_r($msg); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                </div> 
                                <?php } ?> 
                                <?php $msg = $this->session->flashdata('msg_delete');
                                if ((isset($msg)) && (!empty($msg)))
                                { 
                                    ?>
                                    <div class="alert alert-warning">
                                        <?php print_r($msg); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                    </div> 
                                    <?php } ?>
                                    <!-- end notif -->
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">NO</th>
                                                <th width="25%">NAMA</th>
                                                <th width="20%">ICONS</th>
                                                <th width="20%" class="disabled-sorting text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            $no=1; 
                                            foreach ($recordUpdate->result() as $r) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $r->namaIcon; ?></td>
                                                <td>
                                                    <?php if ($r->src == "") {
                                                        echo "<i style='color: red'>not found</i>";
                                                    } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/icons/<?= $r->src; ?>" width="20%" >
                                                    <?php } ?>
                                                </td>
                                                <td class="text-right">  
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_editsetIcons<?= $r->idIcons; ?>"><i class="fa fa-edit fa-1x"></i> Add Foto </button>
                                                    <a href="javascript:void(0);" onclick="del('<?= $r->idIcons;?>');" class="btn btn-sm btn-danger remove"><i class="fa fa-times fa-1x"></i></a>
                                                </td>
                                            </tr>
                                            <?php $no++; } ?> 

                                        </tbody>
                                    </table>
                                    <span id="demo"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- footer -->
        <?php $this->load->view('template/_footer'); ?>


        <!-- Data modal view-->

        <!-- Data modal update -->
        <?php $this->load->view('modals/modal_update_setIcons');?>
        <!-- Data modal add -->
        <?php echo $modal_tambah_data; ?>
        <div id="tempat-modal"></div>


        <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script> 



        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatables').DataTable();
            });

            var url="<?php echo base_url();?>";
            function del(idIcons){
               var r = confirm("Do you want to delete this?")
               if (r==true)
                  window.location = url+"master/SetIcons/delete/"+idIcons;
              else
                  return false;
          } 

      </script>